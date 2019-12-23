<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Fetch all the forums
     * @return View
     */
    public function index()
    {
        $forums = Forum::withCount(['threads'])->get();
        return view('index', ['forums' => $forums]);
    }
}
