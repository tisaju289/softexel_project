@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Sub Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Sub Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if (Session::has('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Toastify({
                        text: "{{ Session::get('error') }}",
                        duration: 3000, // 3 seconds
                        gravity: "top", 
                        position: "right", 
                        backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                    }).showToast();
                });
            </script>
        @endif
        @if (Session::has('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Toastify({
                        text: "{{ Session::get('success') }}",
                        duration: 3000, // 3 seconds
                        gravity: "top", 
                        position: "right", 
                        backgroundColor: "linear-gradient(to right, #a8e063, #56ab2f)",
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                    }).showToast();
                });
            </script>
        @endif
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Sub Category</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $subcategory->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
