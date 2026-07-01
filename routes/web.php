<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CourseController;


Route::get('/', function () {
    return redirect()->route('student.login');
});

// Authentication routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Student route
Route::get('/student/login', [AuthController::class, 'showStudentLoginForm'])->name('student.login');
Route::post('student/login', [AuthController::class, 'studentlogin'])->name('studentpost.login');

Route::get('/student/dashboard', [DashboardController::class, 'studentIndex'])
    ->name('student.dashboard')
    ->middleware('auth:student');

// Profile routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'showProfile'])->name('profile');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');  
    Route::get('/admin/settings', [AdminController::class, 'showSettings'])->name('settings');
    Route::post('/admin/settings', [AdminController::class, 'changePassword'])->name('change-password');
});


// Home route
Route::get('/home', [HomeController::class, 'index'])->middleware('auth'); // Ensure authentication middleware if required

// Register student routes
Route::get('/register-student', [UserRegistrationController::class, 'showForm'])->name('register-student');
Route::post('/register-student', [UserRegistrationController::class, 'register'])->name('register-student.register');


// Route to view all students
Route::get('/view-students', [UserRegistrationController::class, 'viewAllStudents'])->name('view-students');
Route::get('/view-student/{id}', [UserRegistrationController::class, 'viewStudent'])->name('view-student');
Route::delete('/student/accounts/{id}/delete', [UserRegistrationController::class, 'destroy'])->name('student.accounts.delete');

// booking hostel
    Route::get('/book-hostel', [RegistrationController::class, 'create'])->name('registration.create');
    Route::post('/book-hostel', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::get('students/book-hostel', [RegistrationController::class, 'createstudentregister'])->name('book-hostel');
    Route::get('students/log-activity', [RegistrationController::class, 'logActivity'])->name('log-activity');
    Route::get('students/my-room-details', [RegistrationController::class, 'studentDetails'])->name('room-details');


// Define route for getting seater information
Route::post('get-seater', [RegistrationController::class, 'getSeater'])->name('get-seater');

// Define route for fetching fee per month (FPM)
Route::post('/ajax/get-fpm', [RegistrationController::class, 'getFpm'])->name('ajax.getFpm');

// Define route for checking room availability
Route::post('/ajax/check-availability', [RegistrationController::class, 'checkAvailability'])->name('ajax.checkAvailability');

// Define route for calculating amount
Route::post('/ajax/get-amount', [RegistrationController::class, 'getAmount'])->name('ajax.getAmount');

// Route to view all registrations
Route::get('manage-students', [RegistrationController::class, 'index'])->name('manage-students');

// Route to delete a registration
Route::get('manage-students/delete/{id}', [RegistrationController::class, 'destroy'])->name('manage-students.destroy');

// Route to view a single student's profile
Route::get('students-profile/{id}', [RegistrationController::class, 'show'])->name('students-profile');

// Managing rooms
Route::get('/manage-rooms', [RoomController::class, 'index'])->name('manage-rooms');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('create-room');
Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('edit-room');
Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');


// Managing course
Route::get('manage-courses', [CourseController::class, 'index'])->name('manage-courses');
Route::get('courses/create', [CourseController::class, 'create']);
Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('courses/{id}/edit', [CourseController::class, 'edit']);
Route::put('courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('courses/{id}', [CourseController::class, 'destroy']);



