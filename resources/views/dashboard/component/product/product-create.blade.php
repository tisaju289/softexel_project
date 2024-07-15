@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
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
                <h3 class="card-title">Add Product</h3>

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
                <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Product Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>


                    <div class="mb-3">
                        <label for="price" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="subcategory_id">Sub Category</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
