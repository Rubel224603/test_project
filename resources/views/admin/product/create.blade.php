@extends('admin.master')
@section('title')
    Product Create
@endsection
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Product Create</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product create</li>
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
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title fw-bold">Add Product Form</h3>
                            <a href="{{ route('admin.product.list') }}" class="btn btn-success ms-auto">Product List</a>
                        </div>
                        <div class="card-body">

                            {{-- Success message --}}
                            {{-- @if (session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif --}}



                            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label">Product Title</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Product title" >
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" min="0" id="price" name="price"value="{{ old('price') }}"class="form-control" placeholder="Enter Price" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="qty" class="form-label">Quantity</label>
                                    <input type="number" min="0" id="qty" name="qty"
                                        value="{{ old('qty') }}" place="Enter Qunatity" class="form-control @error('qty') is-invalid @enderror"
                                        placeholder="Enter Quantity" required>
                                    @error('qty')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <select name="unit" id="unit"
                                        class="form-select @error('unit') is-invalid @enderror" required>
                                        <option value="">Select Unit</option>
                                        <option value="kg" @selected(old('unit') == 'kg')>kg</option>
                                        <option value="piece" @selected(old('unit') == 'piece')>Piece</option>
                                        <option value="liter" @selected(old('unit') == 'liter')>Liter</option>
                                        <option value="meter" @selected(old('unit') == 'meter')>Meter</option>
                                    </select>
                                    @error('unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Product Image</label>
                                    <input type="file" id="image" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="4"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-success ">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
