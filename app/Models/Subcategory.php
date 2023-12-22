<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function items() : HasMany
    {
        return $this->hasMany(Item::class,'subcategory_id','id');
    }
}
