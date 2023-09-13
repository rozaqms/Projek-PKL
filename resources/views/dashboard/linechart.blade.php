<div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
    <!--begin::Chart widget 3-->
    <div class="card card-flush overflow-hidden h-md-100">
        <!--begin::Header-->
        <div class="card-header py-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-dark">Penghasilan Bulan Ini</span>
                <span class="text-gray-400 mt-1 fw-semibold fs-6">Pada Semua Kategori</span>
            </h3>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <ul class="nav" id="kt_chart_widget_8_tabs">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-bs-toggle="tab" id="" href="">Tahun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-bs-toggle="tab" id="" href="">Bulan</a>
                    </li>
                </ul>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <!--begin::Card body-->
        <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
            <!--begin::Statistics-->
            <div class="px-9 mb-5">
                <!--begin::Statistics-->
                <div class="d-flex mb-2">
                    <span class="fs-4 fw-semibold text-gray-400 me-1">Rp</span>
                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2" data-kt-countup="true" data-kt-countup-value="{{number_format($penjualanTerjual,2)}}">0</span>
                </div>
                <!--end::Statistics-->
                <!--begin::Description-->
                <span class="fs-6 fw-semibold text-gray-400">Rp<span data-kt-countup="true" data-kt-countup-value="{{ number_format(max($targetPenjualan-$penjualanTerjual, 0), 2) }}"></span> Lagi Menuju Target</span>
                <!--end::Description-->
            </div>
            <!--end::Statistics-->
            <!--begin::Chart-->
            <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
            <!--end::Chart-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Chart widget 3-->
</div>

    @push('kt_charts_penjualan')
    <script>
            var weeklyExpensesPeng = @json($weeklyExpensesPenghasilan);
        </script>
    @endpush