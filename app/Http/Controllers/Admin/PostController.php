<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post; // ấn tab để use
use Illuminate\Http\Request;

class PostController extends Controller
{
    //code buổi 7 ; php artisan make:controller Admin\PostController
    public function test()
    {
        //Lấy toàn bộ dữ liệu
        $posts = Post::all();      // all lấy toàn bộ dữ liệu

        // - lấy  1 bản ghi
        // $posts = Post::all()->first();

        // - Lấy dữ liệu theo điều kiện
        // $posts = Post::where('cate_id', 1)->get();

        // - Tìm kiếm dữ liệu gần đúng
        // $posts = Post::query()
        // ->where('title', 'LIKE', '%aut%')->get();

        // - Các hàm trong SQL sum, count, avg ..... 
        //  $count = Post::query()
        //  ->where('cate_id', 1)
        //  ->count();

        // $sum = Post::query()->sum('view');
        // return $sum;
        //  return $count;

        // -Thêm dữ liệu
        //1: Sử dụng mảng
        // $data = [

        //     'title' => fake()->text(25),
        //     'image' => fake()->imageUrl(),
        //     'description' => fake()->text(30),
        //     'content' => fake()->paragraph(),
        //     'view' => rand(10, 1000),
        //     'cate_id' => rand(1,4),

        // ];
        // Post::query()->create($data);

        //2: Dùng đối tượng
        // $post = new Post();
        // $post->title = fake()->text();
        // $post->image = fake()->imageUrl();
        // $post->description = fake()->text(30);
        // $post->content = fake()->paragraph();
        // $post->view = rand(10, 1000);
        // $post->cate_id = rand(1, 4);
        // $post->save();

        // Cập nhật dữ liệu
        // Post::query()->find(1)->update([ // Update dữ liệu bảng 120 trong DB
        //     'title' => 'Update Title'
        // ]);

        // Post::query()->find(101)->delete();
        // return $posts;
    }

    public function index()
    {

        $posts = Post::query()->paginate(10);
        return view('listPost', compact('posts'));
    }


    //code buổi 8
    public function create()
    {

        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    // Lưu dữ liệu được thêm vào database
    public function store(Request $request)
    {
        $data = $request->except('image');
        $data['image'] = ''; // để ảnh null

        //Kiểm tra file ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }

        //Lưu data vào db
        Post::query()->create($data);
        return redirect()->route('post.index')->with('message', 'Thêm dữ liệu thành công');
    }

    //Code buổi 9
    // Xóa bài viết
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Xóa dữ liệu thành công');
    }

    // Hiển thị form edit
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories', 'post'));

    }

    //Cập nhật dữ liệu
    public function update(Request $request, Post $post)
    {
        $data   = $request->except('image');
        $old_image = $post->image;

        //Người dùng không upload ảnh mới
       $data['image'] = $old_image;
       
       // Người dùng update ảnh
       if($request->hasFile('image')){
        $path_image = $request->file('image')->store('images');
        $data['image']  = $path_image;
       }

       // update data
       $post->update($data);
       // xóa ảnh
       if ($request->hasFile('image')){
        if(file_exists('storage/' .$old_image)){
            unlink('storage/' .$old_image);
        }
       }
       return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');

    }
}
