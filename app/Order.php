<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const STATUS_NOACTION = 0;
    const STATUS_CONFIRMED = 1;
    const STATUS_REJECTED = 2;

    public function orderList($id = null)
    {
        $arr = [
            self::STATUS_NOACTION => 'No action',
            self::STATUS_CONFIRMED => 'Confirmed',
            self::STATUS_REJECTED => 'Rejected',
        ];
        if ($id !== null) {
            unset($arr[$id]);
        }
        return $arr;
    }

    protected $table = 'orders';
    protected $fillable = ['user_id', 'price', 'quantity', 'product_id', 'total_coast', 'status', 'courier_id', 'delivery'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Medicine::class, 'product_id', 'id');
    }

    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id', 'id');
    }

    public function getStatusTitleAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'No action';
            case 1:
                return 'Confirmed';
            case 2:
                return 'Rejected';
            default:
            {
                return 'None';
            }
        }
    }

    public function allCouriers($courier_id = null)
    {
        $couriers = User::where('role', 3)->get();
        if ($courier_id !== null) {
            unset($couriers[$courier_id]);
        }
        return $couriers;
    }

    public function deliveryStatus($delivery = null)
    {
        $status = [
            'Not delivered' => 'yellow',
            'One the way' => 'blue',
            'Delivered' => 'green',
        ];
        if ($delivery !== null) {
            unset($status[$delivery]);
        }
        return $status;
    }

    public function deliveryColors()
    {
        return [
            'Not delivered' => 'rgba(255, 255, 0, 0.3)',    // жёлтый, 30% прозрачности
            'One the way'    => 'rgba(0, 0, 255, 0.3)',       // синий
            'Delivered'     => 'rgba(0, 128, 0, 0.3)',       // зелёный
        ];
    }

}
