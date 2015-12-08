@extends('app')

@section('title')
Edit Post
@endsection

@section('content')

<script src="{{ asset('/js/jquery.min-2.1.3.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	tinymce.init({ 
		selector:'textarea',
		plugins: 'image'
	});
</script>

<script src="{{ asset('/js/ImageSearch.js') }}">	</script>

<form method="post" action='{{ url("/update") }}'>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
	<div class="form-group">
		<input required="required" placeholder="Enter title here" type="text" name = "title" id="titleInput" class="form-control" value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}"/>
	</div>
	<div class="form-group">
		<textarea name='body'class="form-control">
			@if(!old('body'))
			{!! $post->body !!}
			@endif
			{!! old('body') !!}
		</textarea>
	</div>
	@if($post->active == '1')
	<input type="submit" name='publish' class="btn btn-success" value = "Update"/>
	@else
	<input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
	@endif
	<input type="submit" name='save' class="btn btn-default" value = "Save As Draft" />
	<a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a>
</form>
<div clas="form-group">
	<button name='imageSearch' class="btn btn-primary" id="imageSearch">Search Imgage</button>
	<button name='imageInsert' class="btn btn-primary" id = "imageInsert">Insert Imgage</button>
</div>

<div id="result"></div>
@endsection
