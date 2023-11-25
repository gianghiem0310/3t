<?php

namespace App\Console;

use App\Models\PhongTro;
use App\Models\PhongTroChuTro;
use App\Models\YeuCauDangKyGoi;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use function Laravel\Prompts\alert;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call($this->xoaGoi())->everySecond();
    }
    public function xoaGoi()
    {
        $yeuCauDangKyGoi = YeuCauDangKyGoi::danhSachYeuCauDangKyDaXacThuc();
        foreach($yeuCauDangKyGoi as $item){
            // if(date('Y-m-d', strtotime("2023-11-21") > date('Y-m-d', strtotime("2023-11-22")))){
            if($item->updated_at->addDays($item->goi->thoiHan) > now()){
                
                $item->chuTro->update(
                    ["idGoi"=>-1]
                );
                // Danh sach phong cua chu tro
                $ds = PhongTroChuTro::where("idChuTro",$item->chuTro->id)->get();
                foreach($ds as $phong){
                    PhongTro::where("id", $phong->idPhongTro)->update(["hoatDong"=> 0]);
                }
                $item->delete();
            }
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
