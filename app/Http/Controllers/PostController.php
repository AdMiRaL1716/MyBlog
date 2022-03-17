<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\ContentService;
use App\Http\Controllers\Services\PostService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $link = 'posts';

    public function posts()
    {
        $categories = PostService::getAllPosts();
        return view('-', compact('categories'));
    }

    public function addPost()
    {
        return view('-');
    }

    public function editPost($id)
    {
        $post = PostService::getOnePost($id);
        return view('-', compact('post'));
    }

    public function create(Request $request)
    {
        $rules = PostService::rules();
        $post = new Post();
        return ContentService::create($request, $rules, $this->link, $post);
    }

    public function update(Request $request, $id)
    {
        $post = PostService::getOnePost($id);
        $rules = PostService::rules();
        return ContentService::update($request, $rules, $this->link, $post);
    }

    public function delete($id)
    {
        return PostService::delete($id);
    }
}
