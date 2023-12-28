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
        $this->call(UserTableSeeder::class);
        // $this->call(CardTableSeeder::class);
        // $this->call(StampTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(BtcserialTableSeeder::class);

    }
}
