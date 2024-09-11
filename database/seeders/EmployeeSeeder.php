<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Employee;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        /**
         * Seed departements
         */
        $depNames = [
            'Human Resources',
            'Technology',
            'Marketing',
            'Production'
        ];
        $departements = [];

        foreach ($depNames as $dN) {
            array_push($departements,
                Departement::create([ 'name' => $dN] ));
        }

        /**
         * Seed employees
         */
        $employees = [];
        $numOfEmployees = 20;
        for ($i = 0; $i < $numOfEmployees; $i++) {
            array_push($employees,
                Employee::create([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'departement_id' => $departements[mt_rand(0, count($departements) - 1)]->id,
                    'hired_at' => $faker->dateTimeBetween('-1 month', '+1 month'),
                ]));
        }
    }
}
