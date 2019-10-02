<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class pekerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 100; $i++) { 
        	DB::table('pekerja')->insert([
        		'nama' 			=> $faker->name,
        		'nip' 			=> $faker->randomNumber($nbDigits = NULL, $strict = false),
        		'jenis_kelamin' => $faker->randomElement($array = array ('Laki-laki','Perempuan')),
        		'tempat_lahir' 	=> $faker->city,
        		'tanggal_lahir' => '1997-03-16',
        		'agama' 		=> $faker->randomElement($array = array ('Islam', 'Budha', 'Hindu', 'Atheis')),
        		'golongan_darah' => $faker->randomElement($array = array ('O','A','B','AB')),
        		'alamat' 		=> $faker->randomElement($array = array ('padang','malang','payakumbuh','jakarta','malang','bandung')),
        		'email' 		=> $faker->email,
        		'telepon' 		=> $faker->tollFreePhoneNumber,
        		'hp' 			=> $faker->phoneNumber,
        		'jabatan' 		=> $faker->word,
        		'unit_kerja' 	=> $faker->jobTitle,
        		'alamat_kantor' => $faker->randomElement($array = array ('padang','malang','payakumbuh','jakarta','malang','bandung')),
        		'riwayat_pendidikan' => $faker->randomElement($array = array ('SMA','S1','S2')),
        		'sertifikasi_keahlian' => $faker->word,
        		'pendidikan_khusus' => $faker->word,
        		'status' => $faker->randomElement($array = array (null, 'ok','nok','lulus','tidak lulus','aktif','naktif')),
        	]);
        }
    }
}
// random_Element($array = array ('SMA','S1','S2'))
