<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use App\Model\Common\Customer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'loan_applications';

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function getTotalPriceAttribute()
    {
        if ($this->total_after_discount > 0) {
            return $this->total_after_discount;
        }

        return $this->details->sum(function ($detail) {
            return $detail->price * $detail->qty;
        }) - $this->discount_value;
    }

    public static function searchByFilter($request)
    {
        $result = self::query();

        if (!empty($request->code)) {
            $result = $result->where('code', 'like', '%' . $request->code . '%');
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }

    public static function formatFromNumber($n, $minDigits = 6)
    {
        $digits = max($minDigits, strlen((string)$n));
        return 'DH-' . str_pad($n, $digits, '0', STR_PAD_LEFT);
    }
}
