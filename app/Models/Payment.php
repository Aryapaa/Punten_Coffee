<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

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
}
