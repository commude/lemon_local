<?php

use Illuminate\Database\Seeder;
use App\Models\Stamp;

class StampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Stamp::class, 300)->create();
    }
}
