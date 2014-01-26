@if(count($blog)==0)
	<div>No content is there!!</div>
@else
	<div class="blog-post">
	@foreach($blog as $content)
		<div class="post-item" id="article-{{$content->id}}">
			<div class="caption wrapper-lg">
                    <h2 class="post-title"><a href="{{ url('blog/display/'.$content->bid)}}">{{$content->title}}</a></h2>
                    <div class="post-sum">
                      <p>{{ substr(strip_tags($content->blog_body),0,255)}}</p>
                    </div>
                    <div class="line line-lg"></div>
                    <div class="text-muted">
                      <i class="fa fa-user icon-muted"></i> by <a href="#" class="m-r-sm">{{$content->firstname.' '.$content->lastname}}</a>
                      <i class="fa fa-clock-o icon-muted"></i> {{$content->created_at}}
                      <!-- <a href="#" class="m-l-sm"><i class="fa fa-comment-o icon-muted"></i> 2 comments</a> -->
                    </div>
                  </div>
            </div>	
	@endforeach
	</div>
@endif
<div align="center">
	<ul class="pagination">
		<?php echo $blog->links(); ?>
	  <!--<li class="previous"><a href="#">&larr; Older</a></li>
	  <li class="next"><a href="#">Newer &rarr;</a></li>-->
	</ul>
</div>
