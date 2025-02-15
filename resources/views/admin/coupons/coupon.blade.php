@extends('admin.layouts.layout')
@section('scritps')
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>coupons</h1>
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
                                @if ($couponsModule['edit_access'] == 1 || $couponsModule['full_access'] == 1)
                                    <a href="{{ url('admin/add-edit-coupon') }}" class=" btn btn-primary">Create
                                        coupons</a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="card-header ">
                            <div class="p-2">
                                @include('_message')
                            </div>

                            <table id="couponTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Code</th>
                                        <th>Coupon Type</th>
                                        <th>Amount</th>
                                        <th>Expiry Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>{{ optional($coupon)->id ?? 'N/A' }}</td>
                                            <td>{{ optional($coupon)->coupon_code ?? 'N/A' }}</td>
                                            <td>{{ optional($coupon)->coupon_type ?? 'N/A' }}</td>
                                            <td>
                                                {{ optional($coupon)->amount ?? 'N/A' }}
                                                @if (optional($coupon)->amount_type === 'Percentage')
                                                    %
                                                @else
                                                    Dollar
                                                @endif
                                            </td>
                                            <td>
                                                {{ date('F j, Y, g:i a', strtotime($coupon->expiry_date)) }}
                                            </td>
                                            <td>
                                                @if ($couponsModule['edit_access'] == 1 || $couponsModule['full_access'] == 1)
                                                    <a class="updatecouponStatus" id="coupon-{{ $coupon['id'] }}"
                                                        coupon_id="{{ $coupon['id'] }}" href="javascript:void(0)">
                                                        @if ($coupon['status'] == 1)
                                                            <i class="fas fa-toggle-on" status="Active"></i>
                                                        @else
                                                            <i class="fas fa-toggle-off" style="color: grey"
                                                                status="Inactive"></i>
                                                        @endif
                                                    </a>
                                                @endif
                                            </td>
                                            <td class=" d-flex justify-content-around align-items-center">
                                                @if ($couponsModule['edit_access'] == 1 || $couponsModule['full_access'] == 1)
                                                    <a href="{{ url('admin/add-edit-coupon/' . $coupon->id) }}"><i
                                                            class="fas fa-edit" style="font-size: #3fed3"></i></a>
                                                @endif
                                                @if ($couponsModule['full_access'] == 1)
                                                    <a class="confirmDelete" name="coupon" title="Delete coupon"
                                                        href="javascript:void(0)" record="coupon"
                                                        recordid="{{ $coupon->id }}"><i class="fas fa-trash"
                                                            style="font-size: red"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

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
