<?php

/**
* 
*/
class CavisTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('cavis')->delete();

		$faker = Faker\Factory::create();

		Pendaftar::create(array(
			'nim' => '1701303535',
			'nama' => 'Erwin',
			'gender' => 'Laki-Laki',
			'fakultas' => 'School of Computer Science',
			'jurusan' => 'Computer Science and Statistics',
			'tempat_lahir' => 'Jakarta',
			'ttl' => '1995-01-18',
			'nomor_telfon' => '082210480625',
			'idline' => 'erwin011895',
			'email' => 'erwin011895@gmail.com',
			'ipk' => '3.78',
			'alamat' => 'JL. H. Tohir 35',
			'pengalaman_organisasi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'penghargaan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'created_at' => '2016-07-06',
			'updated_at' => '2016-07-06',
		));

		Pendaftar::create(array(
			'nim' => '1701316393',
			'nama' => 'Anathasya Yosephine',
			'gender' => 'Perempuan',
			'fakultas' => 'School of information System',
			'jurusan' => 'information Systems and Accounting',
			'tempat_lahir' => 'Pekanbaru',
			'ttl' => '1995-05-16',
			'nomor_telfon' => '081959801832',
			'idline' => 'ephin',
			'email' => 'anathasyayosephine@gmail.com',
			'ipk' => '3.95',
			'alamat' => 'Kos seberang parkiran Binus Anggrek',
			'pengalaman_organisasi' => 'Bendahara BSLC
aslab akun',
			'penghargaan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'created_at' => '2016-07-05',
			'updated_at' => '2016-07-05',
		));

		Pendaftar::create(array(
			'nim' => '1801427841',
			'nama' => 'Lutfi Yusarian',
			'gender' => 'Laki-Laki',
			'fakultas' => 'Faculty of Economics and Communication',
			'jurusan' => 'Accounting',
			'tempat_lahir' => 'Jakarta',
			'ttl' => '1997-01-16',
			'nomor_telfon' => '08892344287',
			'idline' => 'lutfiyusarian0107',
			'email' => 'lutfiyusarian@gmail.com',
			'ipk' => '3.00',
			'alamat' => 'Jalan raya Jombang',
			'pengalaman_organisasi' => 'MT BSLC',
			'penghargaan' => 'Ketua Seminar',
			'created_at' => '2016-07-04',
			'updated_at' => '2016-07-04',
		));
	}
}
