@extends('admin.layout')
@include('admin.sidebar')

@section('content')

<div style="width: 50%; height: 50%;">

    @if(session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
</div>
    <section>

        <form class="form1" action="{{  route('create_cate') }}" method="post">
            @csrf

            <input name="name" type="text" placeholder="Name">
            <textarea name="description" rows="5" placeholder="Description"></textarea>

            <button>save</button>
        </form>
    </section>

</div>

</div>
    @endsection