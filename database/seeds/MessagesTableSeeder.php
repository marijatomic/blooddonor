<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [

            [
                'content' => 'Neka poruka',
                'conversation_id' => '1',
                'sender_id' => '1',


            ],

            [
                'content' => 'Neka poruka1',
                'conversation_id' => '2',
                'sender_id' => '2',

            ],


        ];

        foreach ($messages as $message)
            Message::create($message);
    }
}
