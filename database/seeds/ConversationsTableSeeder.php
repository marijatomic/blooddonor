<?php

use App\Conversation;
use Illuminate\Database\Seeder;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conversations = [

            [
                'title' => 'Neki naslov',
                'last_message_time' => '2017-05-24',
                'userRequest_id' => '3',
                'donor_id' => '2',



            ],

            [
                'title' => 'Neki naslov1',
                'last_message_time' => '2017-05-24',
                'userRequest_id' => '3',
                'donor_id' => '1',

            ],




        ];

        foreach ($conversations as $conversation)
            Conversation::create($conversation);
    }
}
