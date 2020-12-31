@extends('admin.layouts.master')

@section('title', 'Data Pembelian | MZ.ID')

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title mb-0">Data Pembelian</h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pembelian</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Edit</a>
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="users-list-table">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <!-- datatable start -->
                <div class="table-responsive">
                    <table id="users-list-datatable" class="table">
                        <thead class="border-bottom border-dark">
                            <tr style="text-align: center; vertical-align: middle;">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($orders as $order)
                            <tr style="text-align: center; vertical-align: middle;">
                                <td>{{$i++}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->user_email}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->grand_total}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>
                                    @if($order->order_status == 'paid')
                                    <span class="badge badge-success badge-pill">PAID</span>
                                    @elseif($order->order_status == 'success')
                                    <span class="badge badge-success badge-pill">SUCCESS</span>
                                    @elseif($order->order_status == 'unpaid')
                                    <span class="badge badge-danger badge-pill">UNPAID</span>
                                    @endif
                                </td>
                                <td>

                                    <a href="/admin/order/{{$order->id}}" class="invoice-action-view mr-1">
                                        <i class="icon-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div align="right">
                    <a href="{{route('order-pdf')}}" class="btn btn-primary" target="_blank">CETAK PDF <i class="fa fa-print fa-xs" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endsection