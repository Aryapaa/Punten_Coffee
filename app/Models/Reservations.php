<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;

    protected $table = 'reservation';

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone_number',
        'date',
        'time',
        'person(s)',
        'created_at',
        'updated_at'
    ];

    
}


}
