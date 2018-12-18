<?php

use Illuminate\Database\Seeder;

class PhotographsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = array("A photograph representing the Automotive category",
                        "A photograph representing the Baby Products category",
                        "A photograph representing the Beauty category",
                        "A photograph representing the Books category",
                        "A photograph representing the Business, Industry and Science category",
                        "A photograph representing the CDs and Vinyl category",
                        "A photograph representing the Clothing category",
                        "A photograph representing the Computer and Accessories category",
                        "A photograph representing the DIY and Tools category",
                        "A photograph representing the DVD and Blu-ray category");


        for ($i = 0; $i < count($faker); $i++) {
            DB::table('photographs')->insert([ // Insert photographer fakers
                'text' => $faker[$i],
                'status' => 0,
                'created_at' => date('Y-m-d h:m:s'),
                'updated_at' => date('Y-m-d h:m:s')
            ]);
        }
    }
}
