<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order_detail';

    protected $fillable = [
        'id',
        'item_id',
        'item_name',
        'item_price',
        'qty',
        'created_at',
        'updated_at'
    ];
}
