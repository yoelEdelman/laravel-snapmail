<?php

use Illuminate\Database\Seeder;


use Faker\Factory as Faker;

use App\Message;

use Illuminate\Support\Str;


class messageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            $message = new Message();
            $message->created_at = $faker->dateTime($max = 'now', $timezone = null);
            $message->updated_at = $faker->dateTime($max = 'now', $timezone = null);
            $message->message = $faker->word(6);
            $message->photo_url = $faker->imageUrl($width = 640, $height = 480);
            $message->code = sha1(Str::random(32));

            $message->save();

        }

    }
}
