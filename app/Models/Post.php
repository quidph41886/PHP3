<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // code buổi 7
    protected $fillable = [
        'title',
        'image',
        'description',
        'content',
        'view',
        'cate_id',

    ];

    // Code buổi 8
    public function category() : BelongsTo{
return $this->belongsTo(Category::class, 'cate_id'); // lấy dữ liệu bên listPost
    }
}
