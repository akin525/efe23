<?php

use App\Http\Controllers\admin\bonusController;
use App\Http\Controllers\admin\DashboardsController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\QueryController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\WithadController;
use App\Http\Controllers\AirtimeController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlltvController;
use App\Http\Controllers\DataPinController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EkectController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TransController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::post('log', [\App\Http\Controllers\DashboardController::class, 'log'])->name('log');

Route::get('list', [\App\Http\Controllers\listdata::class, 'list'])->name('list');

Route::get('admin/login', [LoginController::class, 'index'])->name('admin/login');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
//    Route::get('dashboard', [DashboardController::class, 'dash'])->name('dashboard');
    Route::get('account', [DashboardController::class, 'dash'])->name('account');

//    airtime route
    Route::get('airtime', [DashboardController::class, 'airtimeindex'])->name('airtime');
    Route::post('buyairtime', [AirtimeController::class, 'buyairtime'])->name('buyairtime');

//    data route
    Route::get('getOptions/{selectedValue}', [DashboardController::class, 'netwplanrequest'])->name('getOptions');
    Route::get('select', [DashboardController::class, 'picknetwork'])->name('select');
    Route::post('buydata', [BillController::class, 'bill'])->name('buydata');

//    datapin route
    Route::get('datapin', [DataPinController::class, 'dataindex'])->name('datapin');
    Route::post('buypin', [DataPinController::class, 'processdatapin'])->name('buypin');

//    tv route
    Route::get('listtv', [AlltvController::class, 'listtv'])->name('listtv');
    Route::view('tv', 'bills.tv');
    Route::get('picktv/{selectedValue}', [AlltvController::class, 'tv'])->name('picktv');
    Route::get('verifytv/{value1}/{value2}', [AlltvController::class, 'verifytv'])->name('verifytv');
    Route::post('buytv', [AlltvController::class, 'paytv'])->name('buytv');

//    electricity route
    Route::get('listelect', [EkectController::class, 'listelect'])->name('listelect');
    Route::get('electricity', [EkectController::class, 'electric'])->name('electricity');
    Route::get('verifyelec/{value1}/{value2}', [EkectController::class, 'verifyelect'])->name('verifyelec');
    Route::post('buyelect', [EkectController::class, 'payelect'])->name('buyelect');

//    bills invoice route
    Route::get('invoice', [DashboardController::class, 'invoice'])->name('invoice');
    Route::get('viewpdf/{id}', [PdfController::class, 'viewpdf'])->name('viewpdf');
    Route::get('/dopdf/{id}', [PdfController::class, 'dopdf'])->name('dopdf');

//    education route
    Route::get('listedu', [EducationController::class, 'listedu'])->name('listedu');
    Route::get('neco', [EducationController::class, 'indexn'])->name('neco');
    Route::get('waec', [EducationController::class, 'indexw'])->name('waec');
    Route::post('buyneco', [EducationController::class, 'neco'])->name('buyneco');
    Route::post('buywaec', [EducationController::class, 'waec'])->name('buywaec');

//    transaction route
    Route::get('notification', [NotificationController::class, 'loadtransaction'])->name('notification');
    Route::get('clearall', [NotificationController::class, 'cleartransaction'])->name('clearall');
    Route::get('deposit', [FundController::class,'fund'])->name('deposit');

//    task route
    Route::get('tasks', [TaskController::class, 'loadalltask'])->name('tasks');
    Route::get('advert', [TransController::class, 'alladvert'])->name('advert');


});

Route::middleware(['auth', 'admin'])->group(function () {
Route::get('admin/dashboard', [DashboardsController::class, 'dashboard'])->name('admin/dashboard');
    Route::get('admin/pd2/{id}', [ProductController::class, 'on2'])->name('admin/pd2');
    Route::get('admin/user', [UsersController::class, 'index'])->name('admin/user');
    Route::get('admin/deposits', [TransactionController::class, 'in'])->name('admin/deposits');
    Route::get('admin/request', [WithadController::class, 'index'])->name('admin/request');
    Route::get('admin/approved/{id}', [WithadController::class, 'approve'])->name('admin/approved');
    Route::get('admin/disapproved/{id}', [WithadController::class, 'disapprove'])->name('admin/disapproved');
    Route::get('admin/done/{id}', [\App\Http\Controllers\Marktransaction::class, 'accepttransaction'])->name('admin/done');
    Route::get('admin/bills', [TransactionController::class, 'bill'])->name('admin/bills');
    Route::get('admin/giveaway', [BonusController::class, 'giveawayall'])->name('admin/giveaway');
    Route::get('admin/claim', [BonusController::class, 'claimby'])->name('admin/claim');
    Route::get('admin/finddeposite', [TransactionController::class, 'index'])->name('admin/finddeposite');
    Route::post('admin/depo', [TransactionController::class, 'finduser'])->name('admin/depo');
    Route::post('admin/date', [QueryController::class, 'querydeposi'])->name('admin/date');
    Route::post('admin/datebill', [QueryController::class, 'querybilldate'])->name('admin/datebill');
    Route::get('admin/depositquery', [QueryController::class, 'queryindex'])->name('admin/depositquery');
    Route::get('admin/billquery', [QueryController::class, 'billdate'])->name('admin/billquery');
    Route::get('admin/server', [UsersController::class, 'server'])->name('admin/server');

    Route::get('admin/server', [UsersController::class, 'server'])->name('admin/server');
    Route::get('admin/noti', [UsersController::class, 'mes'])->name('admin/noti');
    Route::get('admin/air', [ProductController::class, 'air'])->name('admin/air');

    Route::get('admin/up/{id}', [UsersController::class, 'up'])->name('admin/up');
    Route::get('admin/up1/{id}', [ProductController::class, 'pair'])->name('admin/up1');
    Route::get('admin/profile/{username}', [UsersController::class, 'profile'])->name('admin/profile');
//    Route::get('admin/delete/{id}', [UserController::class, 'deleteuser'])->name('admin/delete');
});
