<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;
use App\Http\Resources\ToDoList as ToDoListResource;

class ToDoListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(ToDoList::class, 'list');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todoLists = $request->user()
                          ->toDoLists() //if ends here, lazy load
                          ->orderBy('updated_at', 'desc')
                          ->get();
      
        return ToDoListResource::collection($todoLists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $list = $request->user()->todoLists()->create($request->all());

        return new ToDoListResource($list);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToDoList  $list
     * @return \Illuminate\Http\Response
     */
    public function show(ToDoList $list)
    {
        return new ToDoListResource($list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToDoList  $list
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDoList $list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToDoList  $list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDoList $list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDoList  $list
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDoList $list)
    {
        $list->delete();
    }
}
