<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\Categories;
use App\Services\ManagerOrderService;
use DB;

class AdminController extends Controller
{
    public function index(ManagerOrderService $managerOrderService)
    {   
        # get an array containing the number of orders for each month(lấy ra một mảng chứa số đơn đặt hàng của từng tháng).
        $arr_Orders = Order::GetArrOrderMonth()->pluck('count_orders');
        # get an array of months from 1 -> 12(lấy ra một mảng tháng từ 1 -> 12).
        $arr_Months = Order::GetArrMonth()->pluck('month');
        $number_of_orders = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        
        foreach ($arr_Months as $index => $month) {
            $number_of_orders[$month - 1] = $arr_Orders[$index];
        }

        # get top 5 most ordered products this month(lấy ra top 5 sản phẩm được đặt hàng nhiều nhất trong tháng này).
        // $datetime = $managerOrderService->getDatetime();
        // $amount_of_orders = Product::ProductJoinOrderProduct()
        // ->WhereProduct($datetime['this_month'])
        // ->SelectProducOrder()
        // ->pluck('amount_of_order');

        // $name_products = Product::ProductJoinOrderProduct()
        // ->WhereProduct($datetime['this_month'])
        // ->SelectProducName()
        // ->pluck('amount_of_order','name_product');
        
        // $amount_ofs = [];
        // foreach($amount_of_orders as $index => $amount_of_order){
        //     $amount_ofs[$index] = $amount_of_order;
        // }

        // $names = [];
        // foreach($name_products as $index => $name_product){
        //     $names[$index] = $name_product;
        // }

        $statistic_total['Gross_Product'] = Product::count();
        $statistic_total['Total_Order'] = Order::count();
        $statistic_total['Total_Category'] = Categories::count();
        $statistic_total['Total_Revenue'] = Order::sum('total_money');


        return view('admin.index')->with([
            'number_of_orders' => $number_of_orders,
            // 'amount_ofs' => $amount_ofs,
            // 'name_products' => $names,
            'statistic_total' => $statistic_total
        ]);
    }
}