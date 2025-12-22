<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ProductMedia;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'cost_price',
        'selling_price',
        'stock',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($product) {
            $product->media->each(function ($media) {
                $media->delete();
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }
}
