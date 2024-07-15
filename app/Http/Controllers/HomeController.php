<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class HomeController extends Controller
{
    public function index(){
        $blogs = Blog::with('author')->get();
        return view('user.home', compact('blogs'));
    }
}
