<?php

use App\Record;
use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [

            [
                'confirm' => '0',
                'donor' => '0',
                'user_id' => '1',
                'request_id' => '1',



            ],

            [
                'confirm' => '0',
                'donor' => '0',
                'user_id' => '2',
                'request_id' => '2',

            ],


        ];

        foreach ($records as $record)
            Record::create($record);
    }
}
