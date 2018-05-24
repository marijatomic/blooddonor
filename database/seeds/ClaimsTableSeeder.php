<?php

use App\Claim;
use Illuminate\Database\Seeder;

class ClaimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $claims = [

            [
                'patient_name' => 'Pacijent1',
                'patient_birth' => '2017-11-01',
                'patient_address' => 'Mostar',
                'patient_phone' => '063123456',
                'patient_blood' => 'A+',
                'patient_sex' => 'muško',
                'description' => 'Neka bolest',
                'user_id' => '3',


            ],

            [
                'patient_name' => 'Pacijent',
                'patient_birth' => '2017-11-01',
                'patient_address' => 'Mostar',
                'patient_phone' => '063123456',
                'patient_blood' => 'A+',
                'patient_sex' => 'žensko',
                'description' => 'Neka nesreca',
                'user_id' => '4',
            ],




        ];

        foreach ($claims as $claim)
            Claim::create($claim);
    }
}
