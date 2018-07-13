<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Show news list page.
     *
     * @return void
     */
    public function index() {
      return view('news-and-information');
    }
}
