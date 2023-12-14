<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(Faker $faker): void
    {
        // $trains = [
        //     [
        //         'agency'=> 'Italo',
        //         'departure_station'=> 'Rimini',
        //         'arrival_station'=> 'Milano',
        //         'departure_time'=> '2023-12-14 12:00:00',
        //         'arrival_time'=> '2023-12-14 17:30:00',
        //         'train_code'=> 'LRM 1278',
        //         'number_of_carriages'=> 8,
        //         'in_time'=> 1,
        //         'deleted'=> 1,
        //     ],
        //     [
        //         'agency'=> 'Trenitalia',
        //         'departure_station'=> 'Roma',
        //         'arrival_station'=> 'Torino',
        //         'departure_time'=> '2023-12-14 09:10:00',
        //         'arrival_time'=> '2023-12-14 20:30:00',
        //         'train_code'=> 'Ajh 5203',
        //         'number_of_carriages'=> 6,
        //         'in_time'=> 0,
        //         'deleted'=> 1,
        //     ],

        // ];

        

        for ($i = 0; $i < 50; $i++) {

            $departureStation = $faker->city();
            $arrivalStation = $faker->city();
            if ($departureStation === $arrivalStation ) {
                $arrivalStation = $faker->city();
            }

            $departureTime = $faker->dateTimeBetween('-2 day', '+1 week');
            $arrivalTime = $faker->dateTimeBetween($departureTime, '+1 week');

            $inTimeValue = $faker->numberBetween('0','1');
            $deletedValue = $faker->numberBetween('0','1');
            if ($deletedValue === '1' ) {
                $inTimeValue = '0';
            }


            

            $newTrain = new Train();
            $newTrain->agency = $faker->randomElement(['TRENITALIA','ITALO']) ;
            $newTrain->departure_station =$departureStation ;
            $newTrain->arrival_station =$arrivalStation ;
            $newTrain->departure_time =$departureTime;
            $newTrain->arrival_time =$arrivalTime;
            $newTrain->train_code =$faker->bothify('?? ####');
            $newTrain->number_of_carriages =$faker->numberBetween(3,10) ;
            $newTrain->in_time =$inTimeValue;
            $newTrain->deleted =$faker->$deletedValue;
            $newTrain->save();
        }
    }
}
// foreach ($trains as $train) {
//     $newTrain = new Train();
//     $newTrain->agency = $train['agency'];
//     $newTrain->departure_station = $train['departure_station'];
//     $newTrain->arrival_station = $train['arrival_station'];
//     $newTrain->departure_time = $train['departure_time'];
//     $newTrain->arrival_time = $train['arrival_time'];
//     $newTrain->train_code = $train['train_code'];
//     $newTrain->number_of_carriages = $train['number_of_carriages'];
//     $newTrain->in_time = $train['in_time'];
//     $newTrain->deleted = $train['deleted'];
//     $newTrain->save();
// }
