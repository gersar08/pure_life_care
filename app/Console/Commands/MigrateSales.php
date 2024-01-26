<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:sales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate daily sales to weekly sales';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::transaction(function () {
            $dailySales = DB::table('registro_ventas_daily')->get();

            foreach ($dailySales as $sale) {
                $weeklySale = DB::table('registro_ventas_weekly')
                    ->where('cliente_id', $sale->cliente_id)
                    ->first();

                if ($weeklySale) {
                    DB::table('registro_ventas_weekly')
                        ->where('cliente_id', $sale->cliente_id)
                        ->increment('fardo', $sale->fardo);

                    DB::table('registro_ventas_weekly')
                        ->where('cliente_id', $sale->cliente_id)
                        ->increment('garrafa', $sale->garrafa);

                    DB::table('registro_ventas_weekly')
                        ->where('cliente_id', $sale->cliente_id)
                        ->increment('pet', $sale->pet);
                } else {
                    DB::table('registro_ventas_weekly')->insert([
                        'cliente_id' => $sale->cliente_id,
                        'fardo' => $sale->fardo,
                        'garrafa' => $sale->garrafa,
                        'pet' => $sale->pet,
                    ]);
                }
            }

            DB::table('registro_ventas_daily')->delete();
        });

        return 0;
    }
}
