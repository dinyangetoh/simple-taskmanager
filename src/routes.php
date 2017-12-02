<?php

// Route::get('tasks', function () {
//     return "This is Task Manager";
// });

Route::namespace ('Dinyangetoh\SimpleTaskmanager\Controllers')->group(function () {
    Route::get('tasks', 'TaskController@index');
    Route::post('tasks/category/add', 'TaskController@addCategory');
    Route::post('tasks/category/update', 'TaskController@updateCategory');
    Route::get('tasks/category/delete/{id}', 'TaskController@deleteCategory');
    Route::post('tasks/add', 'TaskController@addTask');
    Route::post('tasks/update/status', 'TaskController@updateTaskStatus');
    Route::get('tasks/delete/{id}', 'TaskController@deleteTask');
});
