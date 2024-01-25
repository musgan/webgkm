<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    //
    public function index($slug_category) : View{
        return View("fe/post/index");
    }
    public function detail($slug_post) : View{
        return View("fe/post/detail");
    }
}
