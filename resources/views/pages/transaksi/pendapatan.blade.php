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
<div id="kt_app_content_container_both_scrolls" class="app-container container-fluid">
    <div class="row g-5 g-xl-10 mb-xl-10">
        <div class="table-responsive">
            <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded" id="kt_datatable_dom_positioning">
                <thead>
                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>No</th>
                        <th>Key</th>
                        <th>Tujuan Penghasilan</th>
                        <th>Penghasilan</th>
                        <th>Stok Terjual</th>
                        <th>Pengeluaran</th>
                        <th>Penghasilan Bersih</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>No</th>
                        <th>Key</th>
                        <th>Tujuan Penghasilan</th>
                        <th>Penghasilan</th>
                        <th>Stok Terjual</th>
                        <th>Pengeluaran</th>
                        <th>Penghasilan Bersih</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @forelse ($transaksi as $t)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $t->Key }}</td>
                        <td>Rp{{  number_format($t->tujuan_penghasilan, 2) }}</td>
                        <td>Rp{{  number_format($t->penghasilan, 2) }}</td>
                        <td>{{ $t->stok_terjual }}</td>
                        <td>Rp{{  number_format($t->pengeluaran, 2) }}</td>
                        <td>Rp{{  number_format($t->penghasilan_bersih, 2) }}</td>
                        <td>{{ $t->created_at->format('d-m-Y') }}</td>
                        <td >
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                    <i class="ki-duotone ki-dots-square fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button>
                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-50px card card-flush" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        @csrf
                                        <a href="/pages/transaksi/pendapatan/laporan/{{$t->Key}}" ><i class="ki-duotone ki-eye text-primary fs-2x" data-bs-toggle="tooltip" title="View"><i class="path1"></i><i class="path2"></i><i class="path3"></i></i></a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    {{-- <div class="menu-item px-3">
                                        @csrf
                                        <a href=""><i class="ki-duotone ki-printer text-success fs-2x" data-bs-toggle="tooltip" title="Print"><i class="path1"></i><i class="path2"></i><i class="path3"></i><i class="path4"></i><i class="path5"></i></i></a>
                                    </div> --}}
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 2-->
                                <!--end::Menu-->
                            </div>
                        </td>
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