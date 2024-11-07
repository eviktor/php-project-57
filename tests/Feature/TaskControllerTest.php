<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        Task::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks.edit', [$task]));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = Task::factory()->make()->only('name', 'status_id');
        $response = $this->post(route('tasks.store'), $data);
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testUpdate()
    {
        $task = Task::factory()->create();
        $data = Task::factory()->make()->only('name', 'status_id');

        $response = $this->patch(route('tasks.update', $task), $data);
        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDestroy()
    {
        $task = Task::factory()->create();
        $response = $this->delete(route('tasks.destroy', [$task]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseMissing('tasks', $task->only('id'));
    }

    public function testLongInputs()
    {
        $data = Task::factory()->create()->only('status_id');
        $data['name'] = str_repeat('a', 256);
        $data['description'] = str_repeat('a', 1001);
        $response = $this->post(route('tasks.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
    }

}
