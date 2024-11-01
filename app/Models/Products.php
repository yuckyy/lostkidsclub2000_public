<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','name', 'description' , 'price' , 'image' , 'cat_id' , 'lastdrop' , 'sale_off' , 'show' , 'description_ua' , 'xs', 's' , 'm' ,'l', 'xl'];
}
