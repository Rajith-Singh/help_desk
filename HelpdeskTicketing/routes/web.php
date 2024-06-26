<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\NotificationController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

Route::get('/createticket', [HomeController::class, 'createticket'])->name('createticket');

Route::post('/createticket', [HomeController::class, 'uploadTicket'])->name('createticket');

Route::post('/inquiry', [HomeController::class, 'uploadInquiry'])->name('inquiry');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/mytickets', [HomeController::class, 'mytickets'])->name('mytickets');

Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');

Route::get('/services', [HomeController::class, 'services'])->name('services');

Route::get('/cancel_tickets/{id}', [HomeController::class, 'cancel_tickets']);

Route::get('/ticket', [AdminController::class, 'ticket'])->name('admin.ticket');

// Route::get('/showticket', [AdminController::class, 'showticket']);

Route::get('/replies', [AdminController::class, 'replies'])->name('admin.replies');

Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('admin.inquiries');

Route::get('/summary_report', [AdminController::class, 'summaryreport'])->name('admin.summary_report');

Route::post('/inquiry', [HomeController::class, 'uploadInquiry'])->name('inquiry');

Route::get('/approved/{id}',[AdminController::class,'approved']);

Route::get('/completed/{id}',[AdminController::class,'completed']);

Route::get('/inquiryapproved/{id}', [AdminController::class, 'inquiryapproved']);

Route::get('/inquirycompleted/{id}', [AdminController::class, 'inquirycompleted']);

// Route::get('/user', [AdminController::class, 'user'])->name('admin.user');

// Route::post('/upload-user', 'AdminController@uploadUser')->name('upload.user');

Route::post('/upload/user', [AdminController::class, 'uploadUser'])->name('upload.user');


Route::get('/send-email-form/{ticketId}', [AdminController::class, 'sendEmailForm'])->name('admin.send-email-form');
Route::post('/send-email/{ticketId}', [AdminController::class, 'sendEmail'])->name('admin.send-email');

Route::match(['get', 'post'], '/summary_report', [AdminController::class, 'showForm'])->name('summary_report.form');

Route::post('/summary_report_pdf', [AdminController::class, 'generatePDF'])->name('summary_report.pdf');

Route::get('/summary_report_pdf', [AdminController::class, 'generateSummaryReport']);


Route::get('/notifications/{userId}', [NotificationController::class, 'getUserNotifications'])->name('notifications.index');


Route::get('/api/users', 'TicketController@getUsers');
Route::post('/api/tickets/{id}/assign', 'TicketController@assignTicket');


Route::get('/ticket/{id}/reply', [AdminController::class, 'showReplyForm'])->name('ticket.reply');
Route::post('/ticket/{id}/reply', [AdminController::class, 'sendReply'])->name('ticket.sendReply');


Route::get('/user',function() {
    return view('admin.user');
});

Route::get('/user', [AdminController::class, 'index']);




Route::get('/ss', [AdminController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
