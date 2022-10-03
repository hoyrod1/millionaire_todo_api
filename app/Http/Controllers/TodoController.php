<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\TodoResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = DB::table('todos')->orderBy('created_at', 'desc')->get();
        return response(TodoResource::collection($todos), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_email' => 'required',
            'todo' => 'required',
        ]);

        if($validate->fails())
        {
            return response($validate->errors(), 400);
        }

        return response(new TodoResource(Todo::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response(new TodoResource($todo), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $existing_todo = Todo::find($id);
        if ($existing_todo) 
         {
            $existing_todo->completed = $request->completed ? true : false;
            $existing_todo->completed_at = $request->completed ? Carbon::now() : null;
            $existing_todo->save();

            return response(new TodoResource($existing_todo), 201);
        }else
        {
            $something_wrong = ['Something went wrong'];
            return response($something_wrong, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response(null, 204);
    }
}
