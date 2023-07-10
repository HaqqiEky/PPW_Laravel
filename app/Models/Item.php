<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'brand',
        'jenis',
        'serial_number', 
        'photo', 
        'description',
        'harga',
    ];

    protected static function newFactory()
    {
        return \Database\Factories\ItemFactory::new();
    }

    protected $primaryKey = 'id';
}
