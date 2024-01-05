<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResources;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Http\Resources\UseResources;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return UseResources::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user()->task()->create(['Task' => $request->task]);
        return response()->json(['status'=> 'task has been sucessfully created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = User::find($id)->task;
        return TaskResources::collection($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
