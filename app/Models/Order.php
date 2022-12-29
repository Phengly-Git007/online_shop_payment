<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id','first_name', 'last_name', 'email','phone','address1','address2','city','state','country','pincode','status','message','tracking_no','total','payment_mode','payment_id'];


    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
