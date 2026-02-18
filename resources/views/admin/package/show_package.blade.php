@extends('admin.layout')
@extends('admin.sidebar')

@section('content')

<section class="table">
    <div style="width: 10%; height: 10%;">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
    
    <a class="btn add" href="http://localhost/WanderBit/admin/create_package">Add Package</a>
    <div class="table-responsive">
    <table class="table table-hover mb-0">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Price/Night</th>
            <th>Total</th>
            <th>Duration Days</th>
            <th>Image</th>
            <th>Category</th>
            <th>Description</th>
            <th>action</th>
        </tr>
        @foreach($package as $p)
        <tr>
            <td>
                {{$p->id}}
            </td>  
            <td>
                {{$p->title}}
            </td> 
            <td>
                {{$p->slug}}
            </td>    
            <td>
                {{$p->price}}
            </td>  
            <td>
                {{$p->total_amount}}
            </td>  
            <td>
                {{$p->duration_days}}
            </td> 
            <td>
                @if($p->featured_image)
                    <img 
                        src="{{ asset('public/storage/'.$p->featured_image) }}" 
                        width="120" 
                        style="object-fit:cover"
                    >
                @else
                    No Image
                @endif
            </td>
            <td>
                @if($p->category)
                    {{$p->category->name}}
                @else
                    <span style="color: red;">No Category</span>
                @endif
            </td>
            <td>
                {{$p->description}}
            </td>  
            <td>
                <a href="{{ route('update_package', $p->id) }}" class="btn btn-success" id="update">Update</a>
                <form action="{{ route('delete_package', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button id="delete" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Package?')">Delete</button>
                </form>    
            </td> 
        </tr>
        @endforeach
    </table>
    </div>
</section>

@endsection