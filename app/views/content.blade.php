
@foreach($blogcontent as $content)
			<article class="jumbotron" id="artical-{{$content->id}}">
				<h2>{{$content->title}}</h2>
				<div><span>{{$content->blog_body}}</span></div>
				<div>{{$content->tags}}</div>
				<div>{{$content->uid}}</div>
				<div>{{$content->created_at}}</div>
				<div>{{$content->updated_at}}</div>
			</article>
@endforeach
<div>{{ HTML::link('/', 'Back to home') }}</div>
