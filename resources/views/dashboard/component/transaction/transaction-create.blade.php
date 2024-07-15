@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Transaction</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Transaction</li>
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
                <h3 class="card-title">Add Transaction</h3>

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
                <form action="{{ route('transaction.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" required>
                    </div>

                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
