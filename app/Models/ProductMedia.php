<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'file_path',
        'is_primary',
        'sort_order',
    ];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($media) {
            if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
