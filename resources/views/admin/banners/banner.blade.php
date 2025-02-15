@extends('admin.layouts.layout')
@section('scritps')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Banners</h1>
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
                                <a href="{{ route('admin.add.edit.banner') }}" class=" btn btn-primary">Create
                                    banners</a>
                            </div>
                        </div>
                        <hr>
                        <div class="card-header ">
                            <div class="p-2">
                                @include('_message')
                            </div>
                            <table id="bannerTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Type</th>
                                        <th>Link</th>
                                        <th>Title</th>
                                        <th>Create on</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{ optional($banner)->id ?? 'N/A' }}</td>
                                            <td>
                                                <a target="_blank"
                                                    href="{{ url('front/images/banner/' . $banner['image']) }}">
                                                    <img src="{{ asset('front/images/banner/' . $banner['image']) }}"
                                                        alt="imgBanner" style="width: 130px">
                                                </a>
                                            </td>

                                            <td>{{ optional($banner)->type ?? 'N/A' }}</td>
                                            <td>{{ optional($banner)->link ?? 'N/A' }}</td>
                                            <td>{{ optional($banner)->title ?? 'N/A' }}</td>
                                            <td>
                                                @if (optional($banner->created_at)->format('Y-m-d'))
                                                    {{ optional($banner->created_at)->format('Y-m-d') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <a class="updatebannerStatus" id="banner-{{ $banner['id'] }}"
                                                    banner_id="{{ $banner['id'] }}" href="javascript:void(0)">
                                                    @if ($banner['status'] == 1)
                                                        <i class="fas fa-toggle-on" status="Active"></i>
                                                    @else
                                                        <i class="fas fa-toggle-off" style="color: grey"
                                                            status="Inactive"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            <td class=" d-flex justify-content-around align-items-center">
                                                <a href="{{ url('admin/add-edit-banner/' . $banner->id) }}"><i
                                                        class="fas fa-edit" style="font-size: #3fed3"></i></a>
                                                <a class="confirmDelete" name="banner" title="Delete banner"
                                                    href="javascript:void(0)" record="banner"
                                                    recordid="{{ $banner->id }}"><i class="fas fa-trash"
                                                        style="font-size: red"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                    {{-- href="{{ url('admin/delete-cms-pages/' . $page->id) }}" --}}

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-header -->
                    </div>

                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
