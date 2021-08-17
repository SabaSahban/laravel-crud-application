@extends('products.layout')
@section('content')

    <div class="col-xs-12 col-sm-12 col-md-12">
        <br><a class="btn btn-secondary" href="{{ route('property.index') }}"> Home</a><br><br>
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

    <form action="{{ route('property.store') }}" method="POST">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency_name:</strong>
                <select class="form-control" name="currency_id" required="required">
                    @foreach($currencies as $currency)
                        <option value={{$currency->id}}>{{$currency->currency_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                <input type="text" name="name" class="form-control" placeholder="currency_name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>show_name:</strong>
                <input type="text" name="show_name" class="form-control" placeholder="show_name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>explorer:</strong>
                <input type="text" name="explorer" class="form-control" placeholder="explorer">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>show_order:</strong>
                <input type="number" name="show_order" class="form-control" placeholder="show_order">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>deposit:</strong>
                <input type="number" step="0.01" name="deposit" class="form-control" placeholder="deposit">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>withdraw:</strong>
                <input type="number" step=0.01 name="withdraw" class="form-control" placeholder="withdraw">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>has_tag:</strong>
                <select class="form-control" name="has_tag" required="required">
                    <option selected = 'selected' value=0>false</option>
                    <option value=1>true</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>withdraw_min:</strong>
                <input type="number" step="0.01" name="withdraw_min" class="form-control" placeholder="withdraw_min">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>withdraw_fee:</strong>
                <input type="number" step="0.01" name="withdraw_fee" class="form-control" placeholder="withdraw_fee">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>deposit_min:</strong>
                <input type="number" step="0.01" name="deposit_min" class="form-control" placeholder="deposit_min">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </form>
@endsection

