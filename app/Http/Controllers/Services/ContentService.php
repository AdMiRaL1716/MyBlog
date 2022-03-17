<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Validator;

class ContentService
{
    public static function choiceOption($link, $element, $data)
    {
        switch ($link) {
            case 'categories':
                CategoryService::insert($element, $data);
                break;
            case 'posts':
                PostService::insert($element, $data);
                break;
        }
    }

    public static function create($request, $rules, $link, $category)
    {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $element = $category;
                self::choiceOption($link, $element, $data);
                $element->save();
                return redirect($link)->with('success', "Operation successfully");
            } catch (Exception $e) {
                return redirect($link)->with('failed', "Operation failed");
            }
        }
    }

    public static function update($request, $rules, $link, $element)
    {
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                self::choiceOption($link, $element, $data);
                $element->save();
                return redirect($link)->with('success',"Operation successfully");
            }
            catch(Exception $e) {
                return redirect($link)->with('failed',"Operation failed");
            }
        }
    }
}
