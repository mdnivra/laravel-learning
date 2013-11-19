<?php
class Authors_Controller extends Base_Controller{
	public $restful=true;
	// public $layout ="layouts.default";
	// public function get_index(){
	// 	$view =View::make('authors.index',array('name'=>'Arvind'))
	// 			->with('age','28');
	// 	$view->title ='authors';
	// 	$view->location ='delhi';
	// 	$view['speciality']='job';		
	// 	return $view;

	// }
	// public function get_index(){
	// 	$view =View::make('authors.index',array('name'=>'Arvind'))
	// 			->with('age','28');
	// 	$this->layout->title ='authors';
	// 	$view->location ='delhi';
	// 	$view['speciality']='job';
	// 	$this->layout->content =$view;

	// }
	public function get_index(){

		return View::make('authors.index')->with("title","Authors")
										  ->with('authors',Author::order_by("name","desc")->get());

	}
	
	public function get_view($id){

		return View::make('authors.view')->with("title","Authors")
										  ->with('author',Author::find($id))
										  ->with('authors',Author::all());

	}

	public function get_edit($id){

		return View::make('authors.edit')->with("title","Edit Author")
										  ->with('author',Author::find($id));										  

	}
	public function get_new(){

		return View::make('authors.new')->with("title","Add New Authors");

	}

	public function post_create(){
		$validation =Author::validation(Input::all());
		if ($validation->fails()){
			return Redirect::to_route('new_author')->with_errors($validation)->with_input();

		}else{
			Author::create(array(
				"name"=>Input::get("name"),
				"bio"=>Input::get("bio")
			));
			return Redirect::to_route('authors')->with('message','Author has been added successfully');


		}
		
		
	}
	public function put_update(){
		$id =Input::get("id");
		$validation =Author::validation(Input::all());
		if ($validation->fails()){
			return Redirect::to_route('edit_author',$id)->with_errors($validation)->with_input();

		}else{
			Author::update($id,array(
				"name"=>Input::get("name"),
				"bio"=>Input::get("bio")
				)
			);
			return Redirect::to_route('author',$id)->with('message','Author has been updated successfully');


		}
		
		
	}
	public function delete_destroy(){
				$id =Input::get("id");
				Author::find($id)->delete();

			return Redirect::to_route('authors')->with('message','Author has been deleted successfully');

	}
	public function action_index(){


	}

}