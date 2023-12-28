<?php

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Card::class, 10)->create();
    }
}
