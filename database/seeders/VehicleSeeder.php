<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'brand'             => $faker->vehicleBrand,
                'model'             => $faker->vehicleModel,
                'plate_number'      => $faker->vehicleRegistration,
                'insurance_date'    => fake()->date(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
        }

        Vehicle::insert($data);
    }
}
