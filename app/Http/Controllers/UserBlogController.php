<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class UserBlogController extends Controller
{
    public function CreateBlog()
    {
        $categories = Category::where('state', Category::STATE_ACTIVE)->get();
        
        return view('newtheme.create_blog', compact('categories'));
    }
}
