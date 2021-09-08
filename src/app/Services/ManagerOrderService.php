<?php
namespace App\Services;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Jobs\UserMailJob;

class ManagerOrderService
{
    public function getDatetime()
    {
        $previous_week = strtotime("-1 week +1 day");
        $startTime = strtotime("last monday midnight",$previous_week);
        $endTime = strtotime("next sunday midnight",$startTime);
        $startDate = date('Y-m-d 00:00:00',$startTime);
        $endDate = date('Y-m-d 23:59:59',$endTime);

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $data['today'] = date("Y-m-d");   
        $data['yesterday'] = date("Y-m-d",mktime(0, 0, 0, date("m"), (date("d") - 1), date("Y")));
        $data['start_week'] = $startDate;
        $data['end_week'] = $endDate;
        $data['this_month'] = date("Y-m");
        $data['last_month'] =  date("Y-m",mktime(0, 0, 0, (date("m") - 1), date("d"), date("Y")));
        $data['this_year'] =  date("Y");
        $data['last_year'] =  date("Y",mktime(0, 0, 0, date("m"), date("d"), (date("Y") - 1)));

        return $data;
    }

    public function sendMail($message,$notify,$order_products,$user_id)
    {
        $users = User::find($user_id);
        $details = ['title' => __('custom.mail_order_confirm'),'name_user' => $users->name,
        'message' => $message, 'notify' => $notify, 'orders' => $order_products];
        UserMailJob::dispatch($users->email, $details);
    }
}