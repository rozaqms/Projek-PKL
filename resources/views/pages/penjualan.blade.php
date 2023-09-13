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
        <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 px-7">
                    <th>No</th>
                    <th>Item</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                    <th>Total Barang</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category => $items)
            @php
                $categoryTotal = 0;
            @endphp
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>
                        <input type="number" class="quantity-input form-control"
                               data-base-quantity="{{ $item->base_quantity }}"
                               data-price="{{ $item->price }}"
                               value="{{ $item->base_quantity }}"
                               min="0" max="{{ $item->base_quantity }}">
                    </td>
                    <td>Rp{{ number_format($item->price, 2) }}</td>
                    <td class="total">Rp0</td>
                    <td class="barangDikurangi">0</td>
                </tr>
                @empty
                        <div class="alert alert-danger">Data Post belum Tersedia.</div>
            @endforelse
            @empty
                        <div class="alert alert-danger">Data Post belum Tersedia.</div>
            @endforelse
            </tbody>
        </table>
        <div id="total-price">
            Total Harga: <span id="total-amount">Rp0</span>
        </div>
        <div class="d-flex flex-column-fluid flex-center">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <button id="save-button" class="btn btn-sm btn-success">Simpan</button>
        </div>
    </div>
</div>
@endsection
@push('scriptpenjualanM')
<script src="/assets/js/menujual.js"></script>
@endpush