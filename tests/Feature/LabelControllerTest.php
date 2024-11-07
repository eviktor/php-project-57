<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use App\Models\Label;

class LabelControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        Label::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('labels.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $label = Label::factory()->create();
        $response = $this->get(route('labels.edit', [$label]));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = Label::factory()->make()->only('name', 'description');
        $response = $this->post(route('labels.store'), $data);
        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('labels', $data);
    }

    public function testUpdate()
    {
        $label = Label::factory()->create();
        $data = Label::factory()->make()->only('name', 'description');

        $response = $this->patch(route('labels.update', $label), $data);
        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('labels', $data);
    }

    public function testDestroy()
    {
        $label = Label::factory()->create();
        $response = $this->delete(route('labels.destroy', [$label]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('labels.index'));

        $this->assertDatabaseMissing('labels', $label->only('id'));
    }

    public function testLongInputs()
    {
        $label = Label::create([
            'name' => str_repeat('a', 256),
            'description' => str_repeat('a', 1001),
        ]);
        $data = $label->only('name', 'description');
        $response = $this->post(route('labels.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('name');
    }
}
