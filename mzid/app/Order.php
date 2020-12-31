<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'Orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'user_email', 'name', 'address', 'city', 'pincode', 'province', 'mobile', 'coupon_code', 'coupon_amount',
        'order_status', 'image_poof', 'payment_method', 'grand_total', 'session_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getDate()
    {
        $format_date = \Carbon\Carbon::parse($this->attributes['updated_at'])->isoFormat('dddd, D MMMM Y HH:mm');
        return $format_date;
    }
}
