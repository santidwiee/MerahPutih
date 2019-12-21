<?php

use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;

class IdentityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        // $faker = Faker\Factory::create();

        // for($i=0; $i<3; $i++){

            //dummy 1
            DB::table('identity')->insert([
                        'nama' => 'Abimanyu',
                        'username' => 'abi786',
                        'password' => '@aaaaa123',
                        'tanggallahir' => '2000-4-19',
                        'alamat' => 'Pendongkelan',
                        'kecamatan'=>'Cengkareng',
                        'kota' => 'Jakarta Barat',
                        'telephone'=>'028419571',
                        'email'=>'abi786@gmail.com',
                        // 'foto' => $faker->image('storage/', $width=100, $height=100),
                        'umur' => '19'
            ]);
            //dummy 2
            DB::table('identity')->insert([
                'nama' => 'Santi',
                'username' => 'santi9',
                'password' => '@santi97',
                'tanggallahir' => '1997-8-9',
                'alamat' => 'Raya Kamal',
                'kecamatan'=>'Cengkareng',
                'kota' => 'Jakarta Barat',
                'telephone'=>'058258237',
                'email'=>'santi97@gmail.com',
                // 'foto' => $faker->image('storage/', $width=100, $height=100),
                'umur' => '22'
            ]);

            //dummy 3
            DB::table('identity')->insert([
                'nama' => 'Dwi',
                'username' => 'dwi98',
                'password' => '@dwie98',
                'tanggallahir' => '1997-9-19',
                'alamat' => 'Gang Jamblang',
                'kecamatan'=>'Cengkareng',
                'kota' => 'Jakarta Barat',
                'telephone'=>'75629392',
                'email'=>'dwi98@gmail.com',
                // 'foto' => $faker->image('storage/', $width=100, $height=100),
                'umur' => '22'
            ]);

            //dummy 4
            DB::table('identity')->insert([
                'nama' => 'Agus',
                'username' => 'agus18',
                'password' => '@@agus',
                'tanggallahir' => '1999-9-13',
                'alamat' => 'Swadaya',
                'kecamatan'=>'Pulogadung',
                'kota' => 'Jakarta Timur',
                'telephone'=>'3259180',
                'email'=>'agus18@gmail.com',
                // 'foto' => $faker->image('storage/',100,100),
                'umur' => '20'
            ]);

            //dummy 5
            DB::table('identity')->insert([
                'nama' => 'Tina',
                'username' => 'tina88',
                'password' => 'tina?88',
                'tanggallahir' => '1999-4-21',
                'alamat' => 'Kebon Jeruk',
                'kecamatan'=>'Kedoya',
                'kota' => 'Jakarta',
                'telephone'=>'47419380047',
                'email'=>'tina@gmail.com',
                // 'foto' => $faker->image('storage/',100,100),
                'umur' => '20'
            ]);

            //dummy 6
            DB::table('identity')->insert([
                'nama' => 'Bino',
                'username' => 'bino88',
                'password' => 'bino??88',
                'tanggallahir' => '1999-4-1',
                'alamat' => 'Pik',
                'kecamatan'=>'Priuk',
                'kota' => 'Jakarta',
                'telephone'=>'4744817937',
                'email'=>'bino@gmail.com',
                // 'foto' => $faker->image('storage/',100,100),
                'umur' => '20'
            ]);

            //dummy 7
            DB::table('identity')->insert([
                'nama' => 'Ryan',
                'username' => 'Ryan80',
                'password' => 'Ryan!?3',
                'tanggallahir' => '1997-4-19',
                'alamat' => 'Kebon Jeruk',
                'kecamatan'=>'Kedoya',
                'kota' => 'Jakarta',
                'telephone'=>'47441748117',
                'email'=>'ryan80@gmail.com',
                // 'foto' => $faker->image('storage/',100,100),
                'umur' => '22'
            ]);

            //dummy 8
            DB::table('identity')->insert([
                'nama' => 'Budi',
                'username' => 'Budi99',
                'password' => 'Budii!?99',
                'tanggallahir' => '1998-8-1',
                'alamat' => 'Kedaung',
                'kecamatan'=>'Neglasari',
                'kota' => 'Tangerang',
                'telephone'=>'4482579320',
                'email'=>'budi99@gmail.com',
                // 'foto' => $faker->image('storage/',100,100),
                'umur' => '21'
            ]);


            //dummy 9
            DB::table('identity')->insert([
                'nama' => 'Tania',
                'username' => 'Tania123',
                'password' => 'tania!?123',
                'tanggallahir' => '1998-4-20',
                'alamat' => 'Kedaung',
                'kecamatan'=>'Neglasari',
                'kota' => 'Tangerang',
                'telephone'=>'4489340120',
                'email'=>'tania123@gmail.com',
                // 'foto' => $faker->image('storage/',100,100),
                'umur' => '21'
            ]);

            //dummy 10
            DB::table('identity')->insert([
                'nama' => 'Anisa',
                'username' => 'Anisa76',
                'password' => 'AnIsa!?76',
                'tanggallahir' => '1996-7-3',
                'alamat' => 'Pik',
                'kecamatan'=>'Priuk',
                'kota' => 'Jakarta',
                'telephone'=>'47343899093',
                'email'=>'anisa@gmail.com',
                // 'foto' => $faker->image('storage/',100,100),
                'umur' => '23'
            ]);
        // }
    }
}
