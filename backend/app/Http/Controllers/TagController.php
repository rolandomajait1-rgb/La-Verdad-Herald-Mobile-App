<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        // Return all tags for public API, paginated for admin
        if (request()->is('api/*') && !request()->user()) {
            $tags = Tag::orderBy('name')->get();
            return response()->json(['data' => $tags]);
        }

        $tags = Tag::withCount('articles')->orderBy('name')->paginate(50);
        return response()->json($tags);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $tag = Tag::create($data);

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'model_type' => 'Tag',
            'model_id' => $tag->id,
            'new_values' => $tag->toArray(),
        ]);

        if (request()->wantsJson()) {
            return response()->json($tag, 201);
        }

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function show(Tag $tag)
    {
        $tag->load('articles');
        return response()->json($tag);
    }

    // Public-facing: view tag by slug
    public function publicShow(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $articles = \App\Models\Article::published()
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })
            ->with('author.user', 'categories')
            ->latest('published_at')
            ->paginate(10);

        return view('tags.public', compact('tag', 'articles'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,'.$tag->id,
        ]);

        $oldValues = $tag->toArray();

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $tag->update($data);

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'updated',
            'model_type' => 'Tag',
            'model_id' => $tag->id,
            'old_values' => $oldValues,
            'new_values' => $tag->toArray(),
        ]);

        return response()->json($tag);
    }

    public function destroy(Tag $tag)
    {
        $oldValues = $tag->toArray();

        $tag->delete();

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'model_type' => 'Tag',
            'model_id' => $tag->id,
            'old_values' => $oldValues,
        ]);

        return response()->json(['message' => 'Tag deleted successfully']);
    }
}
