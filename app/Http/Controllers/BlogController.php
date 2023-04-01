<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware(
            'permission:blog-list|blog-create|blog-edit|blog-delete',
            ['only' => ['index']]
        );
        $this->middleware('permission:blog-create', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('permission:blog-edit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Blog::create($request->all());
        return redirect()->route('blogs.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->update($request->all());
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::find($id)->delete();
        return redirect()->route('blogs.index');
    }
}
