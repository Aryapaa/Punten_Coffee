<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'id',
        'name',
        'price',
        'stock',
        'photo',
        'subcategory_id',
        'created_at',
        'updated_at'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
