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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
   
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="p-2 d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Add CMS Pages</h3>
                            <a href="{{ route('admin.cmspages') }}" class="btn btn-warning ">Back</a>
                        </div>
                        <hr>

                        <form name="cmsForm" id="cmsForm"
                            @if (empty($cmsPage['id'])) action="{{ route('admin-addedit-cms-page') }}"
                            @else
                        action="{{ route('admin-addedit-cms-page', ['id' => $cmsPage['id']]) }}" @endif
                            method="post">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Ttitle</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Page Title"
                                        @if (!empty($cmsPage['title'])) value="{{ $cmsPage->title }}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="url">Url*</label>
                                    <input type="text" class="form-control" name="url" id="url"
                                        placeholder="Enter Page Url"
                                        @if (!empty($cmsPage['url'])) value="{{ $cmsPage->url }}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description">
                                        @if (!empty($cmsPage['description']))
{{ $cmsPage['description'] }}
@endif
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta_title">meta_title*</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                                        placeholder="Enter Page meta_title"
                                        @if (!empty($cmsPage['meta_title'])) value="{{ $cmsPage->meta_title }}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">meta_description *</label>
                                    <input type="text" class="form-control" name="meta_description" id="meta_description"
                                        placeholder="Enter Page meta_description"
                                        @if (!empty($cmsPage['meta_description'])) value="{{ $cmsPage->meta_description }}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">meta_keywords*</label>
                                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords"
                                        placeholder="Enter Page meta_keywords"
                                        @if (!empty($cmsPage['meta_keywords'])) value="{{ $cmsPage->meta_keywords }}" @endif>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="sub" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
