@extends('layouts.landing')

@section('title')
    <?php const pageTitle = 'قوانین و شرایط'; const pageIcon = 'flaticon-tuition-and-fees'; ?>
@endsection

@section('css')

@endsection

@section('js')

@endsection
@if($userDevice == 'desktop')
@section('desktop')
    <div class="row">
        <div class="col-xlg-12 col-lg-12">
            <div class="panelGlass minH-240">
                <div class="panelGlassTitle h5 ma-0">
                    {{pageTitle}}
                </div>
            </div>
        </div>
    </div>
@endsection
@else
@section('jsmobile')

@endsection

@section('mobile')
    <div class="fixedTitle panelGlassTitle h5 ma-0">
        {{pageTitle}}
    </div>
    <div class="panelGlassContent mb-10">
        <div class="table-responsive noswipe">
        </div>
    </div>
@endsection
@endif


