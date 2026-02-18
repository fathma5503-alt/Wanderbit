@extends('admin.layout')
@include('admin.sidebar')

@section('content')

<section class="container mt-4">

    <form class="form1"action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

           <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
        </div>

            <div class="mb-3">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="5" placeholder="Message" required>{{ old('message', $testimonial->message) }}</textarea>
        </div>
        
         <div class="mb-3">
            <label>Profile Image</label><br>
            @if($testimonial->image)
                <img src="{{ asset('public/storage/'.$testimonial->image) }}" width="220" style="margin-bottom: 10px; display: block;">
            @endif
            <input type="file" name="image" class="form-control mt-2" accept="image/*">
        </div>

            <button>save</button>
        </form>
    </section>

</div>

</div>
    @endsection