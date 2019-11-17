<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreThreadPost;
use App\Thread;
use App\Forum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the threads for a specific forum.
     *
     * @return Response
     */
    const COMMENTS_PER_PAGE = 5;

    public function index($forum)
    {
        $threads = Thread::where('forum_id', $forum)
            ->orderBy('created_at', 'desc')
            ->paginate(self::COMMENTS_PER_PAGE);
        return view('thread.index', ['threads' => $threads]);
    }

    /**
     * Collect all current forums and pass to the form for creating a new thread.
     *
     * @return Response
     */
    public function create()
    {
        $forums = Forum::get(['id', 'name']);
        return view('thread.create', ['forums' => $forums]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(StoreThreadPost $request)
    {
        Thread::create(['title' => $request->title,
            'body' => $request->body,
            'forum_id' => $request->forum_id,
            'user_id' => Auth::user()->id]);
        return redirect('/')->with('info', 'Thread created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Thread $thread
     * @return void
     */
    public function show(Thread $thread)
    {
        $statistics = Thread::where('user_id', $thread->user_id)->get();
        return view('thread.show', ['thread' => $thread, 'statistics' => $statistics]);
    }

    /**
     * Collect all current forums and pass to form for editing the specified Thread.
     *
     * @param Thread $thread
     * @return void
     */
    public function edit(Thread $thread)
    {
        $forums = Forum::get(['id', 'name']);
        return view('thread.edit', ['thread' => $thread, 'forums' => $forums]);
    }

    /**
     * Update the specified Thread in storage.
     *
     * @param StoreThreadPost $request
     * @param Thread $thread
     * @return void
     */
    public function update(StoreThreadPost $request, Thread $thread)
    {
        $thread->update(['forum_id' => $request->forum_id, 'title' => $request->title, 'body' => $request->body]);
        return redirect()->to('thread/'.$thread->id)->with('info', 'Thread updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Thread $thread
     * @return Response
     * @throws Exception
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();
        return redirect()->to('/')->with('info', 'Thread deleted successfully');
    }
}
