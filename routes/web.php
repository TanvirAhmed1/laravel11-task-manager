<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index',[
        'tasks' => \App\Models\Task::latest()->where('completed',true)->get()
    ]);
})->name('tasks.index');

// Route::get('/hello/{name}', function ($name) {
//     return 'Hello ' . $name .'!';
// });

// Route::get('/xxx', function () {
//     return 'Hello';
// })->name('Hello');

// Route::get('/hallo', function () {
//     return redirect()->route('Hello');
// });

// Route::fallback(function () {
//     return 'No Page Found!';
// });

Route::get('/tasks/{id}', function ($id) {
    // $task = collect($tasks)->firstWhere('id', $id);

    // if(! $task) {
    //     abort(Response::HTTP_NOT_FOUND);
    // }
    return view('show', [
      'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');