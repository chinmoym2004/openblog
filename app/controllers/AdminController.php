<?php

class AdminController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected $layout = "mainlayout";
	 
	public function index(){
		if(Auth::check()&&Auth::user()->admin==1){
			$this->layout->content = View::make('admin');
		}
		else{
			$this->layout->content = View::make('users.login')->with('message', 'Error : Authentication failed!');
		}		
	}
}
