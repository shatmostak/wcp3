<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\FileController;

//handled-here
// Route::get('/', function () {return view('BASE.base');});
Route::get('/', [NavController::class, 'importHome'])->name('importhome');
Route::post('/getcompany', [ImportController::class, 'getCompany'])->name('get-company');
Route::post('/store', [ImportController::class, 'store'])->name('store');
Route::post('/upload', [ImportController::class, 'upload'])->name('upload');
Route::post('/confirmcompany', [ImportController::class, 'confirmCompany'])->name('confirm-company');
Route::post('/fileimport', [ImportController::class, 'fileImport'])->name('file-import');
// Route::post('/', [FileController::class, 'verifyFiles'])->name('verify-files');
Route::get('/recent', [ImportController::class, 'recentDbUpdates'])->name('recent-db');
Route::post('file-export', [ExportController::class, 'fileExport'])->name('file-export');

// Route::get('/import-home', [NavController::class, 'importHome'])->name('importhome');
// Route::post('import-home', [ImportController::class, 'fileImport'])->name('fileimport');
// //pdf read
// Route::get('/pdf', [pdfController::class, 'read'])->name('read-pdf');
// //import
// Route::post('import-home', [ImportController::class, 'fileImport'])->name('file-import');
// Route::get('recent', [ImportController::class, 'recentDbUpdates'])->name('recent-db');
// //export
// Route::post('file-export', [ExportController::class, 'fileExport'])->name('file-export');
// //template
// Route::get('template', [TemplateController::class, 'template'])->name('template');
// Route::post('template/parse', [TemplateController::class, 'parseTemplate'])->name('template_parse');
// Route::post('template/process', [TemplateController::class, 'processTemplate'])->name('template_process');
// Route::get('test', function() {return view('index');});



//navigation
// Route::get('create-quote', [NavController::class, 'createQuote'])->name('create-quote');
// Route::get('price-table', [NavController::class, 'priceTable'])->name('price-table');
// Route::get('admin', [NavController::class, 'admin'])->name('admin');;
// Route::get('export-home', [NavController::class, 'exportHome'])->name('export');
// Route::get('import-plus', [NavController::class, 'importPlus'])->name('import-plus');
// Route::get('query', [NavController::class, 'query'])->name('query');
// Route::get('admin', function() {return view('index');});

// Route::post('/upload-doc-file', [ProgressBarController::class, 'uploadToServer']);
// Route::get('template', [TemplateController::class, 'template'])->name('template');
// Route::post('add-template', [TemplateController::class, 'addTemplate'])->name('add-template');

