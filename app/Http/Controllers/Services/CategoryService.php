<?php

namespace App\Http\Controllers\Services;

use App\Models\Category;

class CategoryService
{
    public static function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:500'],
        ];
    }

    public static function insert($category, $data)
    {
        $category->name = $data['name'];
        $category->icon = $data['icon'];
    }

    public static function getAllCategories()
    {
        return Category::all();
    }

    public static function getOneCategory($id)
    {
        return Category::find($id);
    }

    public static function delete($id)
    {
        $category = self::getOneCategory($id);
        try {
            $category->delete();
            return response()->json(['success' => 'The category successfully deleted']);
        }
        catch(Exception $e){
            return response()->json(['failed' => 'The category successfully deleted']);
        }
    }
}
