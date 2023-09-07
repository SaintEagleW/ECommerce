<?php

use App\Models\Commodity as CommodityModel;
use App\Models\Login as LoginModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Database\Factories\CommodityFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});

Route::post('/a', function (Request $request) {
    $data = json_decode(Cache::get('c'), true);
    // print_r($data);
    $data[] = 1;
    Cache::put('c', json_encode($data));
    // Cache::add('c', []);
    // ['c'] = [];
    // $data = ['c'];
    // $data[] = $newData;
    // ['c'] = $data;
    // Cache::add('c', 1);
    // ['c'] = 1;
    // Cache::get('c');
    // ['c']

    // Cache::put();
    // Cache::set();
    // Cache::delete('c');
});

Route::get('/a', function (Request $request) {
    var_dump(Cache::get('c'));
});

Route::get('/commodities', function (Request $request) {
    // var_dump(session()->get('commodities', []));
    // return response()->json(session('commodities', []));
    // return response()->json(session()->get('commodities', []));
    // return response()->json(json_decode(Cache::get('commodities'), true));
    return response()->json(CommodityModel::all()->toArray());
});

Route::post('/commodities', function (Request $request) {
    $id = $request->input('id');
    $title = $request->input('title');
    $description = $request->input('description');
    $img = $request->input('img');
    $sku = $request->input('sku');
    $quantity = $request->input('quantity');
    $price = $request->input('price');

    // 建立新的商品
    $commodityModel = new CommodityModel();
    // $commodityModel->id = $id;
    $commodityModel->title = $title;
    $commodityModel->desc = $description;
    $commodityModel->img = $img;
    $commodityModel->sku = $sku;
    $commodityModel->quantity = $quantity;
    $commodityModel->price = $price;
    $commodityModel->save();
    // Cache::delete('commodities');
    // $data = json_decode(Cache::get('commodities'), true);

    // $data[] = [
    //     "title" => $title,
    //     "descriptionn" => $description,
    //     "img" => $img,
    //     "sku" => $sku,
    //     "quantity" => $quantity,
    //     "price" => $price
    // ];
    // Cache::put('commodities', json_encode($data));
});

class Commodity
{
    public $title;
    public $description;
    public $img;
    public $sku;
    public $quantity;
    public $price;

    public function __construct()
    {
        $this->title = "商品名稱";
        $this->description = "商品敘述";
        $this->img = "商品圖片";
        $this->sku = "單位";
        $this->quantity = 0;
        $this->price = 0;
    }
}

Route::post('/commodity', function (Request $request) {
    $title = $request->input('title');
    $description = $request->input('description');
    $img = $request->input('img');
    $sku = $request->input('sku');
    $quantity = $request->input('quantity');
    $price = $request->input('price');

    // $model = CommodityModel::factory()->create();
    // var_dump($model->toArray());

    // $commodityModel = new CommodityModel();
    // $commodityModel->title = $title;
    // $commodityModel->desc = $description;
    // $commodityModel->img = $img;
    // $commodityModel->sku = $sku;
    // $commodityModel->quantity = $quantity;
    // $commodityModel->price = $price;
    // var_dump($commodityModel->toArray());
    // $commodityModel->save();

    return response()->json(CommodityModel::where('price', '>', 3)->get()->toArray());
    // return response()->json(CommodityModel::all()->toArray());
});

Route::patch('/commodities', function (Request $request) {
    $title = $request->input('title');
    $description = $request->input('description');
    $img = $request->input('img');
    $sku = $request->input('sku');
    $quantity = $request->input('quantity');
    $price = $request->input('price');

    $model = CommodityModel::find($request->input('id'));
    $model->title = $title ?? $model->title;
    $model->desc = $description ?? $model->desc;
    $model->img = $img ?? $model->img;
    $model->sku = $sku ?? $model->sku;
    $model->quantity = $quantity ?? $model->quantity;
    $model->price = $price ?? $model->price;
    $model->save();
});

Route::delete('/commodities', function (Request $request) {
    $model = CommodityModel::find($request->input('id'));
    $model->delete();
});

Route::post('/user/register', [UserController::class, 'register']);

Route::post('/user/login', [UserController::class, 'login']);

Route::get('/test', [TestController::class, 'getTests']);

Route::get('/test', function () {
    echo LoginController::class;
});

Route::patch('/user/password', [UserController::class, 'resetPassword']);

Route::get('/user/profile', [UserController::class, 'getProfile']);
