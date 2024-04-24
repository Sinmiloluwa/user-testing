<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_project_exists(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('Unleash');
    }

    public function test_project_creates(): void
    {
        $response = $this->post('/create-project');

        \App\Models\Project::create([
            'fullname' => 'fullname',
            'country' => 'country',
            'project_name' => 'project_name',
            'link' => 'link',
            'expiry_date' => 'expiry_date',
            'embed_code' => 'link',
            'user_id' => 1,
        ]);

        $response->assertStatus(302);

    }
}
