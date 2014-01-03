@foreach($blogcontent as $content)
			<div id="old_body">
				<div>{{$content->id}}</div>
				<div>{{$content->title}}</div>
				<div>{{$content->blog_body}}</div>
				<div>{{$content->tags}}</div>
				<div>{{$content->uid}}</div>
				<div>{{$content->created_at}}</div>
				<div>{{$content->updated_at}}</div>
			</div>
@endforeach
<div>{{ HTML::link('/', 'Back to home') }}</div>
