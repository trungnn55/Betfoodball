<?php

class UserTableSeeder extends Seeder{

 	public function run(){

 	    DB::table('users')->truncate();

 		DB::table('users')->insert(array(
 				array(
	                'username'   => 'trungnn',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Ngọc Trung',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'tuvd',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Vũ Duy Tú',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            ),
	            array(
	                'username'   => 'phuongnh',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Hoà Phương',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	            array(
	                'username'   => 'thaihv',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Hoàng Văn Thái',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'tungtt',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Trần Thanh Tùng',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'thanhnt',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Trung Thành',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'tuandt',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Đàm Thanh Tuấn',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'hoanlv',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Lê Văn Hoàn',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'dungnv',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Văn Dũng',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'lanpt',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Phạm Thị Lan',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'conglv',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Lê Văn Công',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'quangpn',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Phạm Ngọc Quang',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'datnx',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Xuân Đạt',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'tuannv',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Văn Tuấn',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'huyendt',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Đoàn Thu Huyền',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'thaott',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Trần Thị Thảo',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'haihd',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Hoàng Duy Hải',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'hailt',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Lê Thanh Hải',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'ngocdm',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Đình Minh Ngọc',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'taoln',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Lê Ngọc Tạo',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'dungtv',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Trần Văn Dũng',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'dungnv',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Việt Dũng',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'dungnt',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Tiến Dũng',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'sonnq',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Quý Sơn',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'lanpm',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Phạm Mạnh Lân',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'anhnv',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Văn Anh',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'vietbq',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Bùi Quốc Việt',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'duongld',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Lê Đại Dương',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'huentm',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Thị Minh Huệ',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'thanhnt1',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Nguyễn Thị Thanh',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
	 			array(
	                'username'   => 'linhptt',
	                'password'   => Hash::make('123456'),
	                'name'		 => 'Phan Thị Thuỳ Linh',
	                'created_at' => new DateTime,
	                'updated_at' => new DateTime,
	            	),
 			)
 		);
  	}
}

?>