<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->insert([
            'status' => 'Menunggu Verifikasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_statuses')->insert([
            'status' => 'Dalam Proses',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_statuses')->insert([
            'status' => 'Delivery',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_statuses')->insert([
            'status' => 'Selesai',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('order_statuses')->insert([
            'status' => 'Ditolak',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
