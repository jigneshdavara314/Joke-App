<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Joke;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JokeTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_joke_command()
    {
        $this->artisan('joke:fetch')->assertExitCode(0);
        $this->assertDatabaseCount('jokes', 1);
    }

    public function test_joke_creation()
    {
        $jokeData = ['type' => 'Test Type', 'setup' => 'Test setup', 'punchline' => 'Test punchline'];
        $this->post(route('jokes.store'), $jokeData)->assertRedirect(route('jokes.index'));
        $this->assertDatabaseHas('jokes', $jokeData);
    }

    public function test_joke_creation_without_setup()
    {
        $jokeData = ['punchline' => 'Test punchline'];
        $this->post(route('jokes.store'), $jokeData)
            ->assertSessionHasErrors('setup');
        $this->assertDatabaseCount('jokes', 0);
    }

    public function test_joke_edit()
    {
        $joke = Joke::factory()->create();
        $this->get(route('jokes.edit', $joke->id))->assertStatus(200);
    }

    public function test_joke_delete()
    {
        $joke = Joke::factory()->create();
        $this->delete(route('jokes.destroy', $joke->id))
            ->assertRedirect(route('jokes.index'));

        $this->assertDatabaseMissing('jokes', ['id' => $joke->id]);
    }
}
