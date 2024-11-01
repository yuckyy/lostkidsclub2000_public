<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $fillable = ['id','user_name','user_city','user_surname','user_phone','user_email','user_country','user_address','user_index','user_social_link','user_info','price','product_name','product_size','product_quantity'];
}
