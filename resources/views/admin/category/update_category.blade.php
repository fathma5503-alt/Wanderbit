@extends('admin.layout')
@extends('admin.sidebar')

@section('content')

<div style="width: 50%; height: 50%;">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>

<section>
    <form class="form1" action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input name="name" type="text" placeholder="Name" value="{{ old('name', $category->name) }}" required>
        <textarea name="description" cols="30" rows="5">{{ old('description', $category->description) }}</textarea>
        
        <button type="submit">Save</button>
    </form>
</section>

@endsection