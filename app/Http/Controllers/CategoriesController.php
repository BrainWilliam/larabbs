<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoriesController extends Controller
{
    public function show(Category $category,Request $request,Topic $topic,User $user){
        $topics = $topic->withOrder($request->order)->where('category_id',$category->id)->paginate(5);
        $active_users = $user->getActiveUsers();
        return view('topics.index',compact('topics','category','active_users'));
    }
}