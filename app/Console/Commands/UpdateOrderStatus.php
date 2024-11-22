<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Console\Command;

class UpdateOrderStatus extends Command
{
    protected $signature = 'orders:update-status';
    protected $description = 'Cập nhật trạng thái đơn hàng thành đã hoàn thành nếu đã giao cách đây hơn 3 ngày';

    public function handle()
    {
        // Lấy tg hiện tại trừ đi 3 ngày
        $threeDaysAgo = Carbon::now()->subDays(3);

        // Tìm các dh có stt 'ghtc' và ngày giao hàng hơn 3 ngày trước 
        $orders = Order::where('status', 'ghtc')
            ->where('delivered_at', '<=', $threeDaysAgo)
            ->get();

        foreach ($orders as $order) {
            $order->status = 'dndh';
            $order->save();

        }
        $this->info('Trạng thái đơn hàng đã được cập nhật thành công.');
    }
}
