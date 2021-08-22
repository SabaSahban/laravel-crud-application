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

    <form action="{{ route('property.update',$property->id ) }}" method="POST">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency_name:</strong>
                <select class="form-control" name="currency_id" required="required">
                    @foreach($currencies as $currency)
                        @if($currency->currency_name==$property->currency->currency_name)
                            <option selected="selected"
                                    value={{$property->currency->id}}>{{$property->currency->currency_name }}</option>
                        @else
                            <option value={{$currency->id}}>{{$currency->currency_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>currency_name:</strong>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{$property->name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>show_name:</strong>
                <input type="text" name="show_name" class="form-control" placeholder="show_name"
                       value="{{$property->show_name}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>explorer:</strong>
                <input type="text" name="explorer" class="form-control" placeholder="explorer"
                       value={{$property->explorer}}>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>show_order:</strong>
                <input type="number" name="show_order" class="form-control" placeholder="show_order"
                       value="{{$property->show_order}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>deposit:</strong>
                <input type="number" step="0.01" name="deposit" class="form-control" placeholder="deposit"
                       value="{{$property->deposit}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>withdraw:</strong>
                <input type="number" step="0.01" name="withdraw" class="form-control" placeholder="withdraw"
                       value="{{$property->withdraw}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>has_tag:</strong>
                <select class="form-control" name="has_tag" required="required">
                    @if(!$property->has_tag)
                        <option selected="selected" value=0>false</option>
                        <option value=1>true</option>
                    @else
                        <option selected="selected" value=1>true</option>
                        <option value=0>false</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>withdraw_min:</strong>
                <input type="number" step="0.01" name="withdraw_min" class="form-control" placeholder="withdraw_min"
                       value="{{$property->withdraw_min}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>withdraw_fee:</strong>
                <input type="number" step="0.01" name="withdraw_fee" class="form-control" placeholder="withdraw_fee"
                       value="{{$property->withdraw_fee}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>deposit_min:</strong>
                <input type="number" step="0.01" name="deposit_min" class="form-control" placeholder="deposit_min"
                       value="{{$property->deposit_min}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </form>
@endsection

