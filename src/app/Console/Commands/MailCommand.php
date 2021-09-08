<?php

namespace App\Console\Commands;

use App\Enums\UserRole;
use App\Models\Order;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail report to Admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Send mail report to Admin.
     */
    public function handle()
    {
        # Get all Users role admin, current month year
        $users = User::byRole(UserRole::getKey(0))->get();
        $year = date('Y');
        $month = date("m");
        # Get data
        $orders = Order::byMonthYear($month, $year)->get();
        $totalAllPrice = Order::totalAllPrice();
        $usersOrdered = Order::top5UsersOrdered()->get();
        $details = [
            'title' => __('custom.mail_statistic') . " $month",
            'body'  => $orders,
            'totalAllPrice' => $totalAllPrice,
            'usersOrdered'  => $usersOrdered,
        ];
        # Loop Users
        foreach ($users as $user) {
            # Send mail to Admin
            Mail::to($user->email)->send(new \App\Mail\ReportMail($details));
            if(count(Mail::failures()) > 0) {
                return $this->info('Send mail report to Admin failures.');
            }
        }
        # Show send mail success
        $this->info('Send mail report to Admin successfully.');
    }
}
