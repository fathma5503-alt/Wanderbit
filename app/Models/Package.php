<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    protected $fillable = [
        'title', 
        'slug', 
        'price', 
        'duration_days', 
        'featured_image', 
        'other_images',  // Add this line
        'category_id', 
        'description', 
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
 
    public function getOtherImagesUrlsAttribute()
    {
        return $this->other_images ? json_decode($this->other_images) : [];
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}