@extends('admin.master')
@section('title')
    Product Create
@endsection
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product create</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="title" class="form-label">Product Title</label>
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-sm w-50" placeholder="Enter product title"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" id="price" name="price"
                                    class="form-control form-control-sm w-50" placeholder="Enter price" min="0"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" id="qty" name="qty"
                                    class="form-control form-control-sm w-50" placeholder="Enter quantity"
                                    min="0" required>
                            </div>

                            <div class="col-md-6">
                                <label for="unit" class="form-label">Unit</label>
                                <select id="unit" name="unit" class="form-select form-select-sm w-50" required>
                                    <option value="kg">kg</option>
                                    <option value="piece">piece</option>
                                    <option value="meter">meter</option>
                                    <option value="liter">liter</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" id="image" name="image"
                                    class="form-control form-control-sm w-50"  required>
                            </div>

                            <div class="col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="4" class="form-control form-control-sm w-50"
                                    placeholder="Enter description" required></textarea>
                            </div>


                            <div class="col-12 mt-0">
                                <button type="submit" class="btn btn-success btn-sm" style="margin-top:-40px">Add Product</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
            <div class="row justify-content-center">
                <!-- Start col -->


                <!-- /.Start col -->
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">

                                <h3 class="card-title fw-bold">Product List</h3>


                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <span class="text-success">{{ session('message') }}</span> --}}
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Description</th>
                                        <th>image</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->unit }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <img src="{{ asset('/admin/product/' . $product->image) }}"
                                                    alt="prodcut_iamge" class="w-25 h-25">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                                    class='btn btn-sm btn-primary'>Edit</a>
                                                <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}"
                                                    onclick="confirm('Are your Sure?To Delete')"
                                                    class="btn btn-danger btn-sm mt-1">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
@endsection
