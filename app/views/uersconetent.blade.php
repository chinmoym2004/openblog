<div class="heading"><pre><h4>My Posts</h4></pre></div>
@if(count($blogcontent)>0)
	@foreach($blogcontent as $content)
		<article id="article-{{$content->id}}" class="myarticle">
				<div style="float:right" class="opertion">
					<a href="{{url('blog/edit')}}/{{$content->id}}">edit</a>
					<a href="{{url('blog/delete')}}/{{$content->id}}">delete</a>
				</div>
				<h4>{{$content->title}}</h4>
				Author : {{$content->firstname.' '.$content->lastname}}</h2>
				<span>{{$content->blog_body}}</span>
				{{$content->tags}}
				{{$content->uid}}
				{{$content->created_at}}
				{{$content->updated_at}}
				{{ HTML::link('blog/display/'.$content->id,'Read More') }}
		</article>
	@endforeach
@elseif
	<div>you have not posted anything yet.</div>
@endif

<a href="{{url('blog/edit')}}/0">Post a content?</a>