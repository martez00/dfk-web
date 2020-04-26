<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seasons')->delete();
        
        \DB::table('seasons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '2011 metų sezonas',
                'start_date' => '2011-01-01',
                'end_date' => '2011-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '2012 metų sezonas',
                'start_date' => '2012-01-01',
                'end_date' => '2012-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '2013 metų sezonas',
                'start_date' => '2013-01-01',
                'end_date' => '2013-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => '2014 metų sezonas',
                'start_date' => '2014-01-01',
                'end_date' => '2014-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => '2015 metų sezonas',
                'start_date' => '2015-01-01',
                'end_date' => '2015-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => '2016 metų sezonas',
                'start_date' => '2016-01-01',
                'end_date' => '2016-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => '2017 metų sezonas',
                'start_date' => '2017-01-01',
                'end_date' => '2017-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => '2018 metų sezonas',
                'start_date' => '2018-01-01',
                'end_date' => '2018-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => '2019 metų sezonas',
                'start_date' => '2019-01-01',
                'end_date' => '2019-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => '2020 metų sezonas',
                'start_date' => '2020-01-01',
                'end_date' => '2020-12-31',
                'created_at' => '2020-04-26 07:46:17',
                'updated_at' => '2020-04-26 07:46:17',
            ),
        ));
        
        
    }
}