<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    /**
     * Fetch all the forums
     * @return View
     */
    public function index()
    {
        $forums = Forum::all();
        return view('index', ['forums' => $forums]);
    }
}
