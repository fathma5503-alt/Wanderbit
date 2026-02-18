@extends('admin.layout')

@section('content')
<h2>{{ $blog->title }}</h2>
<p>{{ $blog->content }}</p>
@endsection

