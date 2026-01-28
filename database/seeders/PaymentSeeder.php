<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $payments = [
            ['kode_pembayaran' => 1, 'metode_pembayaran' => 'Transfer Bank'],
            ['kode_pembayaran' => 2, 'metode_pembayaran' => 'E-Wallet'],
            ['kode_pembayaran' => 3, 'metode_pembayaran' => 'Kartu Kredit'],
            ['kode_pembayaran' => 4, 'metode_pembayaran' => 'COD'],
            ['kode_pembayaran' => 5, 'metode_pembayaran' => 'Donasi'],
        ];

        foreach ($payments as $payment) {
            Payment::create($payment);  
        }
    }
}
