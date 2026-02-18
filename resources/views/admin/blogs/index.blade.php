@extends('admin.layout')
@include('admin.sidebar')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>All Blogs</h4>
    <a href="{{ route('blogs.create') }}" class="btn btn-success">+ Add Blog</a>
</div>


<form method="GET" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search blog title..." value="{{ request('search') }}">
</form>

<table  class="blog-table" >
  <tbody class="tbo">
        <tr >
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>Image</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
 

        @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->id }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ ucfirst($blog->status) }}</td>
                 <td>
            <div style="margin: 10px 0;">
      <img src="{{ asset('public/uploads/blog/'.$blog->cover_image) }}" width="120" height="120" style="object-fit: cover; border-radius: 5px;">
    </div>
        </td>
            <td>{{ $blog->slug }}</td>
            <td>
                <a href="{{ route('blogs.edit',$blog->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Delete this blog?')" class="btn btn-danger btn-sm bt">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $blogs->links() }}
@endsection
