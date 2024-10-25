<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;

class JokeController extends Controller
{
    public function list()
    {
        $jokes = Joke::paginate(10);
        return view('jokes.index', compact('jokes'));
    }


    public function create()
    {
        return view('jokes.create');
    }

    public function edit($id)
    {
        $joke = Joke::findOrFail($id);
        return view('jokes.edit', compact('joke'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'setup' => 'required|string|max:255',
            'punchline' => 'required|string|max:255',
        ]);

        Joke::create($request->all());
        return redirect()->route('jokes.index')->with('success', 'Joke created successfully!');
    }

    public function update(Request $request, $id)
    {
        $joke = Joke::findOrFail($id);
        $request->validate([
            'type' => 'required|string|max:255',
            'setup' => 'required|string|max:255',
            'punchline' => 'required|string|max:255',
        ]);

        $joke->update($request->all());
        return redirect()->route('jokes.index')->with('success', 'Joke updated successfully!');
    }

    public function destroy($id)
    {
        $joke = Joke::findOrFail($id);
        $joke->delete();

        return redirect()->route('jokes.index')->with('success', 'Joke deleted successfully.');
    }
}
