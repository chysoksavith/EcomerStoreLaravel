@extends('admin.layouts.layout')
@section('scritps')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
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
                                @if ($pageModule['edit_access'] == 1 || $pageModule['full_access'] == 1)
                                    <a href="{{ route('admin-addedit-cms-page') }}" class=" btn btn-primary">Create Cms
                                        Pages</a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="card-header ">
                            <div class="p-2">
                                @include('_message')
                            </div>

                            <!-- /.card-header -->
                            <table id="cmsTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Ttile</th>
                                        <th>Url</th>
                                        <th>Create on</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($CmsPage as $page)
                                        <tr>
                                            <td>{{ $page->id ?? 'N/A' }}</td>
                                            <td>{{ $page->title ?? 'N/A' }}</td>
                                            <td>{{ $page->description ?? 'N/A' }}</td>
                                            <td>
                                                @if (!empty($page->created_at))
                                                    {{ $page->created_at->format('Y-m-d') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pageModule['edit_access'] == 1 || $pageModule['full_access'] == 1)
                                                    <a class="updateCmsPageStatus" id="page-{{ $page['id'] }}"
                                                        page_id="{{ $page['id'] }}" href="javascript:void(0)">
                                                        @if ($page['status'] == 1)
                                                            <i class="fas fa-toggle-on" status="Active"></i>
                                                        @else
                                                            <i class="fas fa-toggle-off" style="color: grey"
                                                                status="Inactive"></i>
                                                        @endif
                                                    </a>
                                                @endif
                                            </td>
                                            <td class=" d-flex justify-content-around align-items-center">
                                                @if ($pageModule['edit_access'] == 1 || $pageModule['full_access'] == 1)
                                                    <a href="{{ url('admin/add-edit-cms-pages/' . $page->id) }}"><i
                                                            class="fas fa-edit" style="font-size: #3fed3"></i></a>
                                                @endif
                                                @if ($pageModule['full_access'] == 1)
                                                    <a class="confirmDelete" name="Cms Page" title="Delete Cms Page"
                                                        href="javascript:void(0)" record="cms-pages"
                                                        recordid="{{ $page->id }}"><i class="fas fa-trash"
                                                            style="font-size: red"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
