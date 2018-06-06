<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use Carbon\Carbon;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the posts table
        DB::table('tickets')->truncate();

        // generate 5 dummy cases data
        $tickets = [];
        $faker = Factory::create();
        $date = Carbon::create(2017, 8, 6, 9);

        for ($i = 1; $i <= 5; $i++)
        {
            $image = "Post_Image_" . rand(1, 5) . ".jpg";
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate   = clone($date);
            $incidentDate   = clone($date);

            $tickets = [
                'user_id'    		=> rand(1, 3),
                'site_id'    		=> 'site1',
                'ticket_number'        => 'ticket1',
                'ticket_status'       => 'new',
                'ticket_type'         => rand(1, 5),
                'raised_time'		=> $incidentDate,
                'created_at'   		=> $createdDate,
                'updated_at'   		=> $createdDate,
                
            ];
        }

        DB::table('tickets')->insert($tickets);
    }
}
