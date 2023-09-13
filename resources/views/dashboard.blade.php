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
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 4-->
               
            <!--paichart-->
            @include('dashboard.paichart')
            <!--paichart-->

            <!--end::Card widget 4-->
            <!--begin::Card widget 5-->
                        
            <!--goalchart-->
            @include('dashboard.goalchart')
            <!--goalchart-->

            <!--end::Card widget 5-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!--begin::Card widget 6-->
            
            <!--barchart-->
            @include('dashboard.populer')
            <!--barchart-->

            <!--end::Card widget 6-->
            <!--begin::Card widget 7-->
            
            <!--customerchart-->
            @include('dashboard.pengeluaranchart')
            <!--customerchart-->

            <!--end::Card widget 7-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->

        <!--linechart-->
        @include('dashboard.linechart')
        <!--linechart-->

        <!--end::Col-->
    </div>
    <!--end::Row-->
</div>

@endsection