@extends('layouts.appAdmin')

@section('title')
    <?php const pageTitle = 'پنل مدیریت'; const pageIcon = ''; ?>
@endsection

@section('css')

@endsection

@section('js')

@endsection

@section('desktop')
    <div class="row">
        <div class="col-xlg-12 col-lg-12">
            <div class="panelGlass minH-240">
                <div class="panelGlassTitle h5 ma-0">
                    {{pageTitle}}
                </div>
                <div class="pa-25">
                    <div class="mb-20"></div>

                </div>
            </div>
        </div>
    </div>
@endsection
