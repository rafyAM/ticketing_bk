<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Event;
use App\Models\Tiket;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            EventSeeder::class,
            TicketSeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
