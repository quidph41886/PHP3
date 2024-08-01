<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // viet code

    public function index(){

        $categories = DB::table('categories')->get();
        return view('admin/categories.index', compact('categories'));
    }
}
