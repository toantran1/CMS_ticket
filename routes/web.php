<?php
use App\Http\Controllers\ManageTicketController;

use Illuminate\Support\Facades\Auth;
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

Route::get('/','ManageTicketController@index')->name('trang-chu');
Route::get('/trang-chu','ManageTicketController@index')->name('trang-chu');
Route::get('/manage-ticket','ManageTicketController@manage_ticket')->name('manage-ticket');

//Danh sach goi ve
Route::get('/list-ticket','ManageTicketController@list_ticket');
Route::post('add-new-ticket','ManageTicketController@add_new_ticket');
Route::get('/list-ticket','ShowComboController@show_combo');
// Route::get('/edit-ticket/{id}', 'ShowComboController@show_detail_ticket');
Route::post('/update-ticket', 'ShowComboController@update_ticket');

Route::get('/filter','ManageTicketController@filter');
// Route::get('/filter','ManageTicketController@filter_index');

//check ticket
route::get('/check-ticket','checkTicketController@check_ticket')->name('check-ticket');
route::get('/check-ticket-filter','checkTicketController@check_ticket_filter');
route::post('/update-status','checkTicketController@update_status');