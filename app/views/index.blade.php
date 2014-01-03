@if(count($blog)==0)
	<div>No content is there!!</div>
@else
	@foreach($blog as $blogcontent)
		<div>{{$blogcontent->title}}</div>
		<div>{{$blogcontent->blog_body}}</div>
		<div>{{$blogcontent->created_at}}</div>
		<div>{{$blogcontent->tags}}</div>
		<div>{{ HTML::link('blog/display/'.$blogcontent->id,'Read More') }}</div>
	@endforeach
@endif
