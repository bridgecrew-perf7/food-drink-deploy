<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = "order_product";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function scopeOrderProductJoin($query)
    {
        return $query->join('products','products.id','=','order_product.product_id')->join('images','images.product_id','=','products.id');
    }

    public function scopeWhereStatisticProduct($query,$time)
    {
        return $query->where('images.STT',1)->where('order_product.created_at','like','%'.$time.'%');
    }

    public function scopeSelectStatisticProduct($query)
    {
        return $query->select('products.id as id_product','products.name','images.image','order_product.created_at as datetime',
        DB::raw('sum(order_product.amount_of) as amount_of_order'),
        DB::raw('sum(order_product.total_money) as total_money_order_product'))
        ->groupBy('order_product.product_id')
        ->orderBy('amount_of_order','desc');
    }

    public function scopeLastWeek($query,$start_week,$end_week)
    {
        return $query->where('images.STT',1)->whereBetween('order_product.created_at',[$start_week,$end_week]);
    }
}