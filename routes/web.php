<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\VideoCallController;
use App\Http\Controllers\webpushNotificationController;
use App\Http\Controllers\socialLoginController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');

    Route::post('login', [AuthController::class, 'index'])->name('login');
    Route::get('register', [RegisteredUserController::class, 'index'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('post.register');

    Route::get('forgot-password', [PasswordResetController::class, 'index'])->name('forgot.password');
});

Route::get('/login/instagram', [socialLoginController::class, 'redirectToInstagram']);
Route::get('/login/instagram/callback', [socialLoginController::class, 'handleInstagramCallback']);

Route::get('/login/{social}', [socialLoginController::class, 'index'])->where('social', 'facebook|google|instagram');

Route::get('/login/{social}/callback', [socialLoginController::class, 'store'])->where('social', 'facebook|google|instagram');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    #---- chat routes ---#
    Route::get('/get-users', [ChatController::class, 'getUsers'])->name('get.users');
    Route::get('/get-contacts', [ChatController::class, 'getContacts'])->name('get.contacts');
    Route::get('/get-messages', [ChatController::class, 'getMessages']);
    Route::get('/count-unread-messages', [ChatController::class, 'getUnreadMessagesCount']);
    Route::post('/send-message', [ChatController::class, 'sendMessage']);
    Route::get('/get-calls', [ChatController::class, 'getCalls']);
    Route::get('/media-dowload/{type}/{messageId}', [ChatController::class, 'downloadMessageMedia']);
    Route::post('/mute-user', [ChatController::class, 'muteUser']);
    Route::post('/delete-chat', [ChatController::class, 'deleteChat']);
    Route::post('/delete-thread', [ChatController::class, 'deleteThread']);
    Route::post('/create-thread', [ChatController::class, 'createThread']);
    Route::get('/get-user-details/{threadId}', [ChatController::class, 'getUserDetails']);
    Route::post('/update-status', [ChatController::class, 'updateUserChatStatus']);
    Route::get('/get-users-list', [ChatController::class, 'getUsersList']);

    Route::post('/forward-message', [ChatController::class, 'forwardMessage']);
    Route::post('/message-reaction', [ChatController::class, 'messageReaction']);

    Route::post('/update-socekt-token', [AuthController::class, 'updateSocketId']);

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/update-profile', [AuthController::class, 'updateProfile']);


    Route::post('/save-call-logs', [VideoCallController::class, 'saveCallLogs']);
    Route::get('/fetchCallLogs', [VideoCallController::class, 'fetchCallLogs'])->name('fetchCallLogs');
    Route::post('/token', [VideoCallController::class, 'generateToken'])->name('token');
    Route::get('/video-call', [VideoCallController::class, 'index'])->name('video');

    Route::post('/update-socekt-token', [VideoCallController::class, 'updateSocketId']);

    Route::post('/save-token', [webpushNotificationController::class, 'saveToken'])->name('save-token');
});
