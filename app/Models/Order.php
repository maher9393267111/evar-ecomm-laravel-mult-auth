<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','order_number','sub_total','product_id','total_amount','quantity','delivery_charge','coupon','payment_method','payment_status','note','condition','first_name','last_name','email','phone','postcode','address','city','state','sfirst_name','slast_name','semail','sphone','spostcode','saddress','scity','sstate'];
}
