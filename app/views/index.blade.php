@if(count($blog)==0)
	<div>No content is there!!</div>
@else
	@foreach($blog as $content)
		<article id="article-{{$content->id}}">
			<h2>{{$content->title}}</h2>By : {{$content->firstname.' '.$content->lastname}}<br/>
			<span>{{ substr(strip_tags($content->blog_body),0,255)}}</span><br/>
			<?php //echo $content->tags
			//$content->uid 
			//$content->updated_at
			?>
			{{$content->created_at}}
			{{ HTML::link('blog/display/'.$content->id,'Read More') }}<br/>
		</article>
		
	@endforeach
@endif
<div align="center">
	<ul class="pagination">
		<?php echo $blog->links(); ?>
	  <!--<li class="previous"><a href="#">&larr; Older</a></li>
	  <li class="next"><a href="#">Newer &rarr;</a></li>-->
	</ul>
</div>
