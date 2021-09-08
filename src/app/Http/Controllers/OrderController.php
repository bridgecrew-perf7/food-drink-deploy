<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Cart;
use Illuminate\Support\Facades\Auth;
use wataridori\ChatworkSDK\ChatworkRoom;
use wataridori\ChatworkSDK\ChatworkSDK;
use App\Services\OrderService;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderNotify;

class OrderController extends Controller
{
    protected $orderService;

    /**
     * Instantiate a new Order service instance.
     *
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Insert Products when order.
     *
     * @return Response
     */
    public function orderProduct ()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (empty($user->phone) || empty($user->address)) {
                return redirect('profile')->with([
                  'message' => __('custom.message_profile_update_information'),
                  'alert' => 'alert-danger',
                ]);
            }
            # Get Id User login, Total all carts
            $userId = $user->id;
            $totalAllCarts = $this->replacePrice(Cart::subtotal());
            # Insert Orders to DB
            $orderId = $this->orderService->create($userId, $totalAllCarts);
            # Check error when insert data
            if (empty($orderId)) {
                return redirect()->route('cart')->with([
                    'message' => __('custom.message_order_error_db'),
                    'alert' => 'alert-danger',
                ]);
            }
            # Get Orders last insert
            $order = Order::findById($orderId);
            $total = formatPrice($totalAllCarts);
            $order_products = $order->order_product;
            # Get Message Send mail and send Chatwork
            $message = $this->getMessage($user->name, $orderId, $total, $order->created_at);
            # Send mail to Admin
            $this->sendMail($message, $order_products);
            if(count(Mail::failures()) > 0) {
                return redirect()->route('cart')->with([
                  'message' => __('custom.message_order_error_db'),
                  'alert' => 'alert-danger',
                ]);
            }
            # Sent message to Chatwork
            $this->sendMessageToChatwork($message);

            #send notification to admin
            $this->orderService->notification($user->id,$user->name,$user->image,$total,$order->created_at);

            # Destroy Carts
            Cart::destroy();

            return redirect('/profile#tab2primary')->with([
                'message' => __('custom.message_orders_success'),
                'alert' => 'alert-success',
            ]);

        }
        abort(404);
    }

    /**
     * Cancel Product.
     *
     * @param OrderRequest $request
     * @return Response
     */
    public function cancelOrder(OrderRequest $request)
    {
        if (isset($request->orderId)) {
            $arr_message = $this->orderService->cancelOrder($request->orderId);

            return back()->with($arr_message);
        }

        return abort(404);
    }

    # Format Price
    private function replacePrice($price)
    {
        $strPrice = str_replace(',', '', $price);
        return (float)$strPrice;
    }

    # Send message to Chatwork when user order.
    private function sendMessageToChatwork ($message)
    {
        ChatworkSDK::setApiKey(config('app.apiKeyChatwork'));
        $room = new ChatworkRoom(config('app.roomIdChatwork'));
        $room->sendMessageToAll($message, true);
    }

    /**
     * Send mail to all Admin.
     *
     * @param $message
     */
    private function sendMail($message, $order_products) {
        $users = User::byRole(UserRole::getKey(0))->get();
        foreach ($users as $user) {
            $details = ['title' => __('custom.mail_order'), 'body' => $message, 'orders' => $order_products];
            Mail::to($user->email)->send(new \App\Mail\AdminMail($details));
        }
    }

    # Get message.
    private function getMessage($name, $idOrders, $totalAmount, $created_at) {
        $date = checkLanguageWithDay($created_at);
        $message_en = "$name has ordered product: Order Id is $idOrders. Total amount is $totalAmount. At $date.";
        $message_vi = "$name đã đặt sản phẩm: Mã đơn hàng là $idOrders. Tổng số tiền là $totalAmount. Lúc $date.";
        return checkLanguage($message_en, $message_vi);
    }
}
