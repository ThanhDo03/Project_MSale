<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = 'id';

    protected $fillable = ['product_name', 'product_producer', 'product_price', 'product_image', 'product_amount','Staff','Status','product_des'];
}
