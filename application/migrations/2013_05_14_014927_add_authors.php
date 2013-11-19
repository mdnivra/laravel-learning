<?php

class Add_Authors {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('authors')->insert(array(
			'name'=>'Arvind',
			'bio'=>'Arvind is great aurthor',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('authors')->insert(array(
			'name'=>'Author 2',
			'bio'=>'Author 2 is great aurthor',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('authors')->insert(array(
			'name'=>'Author 3',
			'bio'=>'Author 3 is great aurthor',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('authors')->insert(array(
			'name'=>'Author 4',
			'bio'=>'Author 4 is great aurthor',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('authors')->insert(array(
			'name'=>'Author 5',
			'bio'=>'Author 5 is great aurthor',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		DB::table('authors')->insert(array(
			'name'=>'Author 6',
			'bio'=>'Author 6 is great aurthor',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('authors')->where('name','=','Arvind')->delete();
		
		DB::table('authors')->where('name','=','Author 2')->delete();

		DB::table('authors')->where('name','=','Author 3')->delete();
		
		DB::table('authors')->where('name','=','Author 4')->delete();
		
		DB::table('authors')->where('name','=','Author 5')->delete();
		
		DB::table('authors')->where('name','=','Author 6')->delete();
			
	}

}