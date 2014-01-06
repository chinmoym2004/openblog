<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $layout="mainlayout";

	public function index()
	{
		$blog=DB::table('blog')
                            ->join('users', 'blog.uid', '=', 'users.id')
                            ->select('*')
                            ->orderBy('blog.updated_at', 'desc')
                            ->paginate(10);

		$data=array(
				'blog'=>$blog
			);
			$this->layout->content = View::make('index',$data);
	}
	public function notfound(){
		$this->layout->content = View::make('404');
	}

}
