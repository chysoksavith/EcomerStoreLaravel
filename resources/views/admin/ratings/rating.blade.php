@extends('admin.layouts.layout')
@section('scritps')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ratings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <a href="">Categories Cms Pages</a>
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
                            <table id="ratingtable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Name</th>
                                        <th>User Email</th>
                                        <th>Review</th>
                                        <th>Rating</th>
                                        <th>Rating on</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ratings as $rating)
                                        <tr>
                                            <td>{{ optional($rating)->id ?? 'N/A' }}</td>
                                            <td>{{ optional($rating)->product->product_name ?? 'N/A' }}</td>
                                            <td>{{ optional($rating)->user->email ?? 'N/A' }}</td>
                                            <td>{{ optional($rating)->review ?? 'N/A' }}</td>
                                            <td>{{ optional($rating)->rating ?? 'N/A' }}</td>

                                            <td>
                                                @if (optional($rating->created_at)->format('Y-m-d'))
                                                    {{ optional($rating->created_at)->format('Y-m-d') }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <a class="updateRatingstatus" id="rating-{{ $rating['id'] }}"
                                                    rating_id="{{ $rating['id'] }}" href="javascript:void(0)">
                                                    @if ($rating['status'] == 1)
                                                        <i class="fas fa-toggle-on" status="Active"></i>
                                                    @else
                                                        <i class="fas fa-toggle-off" style="color: grey"
                                                            status="Inactive"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            <th>
                                                <a class="confirmDelete" name="rating" title="Delete rating"
                                                    href="javascript:void(0)" record="rating"
                                                    recordid="{{ $rating->id }}"><i class="fas fa-trash"
                                                        style="font-size: red"></i></a>
                                            </th>
                                        </tr>
                                        {{-- href="{{ url('admin/delete-cms-pages/' . $page->id) }}" --}}
                                    @empty
                                        <tr>
                                            <td colspan="5">No item record</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-header -->
                    </div>
                    <div>
                        {{ $ratings->links() }}
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
