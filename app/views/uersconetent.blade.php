<h5 class="font-semibold">my Posts</h5>
<div class="blog-post">
@if(count($blogcontent)>0)
	@foreach($blogcontent as $content)
		<div class="post-item myarticle" id="article-{{$content->id}}">
			<div style="float:right" class="opertion">
					<a href="{{url('blog/edit')}}/{{$content->id}}"><i class="fa fa-edit"></i></a>
					<a href="{{url('blog/delete')}}/{{$content->id}}"><i class="fa fa-trash-o"></i></a>
			</div>
			<div class="caption wrapper-lg">
                    <h2 class="post-title"><a href="{{ url('blog/display/'.$content->id)}}">{{$content->title}}</a></h2>
                    <div class="post-sum">
                      <p>{{ substr(strip_tags($content->blog_body),0,255)}}</p>
                    </div>
                    <div class="line line-lg"></div>
                    <div class="text-muted">
                      <i class="fa fa-user icon-muted"></i> by <a href="#" class="m-r-sm">You</a>
                      <i class="fa fa-clock-o icon-muted"></i> {{$content->created_at}}
                      <a href="#" class="m-l-sm"><i class="fa fa-comment-o icon-muted"></i> 2 comments</a>
                    </div>
                    {{ HTML::link('blog/display/'.$content->id,'Read More') }}
                  </div>
            </div>	
	@endforeach
@elseif
	<div>you have not posted anything yet.</div>
@endif
</div>
<a href="{{url('blog/edit')}}/0">Post New?</a>