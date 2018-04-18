<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use Carbon\Carbon;

class CaseVictimTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the posts table
        DB::table('case_victims')->truncate();

        // generate 5 victims data
        $victims = [];
        $faker = Factory::create();
        $date = Carbon::create(2017, 8, 6, 9);

        for ($i = 1; $i <= 5; $i++)
        {
            $image = "Post_Image_" . rand(1, 5) . ".jpg";
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate   = clone($date);

            $victims[] = [
                'case_id'    	=> $i,
                'name'        	=> $faker->sentence(rand(8, 12)),
                'parents'       => $faker->sentence(rand(8, 12)),
                'districts'     => $faker->sentence(rand(8, 12)),
                'location'      => $faker->sentence(rand(8, 12)),
                'age'        	=> rand(18, 50),
                'sex'        	=> 'women',
                'created_at'   => $createdDate,
                'updated_at'   => $createdDate,
                
            ];
        }

        DB::table('case_victims')->insert($victims);

    }
}
