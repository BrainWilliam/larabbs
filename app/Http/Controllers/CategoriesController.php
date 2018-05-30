<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoriesController extends Controller
{
    public function show(Category $category){
        $topics = Topic::with('user','category')->where('category_id',$category->id)->paginate(5);
        return view('topics.index',compact('topics','category'));
    }
}
