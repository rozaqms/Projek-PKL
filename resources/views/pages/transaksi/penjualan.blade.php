@extends('layouts.main')

@section('page-title')
<div class="page-title d-flex flex-column gap-1 me-3 mb-2">
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
            <a href="/" class="text-gray-500">
                <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
            </a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700 fw-bold lh-1"> Pages </li>

        <li class="breadcrumb-item">
            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
        </li>

        <li class="breadcrumb-item text-gray-700 fw-bold lh-1"> Transaksi </li>

        <li class="breadcrumb-item">
            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
        </li>

        <li class="breadcrumb-item text-gray-700 fw-bold lh-1"> {{$title}} </li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
    <!--begin::Title-->
    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0"> {{$title}} </h1>
    <!--end::Title-->
</div>
<!--end::App-->
@endsection

@section('konten')
<div id="kt_app_content_container" class="app-container container-fluid">
    <div class="row g-5 g-xl-10 mb-xl-10">
        <div class="table-responsive">
            <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded" id="kt_datatable_dom_positioning">
                <thead>
                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Total Harga</th>
                        <th>Total Jumlah</th>
                        <th>Dibuat Pada</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Total Harga</th>
                        <th>Total Jumlah</th>
                        <th>Dibuat Pada</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($transaksi as $t)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $t->category }}</td>
                        <td>Rp{{  number_format($t->total_price, 2) }}</td>
                        <td>{{ $t->total_quantity }}</td>
                        <td>{{ $t->created_at->format('d-m-Y') }}</td>
                    </tr>
                    @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
