@extends('products.layout')
@section('content')

    <div class="col-xs-12 col-sm-12 col-md-12">
        <br><a class="btn btn-secondary" href="{{ route('currency.show') }}"> Back</a><br><br>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('currency.update',$currency->id ) }}" method="POST">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Currency_name:</strong>
                <input type="text" name="currency_name" class="form-control" placeholder="currency_name" value="{{$currency->currency_name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </form>


@endsection

