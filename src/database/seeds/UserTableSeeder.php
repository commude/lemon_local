<?php

use App\Enums\StampTypeEnum;
use App\Models\Card;
use App\Models\Stamp;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function($user) {
            $user->mypage_id = sprintf('%08d', $user->id);
            $user->save();

            for($i = 1; $i < rand(2, 10); $i++) {
                $card = Card::create([
                    'user_id' => $user->id,
                    'card_number' => $i,
                ]);

                for ($j = 0; $j < 3; $j++) {
                    Stamp::create([
                        'user_id' => $user->id,
                        'card_id' => $card->id,
                        'stamp_type' => StampTypeEnum::getRandomValue(),
                    ]);
                }
            }
        });
    }
}
