<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
  public function index()
  {
    // flash()->overlay('<p class="lead pb-2 text-center text-success">You message has been sent,<br>thank you.</p><div class="px-3"><div class="btn btn-success btn-block btn-sm mb-3" data-dismiss="modal">Close</div></div>', '<h3 class="mt-4 mb-0 text-success text-center w-100"><p class="mb-3"><i class="far fa-5x fa-check-circle"></i></p><p class="mb-1">Success!</p></h3>', ['success']);
    
    return view('homepage');
  }
}
