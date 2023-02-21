<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ExportController;

//handled-here
// Route::get('/', function () {return view('BASE.base');});
Route::get('/', [NavController::class, 'importHome'])->name('importhome');
Route::get('/export', [NavController::class, 'exportHome'])->name('exporthome');
Route::get('/datatables', [NavController::class, 'datatables'])->name('datatables');

Route::post('/getcompany', [ImportController::class, 'getCompany'])->name('get-company');
Route::post('/store', [ImportController::class, 'store'])->name('store');
Route::post('/upload', [ImportController::class, 'upload'])->name('upload');
Route::post('/confirmcompany', [ImportController::class, 'confirmCompany'])->name('confirm-company');
Route::post('/fileimport', [ImportController::class, 'fileImport'])->name('file-import');

Route::get('/makeList', [ImportController::class, 'makeList'])->name('make-list');
Route::post('/updatelist', [ImportController::class, 'updateList'])->name('update-list');
Route::post('/export', [ExportController::class, 'fileExport'])->name('file-export');
Route::post('/exportpull', [ExportController::class, 'exportPull'])->name('export-pull');
Route::get('/exportpull', [ExportController::class, 'exportPull']);

// Route::get('/export-file', [ExportController::class, 'fileExport'])->name('export-download');
// Route::any('/export-file', [ExportController::class, 'fileExport'])->name('file-export');


Route::get('/recent', [ImportController::class, 'recent'])->name('recent');
Route::get('/uploadstatus', [ImportController::class, 'uploadStatus'])->name('upload-status');
Route::get('/view-admin', [ImportController::class, 'viewAdmin'])->name('view-admin');




Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');