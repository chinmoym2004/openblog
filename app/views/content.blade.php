@foreach($blogcontent as $content)
	<?php $i=$content->id; ?>
		<div class="blog-post">
			<div class="post-item" id="article-{{$content->id}}">
			<div class="caption wrapper-lg">
                    <h2 class="post-title"><a href="{{ url('blog/display/'.$content->id)}}">{{$content->title}}</a></h2>
                    <div class="post-sum">
	                  <p>{{ $content->blog_body }}</p>
                    </div>
                    <div class="line line-lg"></div>
                    <div class="tags m-b-lg">
	                 	<?php
		                    $tag=explode(',',$content->tags);
		                    for ($i=0; $i < count($tag); $i++) { 
		                    	echo '<a href="#" class="label bg-success">'.$tag[$i].'</a>';
		                    }
		                ?>	                
	            	</div>
                    <div class="text-muted">
                      	<i class="fa fa-user icon-muted"></i> by <a href="#" class="m-r-sm">{{$content->firstname.' '.$content->lastname}}</a>
                      	<i class="fa fa-clock-o icon-muted"></i> {{$content->created_at}}
                      	<a href="#" class="m-l-sm"><i class="fa fa-comment-o icon-muted"></i> 2 comments</a>
                       	<a href="#" class="btn btn-white btn-xs likebtn" data-id="{{$content->id}}">
							<i class="fa fa-thumbs-up"></i>&nbsp;&nbsp;{{$content->no_likes}} likes
						</a>
                    </div>
                    
            </div>
            </div>
        </div>	
@endforeach
<!-- <div class="well">
	<textarea placeholder="leave a comment" cols="50" rows="2"  class=""></textarea>
	<button class="ImPosting">Post</button>
</div> -->
<h4 class="m-t-lg m-b">Leave a comment</h4>
@if(!Auth::check())	
	<!-- <form>
	    <div class="form-group pull-in clearfix">
	        <div class="col-sm-6">
	            <label>Your name</label>
	              <input type="text" class="form-control" placeholder="Name">
	        </div>
	        <div class="col-sm-6">
	            <label>Email</label>
	               	<input type="email" class="form-control" placeholder="Enter email">
	        </div>
	    </div>
	    <div class="form-group">
	        <label>Comment</label>
	        <textarea class="form-control" rows="5" placeholder="Type your comment" data-id=$i></textarea>
	    </div>
	    <div class="form-group">
	        <button type="submit" class="btn btn-success ImPosting">Submit comment</button>
	    </div>
	</form> -->
	<div class="form-group">
	        <a href="{{url("users/login")}}" class="btn btn-s-md btn-info btn-rounded">Login to leave a comment</a>
	</div>
@else
	<form>
		<div class="form-group">
	        <label>Comment</label>
	        <textarea class="form-control" rows="5" placeholder="Type your comment" data-id={{$i}}></textarea>
	    </div>
	    <div class="form-group">
	        <button type="submit" class="btn btn-success ImPosting">Submit comment</button>
	    </div>
	</form>
@endif

<div id="commentByUser">
@foreach($comments as $comment)
<section class="comment-list block">
    <article id="comment-id-1" class="comment-item">
        <a class="pull-left thumb-sm">
            <img src="images/avatar.jpg" class="img-rounded">
        </a>
        <section class="comment-body m-b">
            <header>
                <a href="#"><strong>{{$comment->firstname}}</strong></a>
                <label class="label bg-info m-l-xs">Editor</label> 
                <span class="text-muted text-xs block m-t-xs">
                {{$comment->created_at}}
                </span>
            </header>
            <div class="m-t-sm">{{$comment->commentbody}}</div>
        </section>
    </article>
</section>
@endforeach
</div>
