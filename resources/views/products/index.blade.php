@extends('products.layout')
@section('content')
    @if(isset($properties))
        <br>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <br>
            <a class="btn btn-secondary" href="{{route('property.index')}}">Back</a>
            <a class="btn btn-secondary" href="{{ route('property.create') }}"> Create Property</a>
            <a class="btn btn-secondary" href="{{ route('currency.show') }}"> Currencies</a><br><br>
        </div>
        <form action="{{ route('property.search') }}" method="GET">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group btn-group">
                    <input type="text" name="currency_name" class="form-control" placeholder="search by: currency_name"
                           value="{{old('currency_name')}}"><br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group btn-group">
                    <input type="text" name="show_name" class="form-control" placeholder="search by: show_name"
                           value="{{old('show_name')}}"><br>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label>has_tag</label>
                    <select class="form-control" name="has_tag">
                            <option value=0>false</option>
                            <option value=1>true</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-secondary">Search</button>
                <br><br>
            </div>
        </form>
        <form action="{{route('property.sort')}}" method="GET">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <select class="form-control" name="sorts">
                        <option value="" default selected>sort by: </option>
                        <option value="withdraw">withdraw</option>
                        <option value="deposit">deposit</option>
                        <option value="show_order">show_order</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-secondary">Filter</button>
                <br><br>
            </div>
        </form>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">currency_name</th>
                    <th scope="col">name</th>
                    <th scope="col">show_name</th>
                    <th scope="col">explorer</th>
                    <th scope="col">show_order</th>
                    <th scope="col">deposit</th>
                    <th scope="col">withdraw</th>
                    <th scope="col">has_tag</th>
                    <th scope="col">withdraw_min</th>
                    <th scope="col">withdraw_fee</th>
                    <th scope="col">deposit_min</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($properties)>0)
                    @foreach ($properties as $property)
                        <tr>
                            <td>{{ $property->currency->currency_name }}</td>
                            <td>{{ $property->name }}</td>
                            <td>{{ $property->show_name }}</td>
                            <td>{{$property->explorer}}</td>
                            <td>{{$property->show_order}}</td>
                            <td>{{$property->deposit}}</td>
                            <td>{{$property->withdraw}}</td>
                            <td>{{$property->has_tag}}</td>
                            <td>{{$property->withdraw_min}}</td>
                            <td>{{$property->withdraw_fee}}</td>
                            <td>{{$property->deposit_min}}</td>
                            <td>
                                @csrf
                                <a style="color: rgba(176,246,232,0.65)"
                                   href="{{route('property.edit', $property->id)}}">Edit</a>
                                <a style="color: rgba(176,246,232,0.65)"
                                   href="{{route('property.destroy', $property->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No results found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="pagination-block">
            {{$properties->appends(request()->input())}}
        </div>
    @endif
@endsection
