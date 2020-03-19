<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThreadPost;
use App\Thread;
use App\Forum;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function index($forum)
    {
        $threads = Thread::where('forum_id', $forum)->orderBy('created_at', 'desc')->paginate(5);
        return view('thread.index', ['threads' => $threads]);
    }

    public function create()
    {
        $forums = Forum::get(['id', 'name']);
        return view('thread.create', ['forums' => $forums]);
    }

    public function store(StoreThreadPost $request)
    {
        $request->user()->threads()->create($request->validated());
        return redirect('/')->with('info', 'Thread created successfully.');
    }

    public function show(Thread $thread)
    {
        $statistics = Thread::where('user_id', $thread->user_id)->get();
        return view('thread.show', ['thread' => $thread, 'statistics' => $statistics]);
    }

    public function edit(Thread $thread)
    {
        $this->authorize('access', $thread);
        $forums = Forum::get(['id', 'name']);
        return view('thread.edit', ['thread' => $thread, 'forums' => $forums]);
    }

    public function update(StoreThreadPost $request, Thread $thread)
    {
        $thread->update(['forum_id' => $request->forum_id, 'title' => $request->title, 'body' => $request->body]);
        return redirect()->to('thread/'.$thread->id)->with('info', 'Thread updated successfully');
    }

    public function destroy(Thread $thread)
    {
        $this->authorize('access', $thread);
        $thread->delete();
        return redirect()->to('/')->with('info', 'Thread deleted successfully');
    }
}
