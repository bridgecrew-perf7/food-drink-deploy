<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Enums\Status;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "id";

    protected $fillable = [
        'user_id',
        'total_money',
        'status'
    ];

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class,'order_id');
    }

    public function scopeByUserId($query, $userId)
    {
        return $query->where('user_id', $userId)->orderBy('created_at', 'DESC');
    }

    public function scopeFindById($query, $id)
    {
        return $query->find($id);
    }

    public function scopeByMonthYear($query, $month, $year)
    {
        return $query->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month);
    }

    public function scopeTotalAllPrice($query)
    {
         return $query->sum('total_money');
    }

    public function scopeTop5UsersOrdered($query)
    {
        return $query->groupBy('user_id')
            ->select('user_id', DB::raw('count(*) as number_ordered'), DB::raw('sum(total_money) as total_money'))
            ->orderBy('total_money')
            ->take(5);
    }

    public function scopeUpdateStatus($query, $orderId, $status)
    {
        return $query->findById($orderId)->update(['status' =>  $status]);
    }

    public function scopeJoinUserSelectOrder($query)
    {
        return $query->join('users','users.id','=','orders.user_id')
        ->select('orders.id as id_order','users.name','orders.total_money','orders.status as status_order','orders.created_at as order_date');
    }

    public function scopeByDateTime($query, $datetime)
    {
        return $query->where('orders.created_at','like','%'.$datetime.'%');
    }

    public function scopeLastWeek($query, $start_week,$end_week)
    {
        return $query->whereBetween('orders.created_at',[$start_week,$end_week]);
    }

    public function scopefilterByDate($query, $inputDate1,$inputDate2)
    {
        return $query->whereBetween('orders.created_at',[$inputDate1,$inputDate2]);
    }

    public function scopeByStatus($query, $status_order)
    {
        return $query->where('orders.status',$status_order);
    }

    public function scopeShowOrder($query, $id_order)
    {
        return $query->join('users','users.id','=','orders.user_id')
        ->select('orders.id as id_order','users.name','users.email','users.phone','users.address','orders.total_money','orders.status','orders.created_at as order_date')
        ->where('orders.id',$id_order);
    }

    public function scopeGetArrOrderMonth($query) 
    {
        return $query->selectRaw('COUNT(*) as count_orders')
        ->whereRaw("date_part('year', created_at) = " . date('Y'))
        ->groupByRaw("date_part('month', created_at)");     
    }

    public function scopeGetArrMonth($query) 
    {
        return $query->selectRaw("date_part('month', created_at) as month")
        ->whereRaw("date_part('year', created_at) = " . date('Y'))
        ->byStatus(Status::ACTIVE)
        ->groupByRaw("date_part('month', created_at)");
    }

}
