<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mytasks = Todo::where('user_id', auth()->user()->id)->orderby('created_at', 'DESC')->get();
        return view('todo.index', compact('mytasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $data = $request->validated();
        
        auth()->user()->tasks()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'isPublic' => $data['taskType'],
            'isCompleted' => 'no',
            'end_at' => Carbon::createFromDate($data['endDate'])->endOfDay(),
        ]);
        
        return back()->withToastSuccess('Task Added Successfully!');
    }

}
