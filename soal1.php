<?php 
error_reporting(1);
function biodata(){
	$bio = array(
		'name' => 'Nikko Febika',
		'age' => 22,
		'address' => 'Graha Lestari J9/1i RT/RW 002/008 Kel. Mekar Bakti Kec. Panongan Kab. Tangerang',
		'hobbies' => array('mancing','berenang','sepedahan','olahraga'),
		'is_married' => false,
		'list_school' => [
			[
				'name' => 'TK Bina Putra',
				'year_in' => '2000',
				'year_out' => '2002',
				'major' => null
			],
			[
				'name' => 'SD Negeri Karang Ayu 03',
				'year_in' => '2002',
				'year_out' => '2009',
				'major' => null
			],
			[
				'name' => 'SMP Negeri 2 Cikupa',
				'year_in' => '2009',
				'year_out' => '2012',
				'major' => null
			],
			[
				'name' => 'SMA Negeri 4 Kab. Tangerang',
				'year_in' => '2012',
				'year_out' => '2015',
				'major' => null
			],
			[
				'name' => 'Universitas Bina Sarana Informatika',
				'year_in' => '2016',
				'year_out' => '2019',
				'major' => 'D3 Manajemen Informatika'
			]
		],
		'skills' => array(
			array(
				'skill_name' => 'Main Hockey',
				'level' => 'expert',
			),array(
				'skill_name' => 'HTML',
				'level' => 'advanced',
			),
			array(
				'skill_name' => 'CSS',
				'level' => 'advanced',
			),
			array(
				'skill_name' => 'PHP',
				'level' => 'advanced',
			),
			array(
				'skill_name' => 'Javascript',
				'level' => 'beginner',
			)
		),
		'interest_in_coding' => true
	);

	return json_encode($bio);
}

echo biodata();
?>
