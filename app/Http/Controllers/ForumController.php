<?php

namespace App\Http\Controllers;

use App\Forum;
use Khill\Lavacharts\Lavacharts;

class ForumController extends Controller
{
    public function index()
    {
    	$forums = Forum::withCount(['threads'])->get();
    	//create Forum pie chart containing count of each thread.
    	$lava = new Lavacharts;
    	$reasons = $lava->DataTable();
    	$reasons->addStringColumn('Reasons')->addNumberColumn('Percent');
    	foreach ($forums as $forum) {
    		$reasons->addRow([$forum->name, $forum->threads_count]);
    	}
    	$lava->PieChart('Forum', $reasons, ['title' => "Forums"]);

        return view('index', ['forums' => $forums, 'lava' => $lava]);
    }
}
