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
        'date',
        'order_id',
        'jenis_pembayaran',
        'nilai',
        'email',
        'status'
    ];

    public $timestamps = false;
}
