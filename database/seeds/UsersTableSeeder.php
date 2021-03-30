<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;

    class UsersTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $data = [
                [
                    'id' => 1,
                    'login' => 'admin',
                    'name' => 'admin',
                    'surname' => 'admin',
                    'role' => 'admin',
                    'sex' => 'male',
                    'education' => 'graduateSchool',
                    'fieldActivity' => 'science',
                    'aboutMyself' => 'admin',
                    'age' => 23,
                    'email' => 'admin.com',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 2,
                    'login' => 'user',
                    'name' => 'user',
                    'surname' => 'user',
                    'role' => 'user',
                    'sex' => 'male',
                    'education' => 'graduateSchool',
                    'fieldActivity' => 'science',
                    'aboutMyself' => 'user',
                    'age' => 18,
                    'email' => 'user.com',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 3,
                    'login' => 'disabled',
                    'name' => 'disabled',
                    'surname' => 'disabled',
                    'role' => 'disabled',
                    'sex' => 'male',
                    'education' => 'graduateSchool',
                    'fieldActivity' => 'science',
                    'aboutMyself' => 'disabled',
                    'age' => 10,
                    'email' => 'disabled.com',
                    'password' => bcrypt(12345678),
                ],

            ];
            DB::table('users')->insert($data);
        }

    }
