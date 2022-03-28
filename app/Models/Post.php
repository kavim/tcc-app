<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImageHelper;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'description',
        'body',
        'category_id',
        'user_id',
        'active',
        'order',
        'featured_image'
    ];

    public function getFeaturedImage(): string
    {
        return $this->featured_image ? ImageHelper::checkIfIsALink($this->featured_image) : asset('images/default-post-img.jpg');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
