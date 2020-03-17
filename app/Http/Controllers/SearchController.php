<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchThreadPost;
use App\Thread;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function searchThreads(SearchThreadPost $request)
    {
        $searchTerm = $request->search;
        if ($request->filter == "Username") {
            $threads = Thread::whereHas('user', function($query) {
                $query->where('username', 'like', '%' . \Request::input('search') . '%');
            })->limit(60)->get();

        }

        else if ($request->filter == "Thread title") {
            $threads = Thread::where('title', 'like', '%' . $searchTerm . '%')->get();

        }

        else if ($request->filter == "Forum title") {
            $threads = Thread::whereHas('forum', function($query) {
                $query->where('name', 'like', '%' . \Request::input('search') . '%');
            })->limit(60)->get();

        } else {
            $threads = Thread::orWhere('title', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('forum', function($query) {
                $query->where('name', 'like', '%' . \Request::input('search') . '%');
            })
            ->orWhereHas('user', function($query) {
                $query->where('username', 'like', '%' . \Request::input('search') . '%');
            })
            ->limit(60)
            ->get();
        }

        return view('thread.search_result', compact('threads', 'searchTerm'));
    }
}
