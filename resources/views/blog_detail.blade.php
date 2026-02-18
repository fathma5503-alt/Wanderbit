 
@extends('layout.head')
@include('layout.header')
<div class="di">
 <div >
        <div class="container">
            <h2 style="color: #f5c542;" class="m-0">{{ $blog->title }}</h2>
        </div>
    </div>
    

    <div class="container py-5">
<div class="div-im">
        <!-- COVER IMAGE -->
        @if($blog->cover_image)
            <img src="{{ asset('public/uploads/blog/'.$blog->cover_image) }}" 
                 class="img-fluid blog-image mb-4" 
                 alt="{{ $blog->title }}">
        @endif

        <!-- CONTENT -->
        <div class="mb-5">
            <h3>{!! $blog->content !!}</h3>
        </div>
</div>
        <hr>

        <!-- RELATED POSTS -->
        <h4 class="mb-3">Related Posts</h4>
        <div class="row">
            @foreach($related as $item)
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <img src="{{ asset('public/uploads/blog/'.$blog->cover_image) }}" 
                             class="card-img-top" 
                             style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h6>{{ $item->title }}</h6>
                            <a href="{{ url('/blogs/'.$item->slug) }}" class="btn btn-primary btn-sm mt-2">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@include('layout.footer')
@include('layout.script')
