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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

Route::get('/result', [App\Http\Controllers\Result\ResultController::class, 'index'])
->name('result');

Route::get('/detail', [App\Http\Controllers\ItemDetailController::class, 'index'])
->name('item-detail');
Route::post('/post-review', [App\Http\Controllers\PostReviewController::class, 'index'])
->name('post-review');


Route::middleware('islogged')->group(function () {
    Route::get('/chart',[App\Http\Controllers\Chart\ShowChartController::class, 'index'])
    ->name('show-chart');
    Route::post('/create-chart',[App\Http\Controllers\Chart\CreateChartController::class, 'index'])
    ->name('create-chart');
    Route::delete('/delete-chart',[App\Http\Controllers\Chart\DeleteChartController::class, 'index'])
    ->name('delete-chart');
    Route::delete('/delete-all-chart',[App\Http\Controllers\Chart\DeleteAllChartController::class, 'index'])
    ->name('delete-all-chart');

    Route::get('/my-order',[App\Http\Controllers\UserOrderController::class, 'index'])
    ->name('my-order');


    Route::get('/order-detail', [App\Http\Controllers\Payment\OrderDetailController::class, 'index'])
    ->name('order-detail');
    Route::put('/redirect-page', [App\Http\Controllers\Payment\RedirectPageController::class, 'index'])
    ->name('redirect-page');

});

Route::middleware('isadmin')->group(function () {    
      Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('admin-dashboard');

        Route::get('/item', [App\Http\Controllers\Admin\Item\ShowController::class, 'index'])
        ->name('show-item');
        Route::get('/item/create', [App\Http\Controllers\Admin\Item\CreateController::class, 'index'])
        ->name('create-item');
        Route::post('/item/store', [App\Http\Controllers\Admin\Item\StoreController::class, 'index'])
        ->name('store-item');
        Route::get('/item/edit', [App\Http\Controllers\Admin\Item\EditController::class, 'index'])
        ->name('edit-item');
        Route::put('/item/update', [App\Http\Controllers\Admin\Item\UpdateController::class, 'index'])
        ->name('update-item');
        Route::delete('/item/delete', [App\Http\Controllers\Admin\Item\DeleteController::class, 'index'])
        ->name('delete-item');

        Route::get('/item/edit/image', [App\Http\Controllers\Admin\Item\EditImageController::class, 'index'])
        ->name('edit-item-image');
        Route::post('/item/store/image', [App\Http\Controllers\Admin\Item\StoreImageController::class, 'index'])
        ->name('store-item-image');
        Route::delete('/item/delete/image', [App\Http\Controllers\Admin\Item\DeleteImageController::class, 'index'])
        ->name('delete-item-image');

        Route::get('/transaction/order/all', [App\Http\Controllers\Admin\Transaction\AllOrderController::class, 'index'])
        ->name('all-order');
        Route::get('/transaction/order/confirmed', [App\Http\Controllers\Admin\Transaction\ConfirmedOrderController::class, 'index'])
        ->name('confirmed-order');
        Route::get('/transaction/order/unconfirmed', [App\Http\Controllers\Admin\Transaction\UnconfirmedOrderController::class, 'index'])
        ->name('unconfirmed-order');
        Route::put('/transaction/order/confirm', [App\Http\Controllers\Admin\Transaction\ConfirmOrderController::class, 'index'])
        ->name('confirm-order');
        Route::put('/transaction/order/update', [App\Http\Controllers\Admin\Transaction\UpdateTransactionController::class, 'index'])
        ->name('update-transaction');
    });
}); 


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return abort(404);
})->name('dashboard');

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
