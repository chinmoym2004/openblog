@if($id>0)
	@if(count($blogcontent)!=0)
		@foreach($blogcontent as $content)
			@if(Auth::check() && ($content->uid==Auth::user()->id))
					<form role="form" id="blogPostFrom" class="editForm" name="blogPostFrom" data-id="{{$content->id}}" data-operation="{{$operation}}" method="post" action="{{url('blog/update')}}/{{$content->id}}">
					  <div class="form-group">
						<label for="exampleInputEmail1">Post Title</label>
						<input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Enter a title here" value="{{$content->title}}">
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Post Categories</label>
						<input type="text" class="form-control" id="blog_cat" name="blog_cat" placeholder="Enter a categorie here" value="{{$content->categories}}">
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Post Body</label>
						<textarea type="textarea" id="blog_body" name="blog_body" class="form-control" rows="10" cols="80" placeholder="Enter the post contet here">{{$content->blog_body}}</textarea>
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Post Tags</label>
						<input type="text" class="form-control" id="tags" name="tags" placeholder="enter tags by comman(,)" value="{{$content->tags}}">
					  </div>

<!-- 
					  <div class="select2-container select2-container-multi" id="s2id_select2-tags">
					  	<ul class="select2-choices">  
					  		<li class="select2-search-choice"><div>brown</div><a href="#" onclick="return false;" class="select2-search-choice-close" tabindex="-1"></a></li>
					  		<li class="select2-search-field"><input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" id="s2id_autogen2" style="width: 20px;">  </li>
					  	</ul>
					  	<div class="select2-drop select2-drop-multi select2-display-none select2-drop-active">   
					  		<ul class="select2-results">chinmoy</ul>
					  	</div>
					  </div> -->


					  <button type="submit" class="btn btn-s-sm btn-success" id="frm-save">Save</button>
					  <button type="reset" class="btn btn-s-sm btn-danger" id="from-clr">Cancel</button>
					  <a class="btn btn-s-sm btn-info" id="from-view" target="_blank" href="{{url("blog/display/".$content->id)}}">Preview</a>
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
	<form role="form" id="blogPostFrom" class="editForm" name="blogPostFrom" data-id="{{$id}}" data-operation="{{$operation}}" method="post" action="javascript:void(0);">
		<div class="form-group">
			<label for="exampleInputEmail1">Post Title</label>
			<input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Enter a title here">
		</div>
		<div class="form-group">
						<label for="exampleInputEmail1">Post Categories</label>
						<input type="text" class="form-control" id="blog_cat" name="blog_cat" placeholder="Enter a categorie here" value="">
					  </div>
		<div class="form-group">
			<label for="exampleInputEmail1">Post Body</label>
			<textarea type="textarea" id="blog_body" name="blog_body" class="form-control" rows="10" cols="80" placeholder="Enter the post contet here"></textarea>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Post Tags</label>
			<input type="text" class="form-control" id="tags" name="tags" placeholder="enter tags by comman(,)">
		</div>
		<button type="submit" class="btn btn-s-sm btn-success" id="frm-save">Save</button>
		<button type="reset" class="btn btn-s-sm btn-danger" id="from-clr">Cancel</button>
        <a class="btn btn-s-sm btn-info" id="from-view" target="_blank" href="">Preview</a>
	</form>
@endif