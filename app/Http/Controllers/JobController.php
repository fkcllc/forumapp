<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(10); // 1ページ5件
        // dd($jobs);
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $types = Job::select('type')->distinct()->pluck('type')->filter()->values();
        $types = array('アルバイト','パート','正社員','嘱託社員','契約社員','派遣社員');

        return view('jobs.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'position'    => 'required|string|max:255',
            'category_id' => 'nullable|integer',
            'address'     => 'required|string|max:255',
            'type'        => 'required|string|max:255',
            'status'      => 'nullable|string|max:255',
            'last_date'   => 'required|date',
        ]);

        Job::create($validated);

        return redirect()->route('jobs.index')->with('success', '求人を追加しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        //$types = \App\Models\Job::select('type')->distinct()->pluck('type')->filter()->values();
        $types = array('アルバイト','パート','正社員','嘱託社員','契約社員','派遣社員');
        return view('jobs.edit', compact('job', 'types'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->route('jobs.index')->with('success', '更新しました');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->route('jobs.index')->with('success', '削除しました');
    }
}
