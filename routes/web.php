<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;

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
    $products = [
        [
            'image' => 'https://stickersofast.com/images/%E7%85%A7%E7%89%87%E9%A6%AC%E5%85%8B%E6%9D%AF/picmug.png?1',
            'title' => '商品A',
            'price' => 100
        ],
        [
            'image' => 'https://stickersofast.com/images/%E7%85%A7%E7%89%87%E9%A6%AC%E5%85%8B%E6%9D%AF/picmug.png?1',
            'title' => '商品A',
            'price' => 100
        ],
        [
            'image' => 'https://stickersofast.com/images/%E7%85%A7%E7%89%87%E9%A6%AC%E5%85%8B%E6%9D%AF/picmug.png?1',
            'title' => '商品A',
            'price' => 100
        ],
        [
            'image' => 'https://stickersofast.com/images/%E7%85%A7%E7%89%87%E9%A6%AC%E5%85%8B%E6%9D%AF/picmug.png?1',
            'title' => '商品A',
            'price' => 100
        ],
        [
            'image' => 'https://stickersofast.com/images/%E7%85%A7%E7%89%87%E9%A6%AC%E5%85%8B%E6%9D%AF/picmug.png?1',
            'title' => '商品A',
            'price' => 100
        ],
        [
            'image' => 'https://stickersofast.com/images/%E7%85%A7%E7%89%87%E9%A6%AC%E5%85%8B%E6%9D%AF/picmug.png?1',
            'title' => '商品A',
            'price' => 100
        ]
    ];

    return view('index')->with('products', $products);
});

Route::get('/register', function () {
    return view('register');
});

// Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', function () {
    return view('login');
});

// Route::post('/login', [RegisterController::class, 'login'])->name('login');

Route::get('/resetpassword', function () {
    return view('resetPassword');
});

Route::get('/profile', function (Request $request) {
    return view('profile', ['email' => $request->input('email')]);
});
