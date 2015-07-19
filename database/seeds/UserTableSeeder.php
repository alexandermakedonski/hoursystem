<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $users = array(
        array('name' => 'Alex Makedonski','email' => 'alex.makedonski93@gmail.com','password' => '$2y$10$k9hXqR0Qgk9biWUbnkw1FOqKNIVXv.8oFZMlBxZzBbMWvzf6RIbOK','salary' => '2000','bDate' => '11/06/1993','remember_token' => 'eAkgBM3Rl9VuERRZl3FzKk7wW1KCQTjFxGm94rsW0kjphRQqju2ChZRDFg4P','created_at' => '2015-05-19 08:03:26','updated_at' => '2015-07-18 15:21:26'),
        array('name' => 'Валентин Македонски','email' => 'shik@shik.bg','password' => '$2y$10$aaVM.bJJhsufVZq9wLOgUu37ADrM55pi64/77ATij3wH2APk1TNpe','salary' => '2000','bDate' => '19/04/1967','remember_token' => '59g1msqWBOeFtpqEbaFInxfFk5Vp3Cx12bmqF30FCNXqU1lCBMWIqKarS2L2','created_at' => '2015-05-19 18:47:42','updated_at' => '2015-07-18 15:19:47'),
        array('name' => 'Петранка Македонска','email' => 'pepim@shik.bg','password' => '$2y$10$TnFyPE7xGvqwDmDUp8uKCe8i9OmwO3Qz8uRtj6hy/FVk0wz6d5Yhi','salary' => '2000','bDate' => '11/09/1970','remember_token' => 'OQ5xnEx7nJ1U9y4t50A5G9mlT6BU1qxpQej8snGa7PVo2NhvgCQ5tadzs0BT','created_at' => '2015-07-03 16:45:28','updated_at' => '2015-07-04 16:24:35'),
        array('name' => 'Десислава Стойкова','email' => 'desis@shik.bg','password' => '$2y$10$FHHSRUaGTE4INZr9dCsjUOZf1TlRDsJwS/uUweP49ffdH2yjLt.Ny','salary' => '550','bDate' => '06/06/1993','remember_token' => NULL,'created_at' => '2015-07-03 16:46:04','updated_at' => '2015-07-03 16:46:04'),
        array('name' => 'Цветана Христова','email' => 'cecih@shik.bg','password' => '$2y$10$w4zbWIB1g/cHFREk1SyfDO7UzPFacB.sMkMhxlqh5U7gTVIuk/57K','salary' => '500','bDate' => '16/02/1987','remember_token' => 'DzJLhMsJfyWzHxqixBujGlQhJ6aPtgSvK81S9qW53f61OitVqRC8UlsAeBnG','created_at' => '2015-07-16 21:13:05','updated_at' => '2015-07-16 21:13:31'),
 );

    public function run()
    {
        foreach($this->users as $user){
            \App\User::create($user);
        }
    }
}
