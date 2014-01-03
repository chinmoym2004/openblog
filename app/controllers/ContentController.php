<?php
class ContentController extends BaseController {
	
	
	protected $layout="mainlayout";
	
	//view content
	public function getDisplay($id){
		$blogcontent=Blog::where('id','=',$id)->get();
		if(count($blogcontent)>0){
			$data=array('blogcontent'=>$blogcontent,'operation'=>'view');
			$this->layout->content = View::make('content',$data);
		}
		else
		{
			return Redirect::to('404');
		}
				
	}
	

	//edit content
	public function getEdit($id){
		if(Auth::check()){
			$uid=Auth::user()->id;
			if($id!=0)
			{
				$blogcontent=Blog::where('id','=',$id)->where('uid','=',$uid)->get();
				if(count($blogcontent)>0){
					$data=array('id' => $id,'blogcontent'=>$blogcontent,'operation'=>'edit');
					$this->layout->content = View::make('edit',$data);	
				}
				else{
					return Redirect::to('404');
				}
				
			}
			else
			{
				$data=array('id' => $id,'operation'=>'new');
				$this->layout->content = View::make('edit',$data);
			}
		}
		else{
			$this->layout->content = View::make('users.login');
		}
		
	}
	public function postUpdate($id){
		if(Auth::check()){
			$uid=Auth::user()->id;
				if($id==0)
				{
					//new
					$blogcontent=new Blog();
					$blogcontent->title=$_REQUEST['title'];
					$blogcontent->blog_body=$_REQUEST['body'];
					$blogcontent->tags =$_REQUEST['tags'];
					$blogcontent->uid=Auth::user()->id;
					//$blogcontent->created_at=date("Y-m-d H:m:s");
					$blogcontent->save();				
					$insertedId = $blogcontent->id;


				}
				else
				{
					//update
					$blogcontent=Blog::find($id);
					$blogcontent->title=$_REQUEST['title'];
					$blogcontent->blog_body=$_REQUEST['body'];
					$blogcontent->tags =$_REQUEST['tags'];
					$blogcontent->uid=Auth::user()->id;
					//$blogcontent->created_at=date("Y-m-d H:m:s");
					$blogcontent->save();				
					$insertedId = $id;
				}
		$blogcontent=Blog::where('id','=',$insertedId)->get();
		$data=array('blogcontent'=>$blogcontent,'operation'=>'view');
		$this->layout->content = View::make('content',$data);
		}
		else{
			$this->layout->content = View::make('users.login');
		}
		
	}
}
?>
