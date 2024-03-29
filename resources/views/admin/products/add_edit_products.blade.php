@extends('admin.layouts.layout')
@section('content')
    <div class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card ">
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
                        @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong>{{ Session::get('error_message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 card card-primary">
                    <div class="p-2 d-flex justify-content-between align-items-center">
                        <h3 class="card-title">{{ $title }}</h3>
                        <a href="{{ route('admin.products') }}" class="btn btn-warning ">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form name="productForm" id="productForm" method="post" enctype="multipart/form-data"
            @if (empty($product['id'])) action="{{ route('admin.add.edit.product') }}"
    @else
        action="{{ route('admin.add.edit.product', ['id' => $product['id']]) }}" @endif>
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Category & Brand -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Category & Brand </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="category_id">Select Category</label>
                                        <select class="custom-select rounded-0" name="category_id">
                                            <option value="">Select</option>
                                            @foreach ($getCategories as $cat)
                                                <option
                                                    @if (!empty(old('category_id')) && $cat->id == old('category_id')) selected @elseif (!empty($product->category_id) && $product->category_id == $cat->id) selected @endif
                                                    value="{{ $cat->id }}">⚫ {{ $cat->category_name }}</option>
                                                @foreach ($cat->subCategories as $subcat)
                                                    <option
                                                        @if (!empty(old('category_id')) && $subcat->id == old('category_id')) selected @elseif (!empty($product->category_id) && $product->category_id == $subcat->id) selected @endif
                                                        value="{{ $subcat->id }}">⚪ ⚪ {{ $subcat->category_name }}
                                                    </option>
                                                    @foreach ($subcat->subCategories as $subsubcat)
                                                        <option
                                                            @if (!empty(old('category_id')) && $subsubcat->id == old('category_id')) selected @elseif (!empty($product->category_id) && $product->category_id == $subsubcat->id) selected @endif
                                                            value="{{ $subsubcat->id }}" class="red-text">⚪ ⚪ ⚪
                                                            {{ $subsubcat->category_name }}</option>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Brands</label>
                                        <select name="brand_id" id="brand_id" class="custom-select rounded-0">
                                            <option value="">Select</option>
                                            @foreach ($getBrands as $brand)
                                                <option value="{{ $brand['id'] }}"
                                                    @if (!empty($product['brand_id']) && $product['brand_id'] == $brand['id']) selected @endif>
                                                    {{ $brand['brand_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Product  --}}
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Info Product</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name"
                                            placeholder="Enter Product Name"
                                            @if (!empty($product['product_name'])) value="{{ $product['product_name'] }}" @else value="{{ old('product_name') }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_code">product Code</label>
                                        <input type="text" class="form-control" id="product_code" name="product_code"
                                            placeholder="Enter Page product_code"
                                            @if (!empty($product['product_code'])) value="{{ $product['product_code'] }}" @else value="{{ old('product_code') }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_color">product color</label>
                                        <input type="text" class="form-control" id="product_color" name="product_color"
                                            placeholder="Enter Page product_color"
                                            @if (!empty($product['product_color'])) value="{{ $product['product_color'] }}" @else value="{{ old('product_color') }}" @endif>
                                    </div>
                                    @php
                                        $familyColors = \App\Models\Color::colors();
                                    @endphp
                                    <div class="form-group">
                                        <label for="family_color">Family Color</label>
                                        <select class="custom-select rounded-0" name="family_color">
                                            <option value="">Select Main Colors</option>
                                            @foreach ($familyColors as $color)
                                                <option value="{{ $color['color_name'] }}"
                                                    @if (old('family_color', $product->family_color) == $color['color_name'] ||
                                                            $product->family_color == $color['color_name']
                                                    ) selected @endif>
                                                    {{ $color['color_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="group_code">Group Code</label>
                                        <input type="text" class="form-control" id="group_code" name="group_code"
                                            placeholder="Enter Page group_code"
                                            @if (!empty($product['group_code'])) value="{{ $product['group_code'] }}" @else value="{{ old('group_code') }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">product price</label>
                                        <input type="number" class="form-control" id="product_price"
                                            name="product_price" placeholder="Enter Page product_price"
                                            @if (!empty($product['product_price'])) value="{{ $product['product_price'] }}" @else value="{{ old('product_price') }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_discount">product discount(%)</label>
                                        <input type="text" class="form-control" id="product_discount"
                                            name="product_discount" placeholder="Enter Page product_discount"
                                            @if (!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" @else value="{{ old('product_discount') }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_weight">product weight</label>
                                        <input type="text" class="form-control" id="product_weight"
                                            name="product_weight" placeholder="Enter Page product_weight"
                                            @if (!empty($product['product_weight'])) value="{{ $product['product_weight'] }}" @else value="{{ old('product_weight') }}" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Product Image  --}}
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Product Image & Video</h3>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="product_video">Product Video</label>
                                        <input type="file" class="form-control" id="product_video"
                                            name="product_video">

                                        @if (!empty($product['product_video']))
                                            <div class="mt-3">
                                                <label>Current Video:</label> <br>
                                                <video width="320" height="240" controls>
                                                    <source src="{{ url('front/videos/' . $product['product_video']) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <div class="">
                                                    <a href="{{ url('front/videos/' . $product['product_video']) }}"
                                                        target="_blank" class="btn btn-info">View Video</a>
                                                    <a class="btn btn-danger confirmDelete" title="Delete Product Video"
                                                        href="javascrpt:void(0)" record="product-video"
                                                        recordid="{{ $product['id'] }}">Delete Video</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="product_images">Product image</label>
                                        <input type="file" class="form-control" id="product_images"
                                            name="product_images[]" multiple>
                                        <label for="product_images" class="mt-3">Current image</label>
                                        <div class="container-fluid ">
                                            <div class="row">
                                                <div class="d-flex justify-content-start gap-1">
                                                    @foreach ($product['images'] as $image)
                                                        <div class="col-md-2 ">
                                                            <div class="div_images">
                                                                <img class="img_pr"
                                                                    src="{{ asset('front/images/products/' . $image['image']) }}"
                                                                    alt="" />
                                                            </div>
                                                            <input type="hidden" name="image[]"
                                                                value="{{ $image['image'] }}">
                                                            <div class="div_sort">
                                                                <input type="number" class="sort_inpit"
                                                                    name="image_sort[]"
                                                                    value="{{ $image['image_sort'] }}" />
                                                                <a class="btn btn-danger confirmDelete"
                                                                    title="Delete Product images" href="javascrpt:void(0)"
                                                                    record="product-image"
                                                                    recordid="{{ $image['id'] }}">Delete</a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Product Attribute  --}}
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Product Attribute</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Added Attr</label>
                                        <table class="table" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Size</th>
                                                    <th>SKU</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($product['attributes']))
                                                    @foreach ($product['attributes'] as $attribute)
                                                        <input type="hidden" name="attributeId[]"
                                                            value="{{ $attribute['id'] }}">
                                                        <tr>
                                                            <td>{{ $attribute['id'] }}</td>
                                                            <td>{{ $attribute['size'] }}</td>
                                                            <td>{{ $attribute['sku'] }}</td>
                                                            <td>
                                                                <input type="number" style="width: 100px" name="price[]"
                                                                    value="{{ $attribute['price'] }}">
                                                            </td>
                                                            <td>
                                                                <input type="number" style="width: 100px" name="stock[]"
                                                                    value="{{ $attribute['stock'] }}">
                                                            </td>
                                                            <td>
                                                                <a class="updateAttributeStatus"
                                                                    id="attribute-{{ $attribute['id'] }}"
                                                                    attribute_id="{{ $attribute['id'] }}"
                                                                    href="javascript:void(0)">
                                                                    @if ($attribute['status'] == 1)
                                                                        <i class="fas fa-toggle-on" status="Active"></i>
                                                                    @else
                                                                        <i class="fas fa-toggle-off" style="color: grey"
                                                                            status="Inactive"></i>
                                                                    @endif
                                                                </a>
                                                            </td>
                                                            <td class="">
                                                                <a class="confirmDelete" name="attribute"
                                                                    title="Delete attribute" href="javascript:void(0)"
                                                                    record="attribute"
                                                                    recordid="{{ $attribute['id'] }}"><i
                                                                        class="fas fa-trash"
                                                                        style="font-size: red"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif


                                            </tbody>

                                        </table>

                                    </div>
                                    <div class="form-group">
                                        <label>Add Product Attr</label>
                                        <div class="field_wrapper">
                                            <div>
                                                <input type="text" name="size[]" placeholder="Size"
                                                    style="width: 120px;" />
                                                <input type="text" name="sku[]" placeholder="SKU"
                                                    style="width: 120px;" />
                                                <input type="text" name="price[]" placeholder="Price"
                                                    style="width: 120px;" />
                                                <input type="text" name="stock[]" placeholder="Stock"
                                                    style="width: 120px;" />
                                                <a href="javascript:void(0);" class="add_button"
                                                    title="Add field">Add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Filter Product such as fabric  --}}
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Product Attribute</h3>
                                </div>
                                <div class="card-body">
                                    @include('admin.products.filter_product')
                                </div>
                            </div>
                        </div>
                        {{-- Descriion Product --}}
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Product Description & Search Keywords</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="description" name="description">
@if (!empty($product['description']))
{{ $product['description'] }}@else{{ old('description') }}
@endif
</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="wash_care">Wash Care</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="wash_care" name="wash_care">
@if (!empty($product['wash_care']))
{{ $product['wash_care'] }}@else{{ old('wash_care') }}
@endif
</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Search_Keywords">Search Keywords</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="Search_Keywords" name="Search_Keywords">
@if (!empty($product['Search_Keywords']))
{{ $product['Search_Keywords'] }}@else{{ old('Search_Keywords') }}
@endif
</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- SEO tag --}}
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">SEO Tags</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="meta_title">meta_title*</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                                            placeholder="Enter Page meta_title"
                                            @if (!empty($product['meta_title'])) value="{{ $product['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">meta_description *</label>
                                        <input type="text" class="form-control" name="meta_description"
                                            id="meta_description" placeholder="Enter Page meta_description"
                                            @if (!empty($product['meta_description'])) value="{{ $product['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_Keywords">meta_keywords*</label>
                                        <input type="text" class="form-control" name="meta_Keywords"
                                            id="meta_Keywords" placeholder="Enter Page meta_Keywords"
                                            @if (!empty($product['meta_Keywords'])) value="{{ $product['meta_Keywords'] }}" @else value="{{ old('meta_Keywords') }}" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- checkbox --}}
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Product Attribute</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes"
                                            name="is_featured" @if (!empty($product['is_featured']) && $product['is_featured'] == 'Yes') checked @endif>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            is_featured
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes"
                                            name="is_bestseller" @if (!empty($product['is_bestseller']) && $product['is_bestseller'] == 'Yes') checked @endif>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            is_bestseller
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer col-md-6">
                <button type="submit" id="sub" class=" btn-primary float-right btn-lg">Submit</button>
            </div>
        </form>
    </section>





@endsection
