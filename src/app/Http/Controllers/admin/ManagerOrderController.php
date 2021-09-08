<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;
use App\Services\ManagerOrderService;
use DB;

class ManagerOrderController extends Controller
{

    public function index(ManagerOrderService $managerOrderService)
    {
        $data = $managerOrderService->getDatetime();
        $list_orders = Order::orderBy('id','desc')->get();
        return view('admin.order.index',$data,compact('list_orders'));
    }

    public function getOrderAllTime()
    {
        $data = Order::JoinUserSelectOrder()->orderBy('orders.id','desc')->paginate();
        return json_encode($data);
    }

    public function getOrderByDateTime(Request $request)
    {
        $data = Order::JoinUserSelectOrder()->ByDateTime($request->datetime)->orderBy('orders.id','desc')->paginate();
        return json_encode($data);
    }

    public function getOrderLastWeek(Request $request)
    {
        $data = Order::JoinUserSelectOrder()->LastWeek($request->start_week,$request->end_week)->orderBy('orders.id','desc')->paginate();
        return json_encode($data);
    }

    public function filterByDate(Request $request)
    {
        $inputDate1 = str_replace( substr( $request->inputDate1,  10, 1), " ", $request->inputDate1 );
        $inputDate2 = str_replace( substr( $request->inputDate2,  10, 1), " ", $request->inputDate2 );
        $data = Order::JoinUserSelectOrder()->filterByDate($inputDate1,$inputDate2)->orderBy('orders.id','desc')->paginate();
        return json_encode($data);
    }

    public function getOrderByStatus(Request $request)
    {
        $data = Order::JoinUserSelectOrder()->ByStatus($request->status_order)->orderBy('orders.id','desc')->paginate();
        return json_encode($data);
    }

    public function show($id_order)
    {
       $getOrderById = Order::ShowOrder($id_order)->first();
       return json_encode($getOrderById);
    }

    public function getListProductOrder($id_order)
    {
       $data = Product::JoinOrderProductAndImage()->SelectProductOrder()->WhereProductOrder($id_order)->paginate();
       return json_encode($data);
    }

    public function edit($id_oder)
    {
        return json_encode($id_oder);
    }

    public function update(Request $request, ManagerOrderService $managerOrderService,$id_oder)
    {
        try {
            $OBJ_Order = Order::find($id_oder);
            $OBJ_Order->update($request->all());
            if($request->has('btn_confirm')){
                toast(__('custom.Confirm order successful'),'success');
                $message = __('custom.successful order confirmation message');
            }
            else{
                toast(__('custom.Cancel order successful'),'success');
                $message = __('custom.failed order confirmation message');
            }
            $order_products = $OBJ_Order->order_product;
            $notify = $this->getMessage($OBJ_Order->users->name, $OBJ_Order->id, $OBJ_Order->total_money, $OBJ_Order->created_at);
            $managerOrderService->sendMail($message,$notify,$order_products,$OBJ_Order->user_id);
        }
        catch(Exception $ex){
            toast(__('custom.Update Status Order failure'),'error');
        }
        return redirect()->back();
    }

    public function getMessage($nameUser, $idOrders, $totalMoney, $created_at) {
        $date = checkLanguageWithDay($created_at);
        $message_en = "$nameUser has ordered product: Order Id is $idOrders. Total amount is $totalMoney. At $date.";
        $message_vi = "$nameUser đã đặt sản phẩm: Mã đơn hàng là $idOrders. Tổng số tiền là $totalMoney. Lúc $date.";
        return checkLanguage($message_en, $message_vi);
    }

    public function destroy($id_order)
    {
        DB::beginTransaction();
        try {
            Order::destroy($id_order);
            DB::commit();
            alert()->success(__('custom.Notification'),__('custom.Delete Order successful'));

        }
        catch(Exception $ex){
            DB::rollBack();
            toast(__('custom.Delete Order failure'),'error');
        }
        return redirect()->back();
    }

    public function export(){
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}
