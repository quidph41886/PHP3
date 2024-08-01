<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use GuzzleHttp\Promise\Create;
use Illuminate\Auth\Events\Login;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});


Route::get('/about', function () {
    return "Trang Giới Thiệu";
})->name('page.about');


Route::view('/contact', 'contact');
Route::get('/product/{id}', function (int $id) {
    return "PRODUCT ID: $id";
});


Route::get(
    '/product/{id}/comment/{comment_id}',
    function ($id, $comment_id) {
        return "Product ID:$id - comment id: $comment_id";
    }

)->where('id', '[0-9]+');

// Nhóm tiền tố đường dẫn
Route::prefix('admin')->group(function () {
    Route::get('product', function () {
        return "PRODUCT";
    });


    Route::get('/users', function () {
        return "USERS";
    });
});

// ÁP dụng query  buider 
// Route::get('/posts', function () {
// $posts = DB::table('posts')->get(); // Lấy dữ liệu bảng posts
// return $posts;


// Lấy dữ liệu theo số lượng bản ghi
// $posts = DB::table('posts')
// ->limit(10)
// ->get();


//Lấy ra tất cả các bài viết có lượt xem (View) > 800
// $posts = DB::table('posts')
// ->where('view', '>', 800)
// ->get();


//Cập nhật dữ liệu
// $posts = DB::table('posts')
// ->where('id', '=', 17)
// ->update([
//     'title' => 'Bài viết được cập nhật'
// ]);


// Xóa dữ liệu
//   $posts = DB::table('posts')
// ->where('id', '=', 28)
// ->delete();

//  $posts = DB::table('posts')
// ->where('view', '>', 800)
// ->get();


//  Nối 2 bảng Categories và posts
//     $posts = DB::table('posts')
//         ->join('categories', 'cate_id', '=', 'categories.id')
//         ->get();
//     return $posts;
// });


// Route::get('/post-list', function () {

//     $posts = DB::table('posts')->get();
//     return view('post-list', compact('posts')); // dùng hàm compact để truyền dữ liệu ra
// });



// code buổi học số 6 
// Route::prefix('category')->group(function () {
//     Route::get('/list', [CategoryController::class, 'index'])->name('category.index');

// });


//Buổi 7: Khai báo route
// Route::get('/test', [PostController::class, 'test']);

// Route::get('/posts', [PostController::class, 'index'])->name('post.index');

// //Buổi 8
// Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

// Route::post('/post/create', [PostController::class, 'store'])->name('post.store');

// Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');

// Route::put('/post/edit/{post}', [PostController::class, 'update'])->name('post.update');

// Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/test', [PostController::class, 'test']);
Route::middleware(AdminMiddleware::class, 'index')->group(function(){
 Route::get('/posts', [PostController::class, 'index'])->name('post.index');

//Buổi 8
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

Route::post('/post/create', [PostController::class, 'store'])->name('post.store');

Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');

Route::put('/post/edit/{post}', [PostController::class, 'update'])->name('post.update');

Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');

});


// Code buổi số 10 (login, register)
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/register',[LoginController::class,'Register'])->name('register');
Route::post('/register',[LoginController::class,'postRegister'])->name('postRegister');








