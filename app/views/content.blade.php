
@foreach($blogcontent as $content)
	<?php $i=$content->id; ?>
			<article class="jumbotron" id="artical-{{$content->id}}">
				<h2>{{$content->title}}</h2>
				<div><span>{{$content->blog_body}}</span></div>
				<div>{{$content->tags}}</div>
				<div>{{$content->uid}}</div>
				<div>{{$content->created_at}}</div>
				<div>{{$content->updated_at}}</div>
			</article>
@endforeach
<div class="well">
	<textarea placeholder="leave a comment" cols="50" rows="2" data-id={{$i}} class="myPostNote"></textarea>
	<button class="ImPosting">Post</button>
</div>
<div id="commentByUser">
@foreach($comments as $comment)
	<div>
		{{$comment->commentbody}}
		--by : 
		<a href="#">{{$comment->firstname}}</a>
	</div>
@endforeach
</div>

<div>{{ HTML::link('/', 'Back to home') }}</div>
