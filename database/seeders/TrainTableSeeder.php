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
        
        for ($i = 0; $i < 50; $i++) {

            $newTrain = new Train();
            $newTrain->agency = $faker->randomElement(['TRENITALIA','ITALO']) ;
            
            $departureStation = $faker->city();
            $arrivalStation = $faker->city();
            do {
                $arrivalStation = $faker->city();
            } while ($arrivalStation == $departureStation);

            $newTrain->departure_station =$departureStation ;
            $newTrain->arrival_station =$arrivalStation ;
            $departureTime = $faker->dateTimeBetween('-2 day', '+1 week');
            $arrivalTime = $faker->dateTimeBetween($departureTime, '+1 week');
            $newTrain->departure_time =$departureTime;
            $newTrain->arrival_time =$arrivalTime;
            $newTrain->train_code =$faker->bothify('?? ####');
            $newTrain->number_of_carriages =$faker->numberBetween(3,10) ;
            

            $inTimeValue = $faker->randomElement([true,false]);
            $deletedValue = $faker->randomElement([true,false]);
            if ($deletedValue === true ) {
                $inTimeValue = false;
            }
            $newTrain->in_time =$inTimeValue;
            $newTrain->deleted =$deletedValue;
            $newTrain->save();
        }
    }

    // php artisan migrate:fresh --seed comando per ripulire e inviare al db
}

