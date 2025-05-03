<?php

use App\Http\Controllers\ActivationPaymentController;
use App\Http\Controllers\ActivationPaymentApprovalController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\Mailcontroller;
use App\Http\Controllers\membershipController;
use App\Http\Controllers\MembershipPlanController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlaygroundPaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\userController;
use App\Http\Controllers\WithdrawalController;
use App\Models\MembershipPlan;
use App\Models\Notice;
use App\Models\Review;
use App\Models\Shedule;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $schedules = Shedule::all();
    $membershipPlans = MembershipPlan::all();
    $notices = Notice::all();
    $reviews = Review::all();
    return view('welcome', compact('schedules', 'membershipPlans', 'notices', 'reviews'));
});

Route::get('/send-mail/{id}/send', [Mailcontroller::class, 'index'])->name('send.mail');

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'view'])->name('admin.dashboard');
    Route::get('/admin/manageUsers', [AdminDashboardController::class, 'view3'])->name('admin.manageUsers');
    Route::get('/admin/createNewUsers', [AdminDashboardController::class, 'view1'])->name('admin.createNewUsers');
    Route::get('/admin/user/{id}/edit', [AdminDashboardController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/user/{id}/update', [AdminDashboardController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/{id}/view', [AdminDashboardController::class, 'view2'])->name('admin.user_view');
    Route::get('/admin/{id}/approve', [AdminDashboardController::class, 'approve'])->name('admin.approve');
    Route::get('/admin/{id}/delete', [AdminDashboardController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/manageEquipment', [EquipmentController::class, 'index'])->name('admin.manageEquipment');
    Route::get('/admin/createEquip', [EquipmentController::class, 'index1'])->name('admin.createEquip');
    Route::post('/admin/createEquipment', [EquipmentController::class, 'store'])->name('admin.createEquipment');
    Route::get('/admin/equipment/{id}/editEquip', [EquipmentController::class, 'edit'])->name('equipment.edit');
    Route::put('/admin/equipment/{id}/update', [EquipmentController::class, 'update'])->name('equipment.update');
    Route::put('/admin/equipmentr/{id}/update', [EquipmentController::class, 'reminderupdate'])->name('equipment.rupdate');
    Route::delete('/admin/{id}/deleteEquip', [EquipmentController::class, 'destroy'])->name('equipment.destroy');
    Route::get('/admin/manageSchedule', [ScheduleController::class, 'index'])->name('admin.manageSchedule');
    Route::get('/admin/createSche', [ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('/admin/createSchedule', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('/admin/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('/admin/schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::get('/admin/manageMembership', [MembershipPlanController::class, 'index'])->name('admin.manageMembership');
    Route::get('admin/membership/{membership}/edit', [MembershipPlanController::class, 'edit'])->name('admin.editMembership');
    Route::put('admin/membership/{membership}', [MembershipPlanController::class, 'update'])->name('admin.updateMembership');
    Route::get('/admin/createMem', [MembershipPlanController::class, 'create'])->name('admin.createMem');
    Route::post('/admin/createMembership', [MembershipPlanController::class, 'store'])->name('admin.createMembership');
    Route::get('/admin/activation-payments', [ActivationPaymentController::class, 'index'])->name('admin.activation.index');
    Route::post('/admin/activation-payments/approve/{paymentId}', [ActivationPaymentController::class, 'approve'])->name('admin.activation.approve');
    Route::get('/admin/playground-payments', [PlaygroundPaymentController::class, 'index'])->name('admin.playground.index');
    Route::post('/admin/playground-payments/approve/{paymentId}', [PlaygroundPaymentController::class, 'approve'])->name('admin.playground.approve');
    Route::get('/admin/timeManage', [TimeController::class, 'index'])->name('admin.timeManage');
    Route::get('/admin/createTime', [TimeController::class, 'create'])->name('admin.createTime');
    Route::post('/admin/createTime', [TimeController::class, 'store'])->name('admin.storeTime');
    Route::get('/admin/{id}/editTime', [TimeController::class, 'edit'])->name('admin.editTime');
    Route::put('/admin/{id}/update', [TimeController::class, 'update'])
        ->name('admin.updateTime');
    Route::get('/admin/manageReview', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/admin/createReview', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/admin/createReview', [ReviewController::class, 'store'])->name('review.store');
    Route::post('/admin/manageReview/{id}/approve', [ReviewController::class, 'approve'])->name('review.approve');
    Route::get('/admin/manageReview/{id}/delete', [ReviewController::class, 'destroy'])->name('review.delete');
    Route::get('/admin/manageReqPayments', [PaymentController::class, 'index1'])->name('admin.manageReqPayments');
    Route::post('/admin/manageReqPayments/{id}/approve', [PaymentController::class, 'approve'])->name('admin.approveReqPayments');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //user
    Route::get('/user', [userController::class, 'index'])->name('user.dashboard');
    Route::post('/user/activation/payment', [ActivationPaymentController::class, 'store'])->name('activation.payment');
    Route::post('/user/playground/payment', [PlaygroundPaymentController::class, 'store'])->name('playground.payment');
    Route::get('/user/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/user/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/user/payments', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/user/deposit', [PaymentController::class, 'deposit'])->name('payment.deposit');
    Route::get('user/{user}/idcard', [userController::class, 'downloadIdCard'])->name('members.idcard');

    Route::resource('notices', NoticeController::class);
    // 
    Route::get('/withdrawals', [WithdrawalController::class, 'index'])->name('withdrawals.index');
    Route::post('/withdrawals', [WithdrawalController::class, 'store'])->name('withdrawals.store');
    Route::post('/withdrawals/accept/{id}', [WithdrawalController::class, 'accept'])->name('withdrawals.accept');
    Route::post('/withdrawals/reject/{id}', [WithdrawalController::class, 'reject'])->name('withdrawals.reject');
});

require __DIR__ . '/auth.php';
