<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\FunMenu;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
