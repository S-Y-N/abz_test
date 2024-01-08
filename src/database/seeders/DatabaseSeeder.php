<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if(Gender::count() < 1){
            Gender::create(['name'=>'male']);
            Gender::create(['name'=>'female']);
        }
        if(Position::count() <1){
            Position::create(['name'=>'Lawyer']);
            Position::create(['name'=>'Designer']);
            Position::create(['name'=>'Artist']);
            Position::create(['name'=>'DevOps']);
            Position::create(['name'=>'Security']);
        }

        //create regions for test
        if(Country::count() < 1){
            $sql = file_get_contents(__DIR__.'/ukraine_db.sql');
            DB::unprepared($sql);
        }

        //fake data for test db
        $faker = \Faker\Factory::create();
        for($i=0;$i<45;$i++){
            $genderID = ($i % 2)+1;
            User::create([
                'gender_id'=>$genderID,
                'city_id'=>$faker->numberBetween(1,459),
                'position_id'=>$faker->numberBetween(1,5),
                'first_name'=>$faker->firstName,
                'middle_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'email'=>$faker->email,
                'phone'=>$faker->unique()->numerify('+380#########'),
                'photo'=>'storage/images/user.png',
                'password'=>bcrypt($faker->password),
                'birth_day'=>$faker->date,
            ]);
        }
    }
}
