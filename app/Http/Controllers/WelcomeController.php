<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $search = request()->query('search');
        if ($search) {
            // dd(request()->query('search'));
            $post = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
        } else {
            $post = Post::simplePaginate(3);
        }

        return view('welcome')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', $post);
    }
}
