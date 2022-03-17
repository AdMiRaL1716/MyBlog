<?php

namespace App\Http\Controllers\Services;

use App\Models\Post;

class PostService
{
    public static function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'picture' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string', 'max:1000'],
            'id_category' => ['required', 'int'],
            'id_user' => ['required', 'int'],
        ];
    }

    public static function insert($post, $data)
    {
        $post->name = $data['name'];
        $post->picture = $data['picture'];
        $post->description = $data['description'];
        $post->id_category = $data['id_category'];
        $post->id_user = $data['id_user'];
    }

    public static function getAllPosts()
    {
        return Post::all();
    }

    public static function getOnePost($id)
    {
        return Post::find($id);
    }

    public static function delete($id)
    {
        $post = self::getOnePost($id);
        try {
            $post->delete();
            return redirect('categories')->with('success',"Operation successfully");
        }
        catch(Exception $e){
            return redirect('categories')->with('failed',"Operation failed");
        }
    }
}
