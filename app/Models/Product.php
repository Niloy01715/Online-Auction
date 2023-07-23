<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id','category_id','product_name','price','product_image','status'];

    // public function Manyproduct()
    // {
    //     return $this->hasMany(Category::class);
    // }
}
