@extends('products.layout')
@section('content')

    <div class="col-xs-12 col-sm-12 col-md-12">
        <br><a class="btn btn-secondary" href="{{ route('currency.show') }}">Back</a><br>
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
    <form action="{{ route('currency.store') }}" method="POST">
        @csrf
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency_name:</strong>
                <input type="text" name="currency_name" class="form-control" placeholder="currency_name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

