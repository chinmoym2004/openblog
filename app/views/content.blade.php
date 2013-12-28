@if(count($blogcontent)!=0)
		@foreach($blogcontent as $content)
			<div id="old_body">
				<div id="content_id">{{$content->id}}</div>
				<div id="content_title">{{$content->title}}</div>
				<div id="content_body">{{$content->blog_body}}</div>
				<div id="content_tags">{{$content->tags}}</div>
				<div id="content_uid">{{$content->uid}}</div>
				<div id="content_created_at">{{$content->created_at}}</div>
				<div id="content_updated_at">{{$content->updated_at}}</div>
			</div>
		@endforeach
	
	@if(Auth::check() && ($content->uid==Auth::user()->id))
		<form role="form" id="blogPostFrom" name="blogPostFrom" data-id="{{$content->id}}" data-operation="">
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

		
		<form id=""  action="javascript:void(0)">
			<div>
			 
			</div>
		</form>
		<div class='blog-edit'>Edit this</div>
		<div class='blog-new'>New Post</div>
	@else
		@if($operation=='edit')
			<div>ERROR : You are not authorize to edit this content</div>
		@else
			<div>want to publish your content?</div>
		@endif
	@endif
@else
	<div>Error : 404 [Sorry ! Requested content not available]</div>
@endif
<div>{{ HTML::link('/', 'Back to home') }}</div>
