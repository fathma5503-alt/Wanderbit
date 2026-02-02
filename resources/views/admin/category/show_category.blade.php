@extends('admin.layout')
@extends('admin.sidebar')

@section('content')
<section class="table">
    <div style="width: 10%; height: 10%;">
        @if(session('success'))
  
@endif
    </div>
    
<a class="btn add" href="http://localhost/WanderBit/admin/create_category">Add Category</a>
  <div class="table-responsive">
<table class="table table-hover mb-0">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Description</th>
        <th>action</th>
    </tr>
    @foreach($category as $c)
    <tr>
          
        <td>
            {{$c->id}}
        </td>  
        <td>
            {{$c->name}}

        </td> 
        <td>
            {{$c->description}}
        </td>  

        <td>
           <a href="{{ route('update_category', $c->id) }}" class="btn btn-success" id="update">Update</a>
           <form action="{{ route('delete_category', $c->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button id="delete" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Category?')">Delete</button>
            </form>    
        </td> 
    </tr>
    @endforeach
</table>
</div>
</section>
</div>
    @endsection
