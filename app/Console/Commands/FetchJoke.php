<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Joke;
use Illuminate\Support\Facades\Http;

class FetchJoke extends Command
{
    protected $signature = 'joke:fetch';
    protected $description = 'Fetch a random joke from the API and save it';

    public function handle()
    {
        $response = Http::get('https://official-joke-api.appspot.com/random_joke');

        if ($response->successful()) {
            $data = $response->json();
            Joke::create([
                'type' => $data['type'],
                'setup' => $data['setup'],
                'punchline' => $data['punchline']
            ]);
            $this->info('Joke fetched and saved successfully.');
        } else {
            $this->error('Failed to fetch joke.');
        }
    }
}
