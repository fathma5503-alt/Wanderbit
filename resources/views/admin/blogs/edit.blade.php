@extends('admin.layout')
@include('admin.sidebar')

@section('content')
<h4>Edit Blog</h4>

<form action="{{ route('blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
    <div class="col-md-6 mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ $blog->slug }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="draft" {{ $blog->status=='draft'?'selected':'' }}>Draft</option>
            <option value="published" {{ $blog->status=='published'?'selected':'' }}>Published</option>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label>Cover Image</label>
        <input type="file" name="cover_image" class="form-control">
        @if($blog->cover_image)
        <img class="cov" src="{{ asset('public/uploads/blog/'.$blog->cover_image) }}" style="height: 300px "  alt="Blog">
        @endif
    </div>
   <div> <div class="col-12 mb-3">
        <label>Content</label>
        <textarea name="content" id="content" rows="5" class="form-control">{{ $blog->content }}</textarea>
    </div>
    <div class="col-md-4 mb-3">
        <label>Meta Title</label>
        <input type="text" name="meta_title" class="form-control" value="{{ $blog->meta_title }}">
    </div>
     <div class="col-md-4 mb-3">
        <label>Meta Keywords</label>
        <input type="text" name="meta_keywords" class="form-control" value="{{ $blog->meta_keywords }}">
    </div>
    </div>

    <div class="col-md-4 mb-3">
        <label>Meta Description</label>
        <textarea name="meta_description" class="form-control">{{ $blog->meta_description }}</textarea>
    </div>
   
</div>
<button class="btn btn-success">Update Blog</button>
</form>

<script src="https://cdn.tiny.cloud/1/zmgm8gtvjcd2gmll4jrdhbwxhm7e5d2f5lheuvsx37ovyn76/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
tinymce.init({
    selector: '#content',
    height: 400,
    plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
    toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    menubar: false,
    branding: false
});
</script>
@endsection
