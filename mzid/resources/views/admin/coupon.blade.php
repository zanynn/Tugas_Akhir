@extends('admin.layouts.master')

@section('title', 'Data Kupon | MZ.ID')

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title mb-0">Data Kupon</h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Kupon</a>
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="users-list-wrapper">
    <div class="users-list-table">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <!-- datatable start -->
                    <div class="table-responsive">
                        <!-- alert -->
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible mb-2 text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{session('success')}}
                        </div>
                        @elseif(session('danger'))
                        <div class="alert alert-danger alert-dismissible mb-2 text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{session('danger')}}
                        </div>
                        @endif
                        <!--end alert -->
                        <table class="table">
                            <thead>
                                <tr style="text-align: center; vertical-align: middle;">
                                    <th>No</th>
                                    <th>Kode Kupon</th>
                                    <th>Jumlah Potongan</th>
                                    <th>Jenis Potongan</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach($coupons as $coupon)
                                <tr style="text-align: center; vertical-align: middle;">
                                    <td>{{$i++}}</td>
                                    <td>{{$coupon->coupon_code}}</td>
                                    <td>{{$coupon->amount}} %</td>
                                    <td>{{$coupon->amount_type}}</td>
                                    <td>{{$coupon->expiry_date}}</td>
                                    <td>
                                        {{$coupon->status==1?'Aktif':'Nonaktif'}}
                                    </td>
                                    <td>
                                        <a href="/admin/coupon/edit/{{$coupon->id}}" class="badge badge-warning">Edit</a>
                                        <a href="#" class="badge badge-danger delete" coupon-id="{{$coupon->id}}" coupon-code="{{$coupon->coupon_code}}">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- datatable ends -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
<script>
    $('.delete').click(function() {
        var coupon_id = $(this).attr('coupon-id');
        var coupon_code = $(this).attr('coupon-code');
        swal({
                title: "Apakah anda yakin?",
                text: "Menghapus pada data kupon " + coupon_code + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/coupon/delete/" + coupon_id;
                }
            });
    });
</script>
@endsection