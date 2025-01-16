@extends('layout.mainLayout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-8">
            <div class="row justify-content-center">
                <!-- Total Data Kebun -->
                <div class="col-lg-4 col-sm-6">
                    <div class="stats-box card bg-white border-0 rounded-10 mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                                <div class="flex-grow-1 me-3">
                                    <h3 class="body-font fw-bold fs-3 mb-2">{{ $totalKebun }}</h3>
                                    <span>Total Kebun</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="icon transition">
                                        <i class="flaticon-landscape"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Data Timbangan -->
                <div class="col-lg-4 col-sm-6">
                    <div class="stats-box card bg-white border-0 rounded-10 mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                                <div class="flex-grow-1 me-3">
                                    <h3 class="body-font fw-bold fs-3 mb-2">{{ $totalTimbangan }}</h3>
                                    <span>Total Timbangan</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="icon transition">
                                        <i class="flaticon-scale"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>

@endsection
