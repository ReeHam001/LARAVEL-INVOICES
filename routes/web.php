<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
//Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Sections
Route::resource('sections', App\Http\Controllers\SectionsController::class);
Route::get('/section/{id}', [App\Http\Controllers\InvoicesController::class, 'getproducts']);

// products
Route::resource('products',  App\Http\Controllers\ProductsController::class);

// Ivoices
Route::resource('invoices', App\Http\Controllers\InvoicesController::class);

Route::get('/InvoicesDetails/{id}', [App\Http\Controllers\InvoicesDetailsController::class, 'edit']);
Route::get('/edit_invoice/{id}', [App\Http\Controllers\InvoicesController::class, 'edit']);

Route::get('/Status_show/{id}', [App\Http\Controllers\InvoicesController::class, 'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [App\Http\Controllers\InvoicesController::class, 'Status_Update'])->name('Status_Update');


Route::resource('InvoicesDetails', App\Http\Controllers\InvoicesDetailsController::class);
Route::post('delete_file', [App\Http\Controllers\InvoicesDetailsController::class, 'destroy'])->name('delete_file');
Route::get('download/{invoice_number}/{file_name}', [App\Http\Controllers\InvoicesDetailsController::class, 'get_file']);
Route::get('View_file/{invoice_number}/{file_name}', [App\Http\Controllers\InvoicesDetailsController::class, 'open_file']);
Route::post('delete_file', [App\Http\Controllers\InvoicesDetailsController::class, 'destroy'])->name('delete_file');


Route::resource('InvoiceAttachments', App\Http\Controllers\InvoiceAttachmentsController::class);

Route::resource('Archive',  App\Http\Controllers\InvoiceAchiveController::class);

Route::get('Invoice_Paid',[App\Http\Controllers\InvoicesController::class, 'Invoice_Paid']);
Route::get('Invoice_UnPaid',[App\Http\Controllers\InvoicesController::class, 'Invoice_UnPaid']);
Route::get('Invoice_Partial',[App\Http\Controllers\InvoicesController::class, 'Invoice_Partial']);

Route::get('Print_invoice/{id}',[App\Http\Controllers\InvoicesController::class, 'Print_invoice']);

Route::get('export_invoices', [App\Http\Controllers\InvoicesController::class, 'export']);


Route::group(['middleware' => ['auth']], function() {
Route::resource('roles',App\Http\Controllers\RoleController::class);
Route::resource('users',App\Http\Controllers\UserController::class);
});

Route::get('invoices_report', [App\Http\Controllers\Invoices_Report::class, 'index']);

Route::post('Search_invoices', [App\Http\Controllers\Invoices_Report::class, 'Search_invoices']);
Route::get('customers_report', [App\Http\Controllers\Customers_Report::class, 'index'])->name("customers_report");
Route::post('Search_customers', [App\Http\Controllers\Customers_Report::class, 'Search_customers']);



Route::get('MarkAsRead_all',[App\Http\Controllers\InvoicesController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
Route::get('unreadNotifications_count', [App\Http\Controllers\InvoicesController::class, 'unreadNotifications_count'])->name('unreadNotifications_count');
Route::get('unreadNotifications', [App\Http\Controllers\InvoicesController::class, 'unreadNotifications'])->name('unreadNotifications');



// أسماء الجداول دائما بالجمع
// اسماء المودل والعواميد بالجدول و الانبوت كلها نفسها
//session()->flash('Add', 'تم اضافة القسم بنجاح ');
/* return redirect('/sections')
بدل السطرين دول سطر واحد اسهل
        return redirect()->back()->with(['Add' => 'تم اضافه العرض بنجاح ']); */


// on delete cascade مشان اذا مسحنا الاب بينمسح الابن مباشرة ضروري تكون موجودة
// ترتيب الراوت الو اهمية


// https://docs.laravel-excel.com/ : maatwebsite باككيج  لاستخدام الاكسل
