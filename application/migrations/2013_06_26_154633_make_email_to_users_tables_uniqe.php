<?php

class Make_Email_To_Users_Tables_Uniqe {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users',function($table){
			$table->unique('email');

		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users',function($table){
			$table->drop_unique('users_email_unique');
		});
	}

}