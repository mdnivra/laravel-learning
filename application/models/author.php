<?php
class Author extends Eloquent{

	public static $table ='authors'; //if table doesn't exist
	public static $accessible = array('name','bio' );//if table doesn't exist

	public static $rules =array(
		'name'=>'required|min:2',
		'bio'=>'required|min:10'

		);
	public static function validation($data){
		return Validator::make($data,static::$rules);


	}
}