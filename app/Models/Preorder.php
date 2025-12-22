<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'description',
        'started_at',
        'closed_at',
        'estimated_arrival_at',
        'status',
        'created_by',
    ];

    public function items()
    {
        return $this->hasMany(PoItem::class, 'po_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
