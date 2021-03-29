<?php

namespace App\Http\Controllers;

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

Route::get('/', [HomeController::class, 'index'])
->name('home');

Route::get('/result', [Result\ResultController::class, 'index'])
->name('result');

Route::get('/detail', [ItemDetailController::class, 'index'])
->name('item-detail');
Route::post('/post-review', [PostReviewController::class, 'index'])
->name('post-review');


Route::middleware('islogged')->group(function () {
    Route::get('/chart',[Chart\ShowChartController::class, 'index'])
    ->name('show-chart');
    Route::post('/create-chart',[Chart\CreateChartController::class, 'index'])
    ->name('create-chart');
    Route::delete('/delete-chart',[Chart\DeleteChartController::class, 'index'])
    ->name('delete-chart');
    Route::delete('/delete-all-chart',[Chart\DeleteAllChartController::class, 'index'])
    ->name('delete-all-chart');

    Route::get('/my-order',[UserOrderController::class, 'index'])
    ->name('my-order');


    Route::get('/order-detail', [Payment\OrderDetailController::class, 'index'])
    ->name('order-detail');
    Route::put('/redirect-page', [Payment\RedirectPageController::class, 'index'])
    ->name('redirect-page');

});

Route::middleware('isadmin')->group(function () {    
      Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])
        ->name('admin-dashboard');

        Route::get('/item', [Admin\Item\ShowController::class, 'index'])
        ->name('show-item');
        Route::get('/item/create', [Admin\Item\CreateController::class, 'index'])
        ->name('create-item');
        Route::post('/item/store', [Admin\Item\StoreController::class, 'index'])
        ->name('store-item');
        Route::get('/item/edit', [Admin\Item\EditController::class, 'index'])
        ->name('edit-item');
        Route::put('/item/update', [Admin\Item\UpdateController::class, 'index'])
        ->name('update-item');
        Route::delete('/item/delete', [Admin\Item\DeleteController::class, 'index'])
        ->name('delete-item');

        Route::get('/item/edit/image', [Admin\Item\EditImageController::class, 'index'])
        ->name('edit-item-image');
        Route::post('/item/store/image', [Admin\Item\StoreImageController::class, 'index'])
        ->name('store-item-image');
        Route::delete('/item/delete/image', [Admin\Item\DeleteImageController::class, 'index'])
        ->name('delete-item-image');

        Route::get('/transaction/order/all', [Admin\Transaction\AllOrderController::class, 'index'])
        ->name('all-order');
        Route::get('/transaction/order/confirmed', [Admin\Transaction\ConfirmedOrderController::class, 'index'])
        ->name('confirmed-order');
        Route::get('/transaction/order/unconfirmed', [Admin\Transaction\UnconfirmedOrderController::class, 'index'])
        ->name('unconfirmed-order');
        Route::put('/transaction/order/confirm', [Admin\Transaction\ConfirmOrderController::class, 'index'])
        ->name('confirm-order');
        Route::put('/transaction/order/update', [Admin\Transaction\UpdateTransactionController::class, 'index'])
        ->name('update-transaction');
    });
}); 


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return 'Ulalalalalalal';
})->name('dashboard');


//if you cant use storage:link
/*
//product image
Route::get('storage/assets/ItemImage/{filename}', function ($filename)
{
    $path = storage_path('app/public/assets/ItemImage/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

//profile image
Route::get('storage/profile-photos/{filename}', function ($filename)
{
    $path = storage_path('app/public/profile-photos/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
*/