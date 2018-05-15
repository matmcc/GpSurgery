<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $placeholderUser = new User([
            'name' => 'INTERNAL',
            'email' => 'donotreply@oversurgery.co.uk',
            'password' => \Hash::make('password'),
            'remember_token' => 'HJYGNR4YN30MpEgdRfal7j5LCZpItPf139eUpTvnfjOAULcfjnSjm1dC0OP3'
        ]);

        $testUser = new User([
            'name' => 'Cristina Luca',
            'email' => 'cristina.luca@anglia.ac.uk',
            'password' => \Hash::make('password'),
            'remember_token' => '3GYnGUtuqxzs5D88quaHmUPMA2KxE5WvUN4Mq1cFZQOiwOOZRVdAQXnqOH6B'
        ]);

        for ($i=0; $i < rand(1, 7); $i++) {
            $testUser->prescriptions()->save(factory(App\Prescription::class)->make());
        }
        for ($i=0; $i < rand(1, 10); $i++) {
            $testUser->results()->save(factory(App\Result::class)->make());
        }

        $testUser2 = new User([
            'name' => 'Matthew McConkey',
            'email' => 'matthew.mcconkey@student.anglia.ac.uk',
            'password' => \Hash::make('password'),
            'remember_token' => 'VzCbdu4E30jRiu1iLSApuFC6KUBkcWgG2FYTCpwqgp2SmLaRthfZwDsuHfVt'
        ]);

        for ($i=0; $i < rand(1, 7); $i++) {
            $testUser2->prescriptions()->save(factory(App\Prescription::class)->make());
        }
        for ($i=0; $i < rand(1, 10); $i++) {
            $testUser2->results()->save(factory(App\Result::class)->make());
        }

        factory(App\User::class, 50)->create()->each(function($u) {
            $weighted = [1, 1, 1, 2, 2, 3, 3, 3, 3, 4, 4, 4, 5, 5, 6];
            for ($i=0; $i < rand(0, 6); $i++) {
                $u->prescriptions()->save(factory(App\Prescription::class)->make());
            }
            for ($i=0; $i < array_random($weighted); $i++) {
                $u->results()->save(factory(App\Result::class)->make());
            }
        });
    }
}
