<?php

namespace App\Services;

use App\Enums\Status;
use App\Models\Order;
use DB;
use Cart;
use App\Models\Product;
use App\Events\OrderNotificationEvent;
use App\Models\Notification;

class OrderService {

    /**
     * Insert Products to Orders.
     *
     * @param $userId
     * @param $totalAllCarts
     * @return bool
     */
    public function create($userId, $totalAllCarts)
    {
        # Init actions
        DB::beginTransaction();
        try {
            # Get timestamps now
            $timestamps = \Carbon\Carbon::now();
            # Insert Orders to DB
            $idOrders = DB::table('orders')->insertGetId([
                'user_id'     => $userId,
                'total_money' => $totalAllCarts,
                'status'      => Status::BLOCK,
                "created_at"  => $timestamps,
                "updated_at"  => $timestamps,
            ]);
            # Get Products in Cart
            $products = Cart::content();
            # Insert Order Products to DB
            foreach ($products as $product) {
                $totalProduct = $this->replacePrice($product->subtotal());
                # Insert Product to Order Product
                DB::table('order_product')->insert([
                    'product_id'  => $product->id,
                    'amount_of'   => $product->qty,
                    'total_money' => $totalProduct,
                    'order_id'    => $idOrders,
                    "created_at"  => $timestamps,
                    "updated_at"  => $timestamps,
                ]);
                # Update quantity of Product
                Product::decrementProduct($product->id, $product->qty);
            }
            # Commit data pass
            DB::commit();
            return $idOrders;
        } catch (Exception $e) {
            # Got some error to rollback
            DB::rollBack();
            return false;
        }
    }

    # Format Price
    private function replacePrice($price)
    {
        $strPrice = str_replace(',', '', $price);
        return (float)$strPrice;
    }

    /**
     * Cancel Order and add quantity to Products.
     *
     * @param $orderId
     * @return array
     */
    public function cancelOrder($orderId)
    {
        DB::beginTransaction();
        try {
            # Update status
            Order::updateStatus($orderId, Status::CANCEL);

            # Add quantity to Products
            $order_products = Order::findById($orderId)->order_product;
            foreach ($order_products as $product) {
                Product::incrementProduct($product->product_id, $product->amount_of);
            }

            DB::commit();
            return array(
                'alert'   => 'alert-success',
                'message' => __('custom.message_cancel_order_success'),
            );
        } catch (Exception $e) {
            DB::rollBack();
            return array(
                'alert'   => 'alert-danger',
                'message' => __('custom.message_order_error_db'),
            );
        }
    }

    public function notification($userID,$userName,$image,$totalMoney,$created_at)
    {
        $date = checkLanguageWithDay($created_at);
        $mess_language = __('custom.message_notification');
        $mess = "$userName $mess_language $totalMoney.";
        
        $notification = new Notification();
        $notification->user_id = $userID;
        $notification->content = $mess;
        $notification->save();
        event(new OrderNotificationEvent($image,$mess,$date));
    }
}
