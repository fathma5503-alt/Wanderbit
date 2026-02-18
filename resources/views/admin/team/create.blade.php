@extends('admin.layout')
@include('admin.sidebar')

@section('content')

<div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section>

       
    <form class="form1"
          action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

           <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" >
        </div>

            <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5" placeholder="Description"></textarea>
        </div>
        
            <div class="mb-3">
            <label>Profile Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

            <button>save</button>
        </form>
    </section>

</div>

</div>
    @endsection