<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CompleteOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:complete-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
    // protected $signature = 'orders:complete';
    // protected $description = 'Tự động chuyển trạng thái đơn hàng sang "Đã hoàn thành" sau 3 ngày giao thành công';

    // public function __construct()
    // {
    //     parent::__construct();
    // }

    // public function handle()
    // {
    //     // Lấy các đơn hàng được giao thành công hơn 3 ngày trước và chưa hoàn thành
    //     $orders = Order::where('status', 'delivered')
    //         ->where('delivered_at', '<=', Carbon::now()->subDays(3))
    //         ->get();

    //     foreach ($orders as $order) {
    //         $order->status = 'completed';
    //         $order->save();
    //     }

    //     $this->info('Đã hoàn thành ' . $orders->count() . ' đơn hàng.');
    // }
}
