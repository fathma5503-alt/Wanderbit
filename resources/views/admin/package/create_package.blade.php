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

    <form action="{{ route('create_pack') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Package Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Price ($)/Night</label>
                <input type="number" name="price" id="price" step="0.01" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Duration (Days)</label>
                <input type="number" name="duration_days" id="duration_days" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Total ($) <small class="text-muted">(auto-calculated)</small></label>
                <input type="number" name="total_amount" id="total_amount" step="0.01" class="form-control" readonly style="background:#f0f0f0;">
            </div>
        </div>

        <div class="mb-3">
            <label>Featured Image</label>
            <input type="file" name="featured_image" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="other_images">Other Images</label>
            <input type="file" name="other_images[]" id="other_images" class="form-control" multiple accept="image/*">
            @error('other_images')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($category as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Full Description</label>
            <textarea name="description" class="form-control" rows="5" placeholder="Description" required></textarea>
        </div>

        <div class="mb-3">
            <input type="checkbox" name="is_active" value="1" checked id="active">
            <label for="active">Publish Immediately</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Package</button>
    </form>
</div>

<script>
    function calculateTotal() {
        const price = parseFloat(document.getElementById('price').value) || 0;
        const days  = parseFloat(document.getElementById('duration_days').value) || 0;
        document.getElementById('total_amount').value = (price * days).toFixed(2);
    }

    document.getElementById('price').addEventListener('input', calculateTotal);
    document.getElementById('duration_days').addEventListener('input', calculateTotal);
</script>
@endsection