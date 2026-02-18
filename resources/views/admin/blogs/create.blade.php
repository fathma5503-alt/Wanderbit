@extends('admin.layout')
@include('admin.sidebar')

@section('content')
<h4>Add New Blog</h4>

<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="col-md-6 mb-3">
        <label>Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
        <label>Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label>Cover Image</label>
        <input type="file" name="cover_image" class="form-control">
    </div>
    <div class="col-12 mb-3">
        <label>Content</label>
        <textarea name="content" id="content" rows="5" class="form-control"></textarea>
    </div>
  <div><div class="col-md-4 mb-3">
        <label>Meta Title</label>
        <input type="text" name="meta_title" class="form-control">
    </div>
  
    <div class="col-md-4 mb-3">
        <label>Meta Keywords</label>
        <input type="text" name="meta_keywords" class="form-control">
    </div></div>  
      <div class="col-md-4 mb-3">
        <label>Meta Description</label>
        <textarea name="meta_description" class="form-control"></textarea>
    </div>
</div>
<button class="btn btn-success">Save Blog</button>
</form>


@endsection
