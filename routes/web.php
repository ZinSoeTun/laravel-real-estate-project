<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseImagesController;
use App\Http\Controllers\LikeController;

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
//user home Url
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/sale', [HomeController::class, 'sale'])->name('sale');
//rent Url
Route::get('/rent', [HomeController::class, 'rent'])->name('rent');
//apartment Url
Route::get('/apartment', [HomeController::class, 'apartment'])->name('apartment');
//villa Url
Route::get('/villa', [HomeController::class, 'villa'])->name('villa');
//townhouse Url
Route::get('/townhouse', [HomeController::class, 'townhouse'])->name('townhouse');
//penthouse Url
Route::get('/penthouse', [HomeController::class, 'penthouse'])->name('penthouse');
//retail Url
Route::get('/retail', [HomeController::class, 'retail'])->name('retail');
//like Url
Route::get('/like/{id}', [HomeController::class, 'like'])->name('like');
//unlike Url
Route::get('/dislike/{id}', [HomeController::class, 'dislike'])->name('dislike');
//house detail Url
Route::get('/house/detail/{id}', [HomeController::class, 'detail'])->name('house.detail');
//search query Url
Route::post('/search', [HomeController::class, 'search'])->name('search');
//contact Url
Route::post('/contact', [ContactController::class, 'contact'])->name('contact');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //prevent-back url
    Route::middleware(['prevent-back-history'])->group(function () {
        //user middle
        Route::middleware(['user'])->group(function () {
            //user URLs
            Route::prefix('users/')->group(function () {
                //profile
                Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
                Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
                Route::get('/profile/toChangePassword', [UserController::class, 'toChangePassword'])->name('user.profile.toChangePassword');
                Route::post('/profile/saveChange', [UserController::class, 'saveChange'])->name('user.profile.saveChange');
                Route::post('/profile/changePassword', [UserController::class, 'changePassword'])->name('user.profile.changePassword');
            });
        });


        ///admin middleware
        Route::middleware(['admin'])->group(function () {
            //admin URLs
            Route::prefix('admins/')->group(function () {
                //dashboard
                Route::get('/dashboard', [AdminController::class, 'home'])->name('admin.dashboard');

                //profile
                Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
                Route::post('/profile/saveChange', [AdminController::class, 'AdminSaveChange'])->name('admin.profile.saveChange');
                Route::post('/profile/changePassword', [AdminController::class, 'AdminChangePassword'])->name('admin.profile.changePassword');

                //logout
                Route::post('/profile/logout', [AdminController::class, 'logout'])->name('admin.profile.logout');

                //house
                Route::get('/house/create', [HouseController::class, 'createPage'])->name('admin.house.create');
                Route::get('/house/list', [HouseController::class, 'listPage'])->name('admin.house.list');
                Route::post('/house/houseCreate', [HouseController::class, 'houseCreate'])->name('admin.house.houseCreate');

                //house detail overview
                Route::get('/overview/create', [OverviewController::class, 'createOv'])->name('admin.overview.create');
                Route::post('/houses/overviewCreate', [OverviewController::class, 'overview'])->name('admin.houses.overviewCreate');
                Route::get('/overview/list', [OverviewController::class, 'listOv'])->name('admin.overview.list');
                Route::get('/overview/list/detail/{id}', [OverviewController::class, 'houseDetail'])->name('admin.overview.list.detail');
                Route::get('/overview/list/editPage/{id}', [OverviewController::class, 'editPage'])->name('admin.overview.list.editPage');
                Route::get('/overview/list/delete/{id}', [OverviewController::class, 'Delete'])->name('admin.overview.list.delete');
                Route::post('/houses/overview/edit/{id}', [OverviewController::class, 'Edit'])->name('admin.houses.overview.edit');
                Route::get('/overview/houseCreatePage', [HouseImagesController::class, 'creHouse'])->name('admin.overview.createHousePage');
                Route::post('/houses/overviewCreate/images', [HouseImagesController::class, 'houseImg'])->name('admin.houses.overviewCreate.houseImg');

                //user list
                Route::get('/userList', [AdminController::class, 'userList'])->name('admin.userList');
                Route::get('/userList/status/{id}', [AdminController::class, 'userStatus'])->name('admin.userList.userStatus');
                Route::get('/userList/detail/{id}', [AdminController::class, 'userDetail'])->name('admin.userList.detail');
                Route::get('/userList/delete/{id}', [AdminController::class, 'userDelete'])->name('admin.userList.delete');

                //admin list
                Route::get('/adminList', [AdminController::class, 'adminList'])->name('admin.adminList');
                Route::get('/adminList/detail/{id}', [AdminController::class, 'adminDetail'])->name('admin.adminList.detail');
                Route::get('/adminList/delete/{id}', [AdminController::class, 'adminDelete'])->name('admin.adminList.delete');

                //agent list
                Route::get('/agent/create', [AgentController::class, 'agentCreate'])->name('admin.agent.create');
                Route::post('/agent/agentCreate', [AgentController::class, 'agentData'])->name('admin.agent.agentCreate');
                Route::get('/agentList/detail/{id}', [AgentController::class, 'agentDetail'])->name('admin.agentList.detail');
                Route::get('/agent/list', [AgentController::class, 'agentList'])->name('admin.agent.list');
                Route::post('/agent/updateAgent/{id}', [AgentController::class, 'update'])->name('admin.agent.update');
                Route::get('/agent/updatePage/{id}', [AgentController::class, 'updatePage'])->name('admin.agent.updatePage');
                Route::get('/agent/delete/{id}', [AgentController::class, 'delete'])->name('admin.agent.delete');
            });
        });
    });
});
