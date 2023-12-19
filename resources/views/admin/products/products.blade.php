@extends('admin.layouts.layout')
@section('scritps')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <a href="">products</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class=" float-right">
                                <a href="{{ route('admin.add.edit.product') }}" class=" btn btn-primary">Create
                                    Products</a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-header ">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Sucess:</strong>{{ Session::get('success_message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="" method="get">
                                @csrf
                                <div class="col-md-12">
                                    <div class=" d-flex justify-content-between align-items-center">
                                        <div class=" card-title">
                                            <a href="{{ route('admin.categories') }}"
                                                class="btn btn-sm btn-default">Reset</a>
                                        </div>
                                        <div class="card-tools">
                                            <div class="input-group input-group" style="width: 250px;">
                                                <input value="{{ Request::get('Keyword') }}" type="text" name="Keyword"
                                                    class="form-control float-right" placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table id="example" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Product Color</th>
                                            <th>Create at</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td>{{ optional($product)->id ?? 'N/A' }}</td>
                                                <td>{{ optional($product)->product_name ?? 'N/A' }}</td>
                                                <td>{{ optional($product)->product_code ?? 'N/A' }}</td>
                                                <td>{{ optional($product)->product_color ?? 'N/A' }}</td>
                                                <td>
                                                    @if (optional($product->created_at)->format('Y-m-d'))
                                                        {{ optional($product->created_at)->format('Y-m-d') }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="updateProductStatus" id="product-{{ $product['id'] }}"
                                                        product_id="{{ $product['id'] }}" href="javascript:void(0)">
                                                        @if ($product['status'] == 1)
                                                            <i class="fas fa-toggle-on" status="Active"></i>
                                                        @else
                                                            <i class="fas fa-toggle-off" style="color: grey"
                                                                status="Inactive"></i>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class=" d-flex justify-content-around align-items-center">
                                                    <a href="{{ url('admin/add-edit-product/' . $product->id) }}"><i
                                                            class="fas fa-edit" style="font-size: #3fed3"></i></a>
                                                    <a class="confirmDelete" name="product" title="Delete product"
                                                        href="javascript:void(0)" record="product"
                                                        recordid="{{ $product->id }}"><i class="fas fa-trash"
                                                            style="font-size: red"></i></a>

                                                </td>
                                            </tr>
                                            {{-- href="{{ url('admin/delete-cms-pages/' . $page->id) }}" --}}
                                        @empty
                                            <tr>
                                                <td colspan="5">No item record</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!-- /.card-header -->
                    </div>
                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection