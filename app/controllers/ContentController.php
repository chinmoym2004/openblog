
<?php
class ContentController extends BaseController {
	
	
	protected $layout="mainlayout";
	
	//view content
	public function getDisplay($id){
		$blogcontent=Blog::where('id','=',$id)
					->where('varified','=',1)
					->get();

		$comments=DB::table('comment')
					->join('users','users.id','=','comment.commentby')
					->where('comment.forwhichpost','=',$id)
					->where('comment.varified','=',1)
					->get();

		if(count($blogcontent)>0){

			$data=array(
				'blogcontent'=>$blogcontent,
				'operation'=>'view',
				'comments'=>$comments
				);
			$this->layout->content = View::make('content',$data);
		
		}
		else
		{
			return Redirect::to('404');
		}
				
	}
	public function getBycat()
	{
		$cat=$_REQUEST['type'];
		$blog=DB::table('blog')
                            ->join('users','blog.uid', '=', 'users.id')
                            ->where('blog.varified','=',1)
                            ->where('blog.categories','=',$cat)
                            ->select('*',DB::raw('blog.id as bid'))
                            ->orderBy('blog.updated_at', 'desc')
                            ->paginate(10);

		$data=array(
				'blog'=>$blog
			);
			$this->layout->content = View::make('index',$data);
	}
	public function getAllcontent(){
		$uid=Auth::user()->id;
		$blogcontent=Blog::where('uid','=',$uid)->get();
		$data=array('blogcontent'=>$blogcontent,'operation'=>'view');
		$this->layout->content = View::make('uersconetent',$data);
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
					$blogcontent->varified=0;
					$blogcontent->categories=$_REQUEST['categories'];
					$blogcontent->arrival="new";
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
					$blogcontent->varified=0;
					$blogcontent->categories=$_REQUEST['categories'];
					$blogcontent->arrival="update";
					$blogcontent->uid=Auth::user()->id;
					//$blogcontent->created_at=date("Y-m-d H:m:s");
					$blogcontent->save();				
					$insertedId = $id;
				}
		$blogcontent=Blog::where('id','=',$insertedId)->get();

		$comments=DB::table('comment')
					->join('users','users.id','=','comment.commentby')
					->where('comment.forwhichpost','=',$insertedId)
					->where('comment.varified','=',1)
					->get();


		/*$data=array(
				'blogcontent'=>$blogcontent,
				'operation'=>'view',
				'comments'=>$comments
				);
		$this->layout->content = View::make('content',$data);*/
		$data=array(
			'error'=>1,
			'id'=>$insertedId
			);
		return $data;
		}
		else{
			$this->layout->content = View::make('users.login');
		}
		
	}

	public function getDelete($id)
	{
		$blog = Blog::find($id);
		$blog->delete();

		$comment=Comment::where('forwhichpost', '=', $id)->delete();

		return Redirect::to('/');
	}
}
?>
