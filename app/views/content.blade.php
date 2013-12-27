@if(count($blogcontent)!=0)
	@foreach($blogcontent as $content)
		<div>{{$content->id}}</div>
		<div>{{$content->title}}</div>
		<div>{{$content->blog_body}}</div>
		<div>{{$content->tags}}</div>
		<div>{{$content->created_at}}</div>
		<div>{{$content->updated_at}}</div>
	@endforeach
	
	@if(Auth::check() && ($content->uid==Auth::user()->id))
		<div>{{ HTML::link('/blog/edit/'.$content->id, 'Edit this',array('class'=>'blog-edit')) }}</div>
	@else
		<div>ERROR : You are not authorize to edit this content</div>
	@endif
@else
	<div>Error : 404 [Sorry ! Requested content not available]</div>
@endif
<div>{{ HTML::link('/', 'Back to home') }}</div>
