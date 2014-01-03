@if($id>0)
	@if(count($blogcontent)!=0)
		@foreach($blogcontent as $content)
			@if(Auth::check() && ($content->uid==Auth::user()->id))
					<form role="form" id="blogPostFrom" name="blogPostFrom" data-id="{{$content->id}}" data-operation="{{$operation}}" method="post" action="javascript:void(0);">
					  <div class="form-group">
						<label for="exampleInputEmail1">Post Title</label>
						<input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Enter a title here" value="{{$content->title}}">
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Post Body</label>
						<textarea type="textarea" id="blog_body" name="blog_body" class="form-control" rows="10" cols="80" placeholder="Enter the post contet here">{{$content->blog_body}}</textarea>
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Post Tags</label>
						<input type="text" class="form-control" id="tags" name="tags" placeholder="enter tags by comman(,)" value="{{$content->tags}}">
					  </div>
					  <button type="submit" class="btn btn-default" id="frm-save">Save</button>
					  <button type="reset" class="btn btn-default" id="from-clr">Cancel</button>
					  <button type="button" class="btn btn-default" id="from-view" data-toggle="modal" data-target="#myPostPreview">Preview</button>
					</form>

					<!-- 
					<form id=""  action="javascript:void(0)">
						<div>
						 
						</div>
					</form> -->
					<!-- <a class='blog-edit' href="">Edit this</div>
					<a class='blog-new' href="">New Post</div> -->
			@else
				<div>ERROR : You are not authorize to edit this content</div>
				{{HTML::link('users/login', 'want to publish your content?',array('class'=>''))}}
			@endif
		@endforeach
	@else
		<div>Error : 404 [Sorry ! Requested content not available]</div>
		{{HTML::link('blog/edit/0', 'Create a Content',array('class'=>''))}}
	@endif
@else
	<form role="form" id="blogPostFrom" name="blogPostFrom" data-id="{{$id}}" data-operation="{{$operation}}" method="post" action="javascript:void(0);">
		<div class="form-group">
			<label for="exampleInputEmail1">Post Title</label>
			<input type="text" class="form-control" id="input_content_title" name="input_content_title" placeholder="Enter a title here">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Post Body</label>
			<textarea type="textarea" id="blog_body" name="blog_body" class="form-control" rows="10" cols="80" placeholder="Enter the post contet here"></textarea>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Post Tags</label>
			<input type="text" class="form-control" id="input_content_tags" name="input_content_title" placeholder="enter tags by comman(,)">
		</div>
		<button type="submit" class="btn btn-default" id="frm-save">Save</button>
		<button type="reset" class="btn btn-default" id="from-clr">Cancel</button>
		<button type="button" class="btn btn-default" id="from-view" data-toggle="modal" data-target="#myPostPreview">Preview</button>
	</form>
@endif