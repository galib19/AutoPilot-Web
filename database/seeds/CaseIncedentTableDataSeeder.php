<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use Carbon\Carbon;

class CaseIncedentTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the posts table
        DB::table('case_incedents')->truncate();

        // generate 5 dummy cases data
        $cases = [];
        $faker = Factory::create();
        $date = Carbon::create(2017, 8, 6, 9);

        for ($i = 1; $i <= 5; $i++)
        {
            $image = "Post_Image_" . rand(1, 5) . ".jpg";
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate   = clone($date);
            $incidentDate   = clone($date);

            $cases[] = [
                'user_id'    		=> rand(1, 3),
                'case_title'        => $faker->sentence(rand(8, 12)),
                'case_details'      => $faker->paragraphs(rand(10, 15), true),
                'case_status'       => 'new',
                'case_type'         => rand(1, 5),
                'action_taken'      => rand(1, 3),
                'incident_date'		=> $incidentDate,
                'incident_info'     => $faker->text(rand(250, 300)),
                'created_at'   		=> $createdDate,
                'updated_at'   		=> $createdDate,
                
            ];
        }

        DB::table('case_incedents')->insert($cases);
    }
}
