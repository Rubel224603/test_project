@extends('admin.master')
@section('title')
    Product Update
@endsection
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Product Edit Page</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Update <Form:post></Form:post>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title fw-bold">Update Product Form</h3>
                        </div>
                        <div class="card-body">

                            {{-- Success message --}}
                            @if (session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif




                            <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST"
                                enctype="multipart/form-data">


                                <div class="mb-3">
                                    <label for="title" class="form-label">Product Title</label>
                                    <input type="text" id="title" name="title" value="{{ $product->title }}"
                                        class="form-control" required>

                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" id="price" name="price" value="{{ $product->price }}"
                                        class="form-control" required>

                                </div>

                                <div class="mb-3">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="number" id="qty" name="qty" value="{{ $product->qty }}"
                                        class="form-control" required>

                                </div>

                                <select name="unit" id="unit" class="form-select">
                                    <option value="kg"    {{ $product->unit == 'kg' ? 'selected' : '' }}>kg</option>
                                    <option value="meter" {{ $product->unit == 'meter' ? 'selected' : '' }}>meter</option>
                                    <option value="liter" {{ $product->unit == 'liter' ? 'selected' : '' }}>liter</option>
                                    <option value="piece" {{ $product->unit == 'piece' ? 'selected' : '' }}>piece</option>
                                </select>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Product Image</label> <br>
                                    <img src="{{ '/admin/product/' . $product->image }}" alt="product image"
                                        class="w-50 mt-1">

                                    <input type="file" id="image" name="image" class="form-control ">

                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="4" class="form-control">{{ $product->description }}
                                    </textarea>

                                </div>

                                @csrf

                                <button type="submit" class="btn btn-success mt-2 float-end">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
