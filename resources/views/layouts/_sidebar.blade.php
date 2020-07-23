
<div class="card mb-2 boder-white bg-light text-secondary">
	<div class="card-body shadow">
		<div class="card-title text-center">
			公告
		</div>
		<hr>
        <small>
            {!! blog_setting('notice') !!}
        </small>
	</div>
</div>
<div class="card mb-2 border-white bg-light text-secondary">
	<div class="card-body shadow">
		<div class="card-title text-center">
			标签
		</div>
		<hr>
		@foreach ($sidebar_tags as $tag)
			<a class="btn btn-light btn-sm my-1 mr-1 shadow rounded" href="{{ $tag->link() }}">
				<span class="
				@if (isset($selected_tag) && $selected_tag == $tag->title)
						font-weight-bold
				@endif
				text-secondary">{{ $tag->title }}</span>
				{{--<span class="badge badge-secondary">12</span>--}}
			</a>
		@endforeach
	</div>
</div>
<div class="card mb-2 border-white bg-light text-secondary">
	<div class="card-body shadow">
		<div class="card-title text-center">
			友情链接
		</div>
		<hr>
		<small>
			<ul class="list-unstyled">
				{!! blog_setting('friendship_link') !!}
			</ul>
		</small>
	</div>
</div>