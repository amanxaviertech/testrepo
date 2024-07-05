<!-- resources/views/admin/page-builder.blade.php -->
@extends('layouts.adminlayout')
@section('title', 'Admin Dashboard')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <div class="row p-4 d-flex justify-content-center align-items-center">  
                    <div class="col text-center">
                        <h3 class="text-dark">Design Your Page without any Code from start...</h3><br>
                        <a href="{{ route('pageBuilder.create')}}" class="btn btn-lg  btn-dark">Design Your Page with grapeJs Editor</a>
                    </div>
                </div>
                <div class="row p-4 d-flex justify-content-center align-items-center">  
                    <div class="col text-center">
                        <!-- <h3 class="text-dark">Design Your Page without any Code from start...</h3><br> -->
                        <a href="{{ route('editor.index')}}" class="btn btn-lg  btn-dark">Open Our Customized Editor</a>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
