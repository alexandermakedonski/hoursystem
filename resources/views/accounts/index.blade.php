@extends('app')

@section('styles')
    <link href={{ URL::to("assets/plugins/datatables/css/jquery.datatables.min.css") }} rel="stylesheet" type="text/css"/>
    <link href={{ URL::to("assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css") }} rel="stylesheet" type="text/css">
    <link href={{ URL::to("assets/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css") }} rel="stylesheet" type="text/css"/>
    <style>
        .table-responsive {
            overflow-x:visible;
        }
    </style>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <ol class="breadcrumb container">
            <li><a href={{ URL::to('/') }}>Начало</a></li>
            <li><a href="javascript:void(0);">Акаунти</a></li>
        </ol>
    </div>

    <div id="main-wrapper" class="container">
        <div class="users-table-ajax">

        </div>
        {{--@include('partials.userstable')--}}
        @include('partials.userregister')



    </div><!-- Main Wrapper -->

@endsection

@section('scripts')

    <script>
        var roles = JSON.parse('{!!json_encode($roles) !!}');

    </script>
    <script src={{ URL::to("assets/plugins/jquery-mockjax-master/jquery.mockjax.js") }}></script>
    <script src={{ URL::to("assets/plugins/moment/moment.js") }}></script>
    <script src={{ URL::to("assets/plugins/datatables/js/jquery.datatables.min.js") }}></script>
    <script src={{ URL::to("assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js") }}></script>
    <script src={{ URL::to("assets/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js") }}></script>
    <script src={{ URL::to("assets/plugins/jquery-date-dropdowns/jquery.date-dropdowns.min.js") }}></script>
    <script src="{{ URL::to('assets/plugins/plupload-2.1.7/js/plupload.full.min.js') }}"></script>
    <script src={{ URL::to("assets/js/userstable.js") }}></script>
    <script src={{ URL::to("assets/js/userregister.js") }}></script>

@endsection