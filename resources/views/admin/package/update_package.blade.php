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

<form id="packageUpdateForm"
      action="{{ route('package.update', $package->id) }}"
      method="POST"
      enctype="multipart/form-data">
        @csrf
        @method('PUT')  

        <div class="mb-3">
            <label>Package Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $package->title) }}" required>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                <label>Price ($)/Night</label>
                <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $package->price) }}" required>
            </div>
            <div class="col-md-6">
                <label>Duration (Days)</label>
                <input type="number" name="duration_days" class="form-control" value="{{ old('duration_days', $package->duration_days) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Featured Image</label><br>
            @if($package->featured_image)
                <img src="{{ asset('public/storage/'.$package->featured_image) }}" width="220" style="margin-bottom: 10px; display: block;">
            @endif
            <input type="file" name="featured_image" class="form-control mt-2" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="other_images">Other Images</label>
            
            @if($package->other_images)
                <div style="margin-bottom: 15px; padding: 15px; background-color: #f8f9fa; border-radius: 5px;">
                    <strong>Current Images:</strong><br>
                    <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-top: 10px;">
                     @foreach(json_decode($package->other_images) as $index => $image)
    <div class="image-box" style="position: relative; display: inline-block;">
        <img src="{{ asset('public/storage/' . $image) }}"
             width="100"
             style="border:1px solid #ddd; border-radius:5px;">

        <button type="button"
                onclick="deleteImage(this, {{ $index }})"
                style="position:absolute; top:5px; right:5px;
                       width:32px; height:32px;
                       background:#dc3545; color:white;
                       border:none; border-radius:50%;">
            🗑️
        </button>
    </div>
@endforeach

                    </div>
                    <small style="display: block; margin-top: 10px; color: #666;">🗑️ Click the trash icon on images you want to delete</small>
                </div>
            @endif
            
            <label style="margin-top: 15px;">Add More Images</label>
            <input type="file" name="other_images[]" id="other_images" multiple accept="image/*">
            <small class="form-text text-muted">Select multiple images to add more</small>
            @error('other_images')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($category as $c)
                    <option value="{{$c->id}}" @selected($package->category_id == $c->id)>
                        {{$c->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Full Description</label>
            <textarea name="description" class="form-control" rows="5" placeholder="Description" required>{{ old('description', $package->description) }}</textarea>
        </div>

        <div class="mb-3">
            <input type="checkbox" name="is_active" value="1" id="active" @checked($package->is_active)>
            <label for="active">Publish Immediately</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Package</button>
    </form>
</div>

<style>
    .mb-3 label {
        font-weight: 600;
        color: #333;
    }
    
    button[type="button"]:hover {
        background-color: #c82333 !important;
        transform: scale(1.1);
    }
</style>

<script>
    function deleteImage(button, index) {
        // Create hidden checkbox
        const checkbox = document.createElement('input');
        checkbox.type = 'hidden';
        checkbox.name = 'delete_images[]';
        checkbox.value = index;
        document.querySelector('form').appendChild(checkbox);
        
        // Remove image from display
        button.closest('div').closest('div').style.opacity = '0.5';
        button.closest('div').style.pointerEvents = 'none';
        button.closest('div').style.textDecoration = 'line-through';
        
        // Visual feedback
        button.innerHTML = '✓';
        button.style.backgroundColor = '#28a745';
        button.disabled = true;
    }
</script>
@endsection