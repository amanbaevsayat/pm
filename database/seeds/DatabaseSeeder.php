<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RemarkSeeder::class);
        $this->call(SubscriptionTypeSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(SubscriptionSeeder::class);
    }
}
