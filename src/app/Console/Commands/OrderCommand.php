<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Enums\Status;
use App\Models\Order;

class OrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete rejected orders at 23:59 on the last day of the month';

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $OBJ_Orders = Order::ByStatus(Status::CANCEL)->get('id');
        Order::destroy($OBJ_Orders);
        $this->info('Delete rejected orders successfully');
    }
}
