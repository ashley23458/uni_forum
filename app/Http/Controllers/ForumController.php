<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    /**
     * Laravel. (2019). Authentication [Class constructor method containing middleware method ]. (6.x). Retrieved from https://laravel.com/docs/master/authentication
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Laravel. (2019). Eloquent: Relationships [Method for counting related models]. (6.x). Retrieved from https://laravel.com/docs/master/authentication
        $forums = Forum::withCount(['threads'])->get();
        return view('index', ['forums' => $forums]);
    }
}
