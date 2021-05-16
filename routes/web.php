<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
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



Route::get("user_register",[AuthenticationController::class,"show_user_register"])->name('user_register');
Route::post("postregister",[AuthenticationController::class,"show_user_post_register"])->name("postregister");


		Route::get("/",[AuthenticationController::class,"show_login"])->name("login");
		Route::post("admin_postlogin",[AuthenticationController::class,"post_login"])->name("postlogin");


		Route::group(['middleware' => ['admincheckexiste']], function () {

			Route::get("dashboard",[AuthenticationController::class,"show_dashboard"])->name("dashboard");
		    Route::get("logout",[AuthenticationController::class,"logout"])->name("logout");


		   

		    Route::get("change_password",[AuthenticationController::class,"show_change_password"])->name("change-password");
		    Route::post("update_change_password",[AuthenticationController::class,"show_update_change_password"])->name('update-change-password');
		    Route::get("checkadminpassword/{val}",[AuthenticationController::class,"update_check_password"]);

		    Route::get("users",[UserController::class,"show_users"])->name("users");
		    Route::get("users_data_table",[UserController::class,"users_data_table"])->name("users_data_table");


		    Route::get("birthday",[UserController::class,"show_birthday_users"])->name("birthday");
		    Route::get("birthday_data_table",[UserController::class,"birthday_data_table"])->name("birthday_data_table");


		    Route::get("anniversary",[UserController::class,"show_anniversary"])->name("anniversary");
		    Route::get("anniversary_data_table",[UserController::class,"anniversary_data_table"])->name("anniversary_data_table");

		    Route::get("changeuserstatus",[UserController::class,"show_change_user_status"]);
		});

