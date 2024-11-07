<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomePageTest extends TestCase
{
    public function testWelcomePageIsAvailable(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
