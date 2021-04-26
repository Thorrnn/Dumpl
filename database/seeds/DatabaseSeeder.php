<?php

    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {

            //$this->call(RolesTableSeeder::class);
            //$this->call(UsersTableSeeder::class);
            //$this->call(UserRolesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(GalleriesSeeder::class);
            $this->call(TypeSurveysTableSeeder::class);
            $this->call(TypeTestsTableSeeder::class);
            $this->call(ArticlesTableSeeder::class);
            $this->call(SurveysTableSeeder::class);

        }
    }
