<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function post() {
          return view('pages.post');
    }

//    public function comment() {
//        return view('pages.comment');
//    }

}
