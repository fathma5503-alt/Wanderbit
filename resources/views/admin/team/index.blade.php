@extends('admin.layout')
@include('admin.sidebar')

@section('content')
<section class="table">
    <div style="width: 10%; height: 10%;">
        @if(session('success'))
  
@endif
    </div>
    
<a class="btn add" href="{{ route('team.create') }}">Add Team</a>
  <div class="table-responsive">
<table class="table table-hover mb-0">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>description</th>
        <th>Profile Image</th>
        <th>action</th>
    </tr>
    @foreach($team as $t)
    <tr>
          
        <td>
            {{$t->id}}
        </td>  
        <td>
            {{$t->name}}

        </td> 
        <td>
            {{$t->description}}
        </td>  
<td>
                @if($t->image)
                    <img 
                        src="{{ asset('public/storage/'.$t->image) }}" 
                        width="120" 
                        style="object-fit:cover"
                    >
                @else
                    No Image
                @endif
            </td>
     
                    <td>
                        <a href="{{ route('team.edit', $t->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('team.delete', $t->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this team?')">Delete</button>
                        </form>    
        </td> 
    </tr>
    @endforeach
</table>
</div>
</section>
</div>
    @endsection
