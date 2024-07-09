<?php

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/tasks', function () {
  return view('index', [
    'tasks' => Task::all()
  ]);
})->name('tasks.index');

Route::view('/tasks/create', ['create'])->name('tasks.create');

Route::get('/tasks/{id}/edit', function ($id) {
  return view('edit', [
    'task' => Task::findOrFail($id)
  ]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
  return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
  $data = $request->validated();
  $task = new Task;
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];

  $task->save();

  return redirect()->route('tasks.show', ['id' => $task->id])
    ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::delete('/tasks/destroy/{id}', function ($id) {
  $task = Task::find($id);
  $task->delete();

  return response()->json('deleted successfully', 200);
});

Route::put('/tasks.{id}', function ($id, TaskRequest $request) {
  $data = $request->validated();

  $task = Task::find($id);
  $task->update([
    // Your array of fields to update

    $task->title = $data['title'],
    $task->description = $data['description'],
    $task->long_description = $data['long_description'],
  ]);
  $task->save();

  return redirect()->route('tasks.show', ['id' => $task->id])
    ->with('success', 'Task updated successfully!');
})->name('tasks.update');

// Route::fallback(function(){
//     return 'Resource Not Found';
//  /*return response()->json([
//     'message' => 'resource not found'
//  ], 404);*/
//});