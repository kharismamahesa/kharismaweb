<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'po_id',
        'product_id',
        'preorder_price',
    ];

    public function preorder()
    {
        return $this->belongsTo(Preorder::class, 'po_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
