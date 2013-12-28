<?php
class ContentController extends BaseController {
	
	
	protected $layout="mainlayout";
	
	//view content
	public function getContent($id){
		$blogcontent=Blog::where('id','=',$id)->get();
		$data=array('blogcontent'=>$blogcontent,'operation'=>'view');
		/*foreach($blogcontent as $content)
		{
			$data[]
		}*/
			
		$this->layout->content = View::make('content',$data);
	}
	

	//edit content
	public function getEdit($id){
		$blogcontent=Blog::where('id','=',$id)->get();
		$data=array('blogcontent'=>$blogcontent,'operation'=>'edit');
		$this->layout->content = View::make('content',$data);
	}
}
?>
