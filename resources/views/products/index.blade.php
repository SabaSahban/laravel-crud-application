@extends('products.layout')
@section('content')

    <br><a class="btn btn-secondary" href="{{ route('property.create') }}"> Create Property</a>
    <a class="btn btn-secondary" href="{{ route('currency.show') }}"> Currencies</a><br><br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

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
                        <a style="color: rgba(176,246,232,0.65)" href="{{route('property.edit', $property->id)}}">Edit</a>
                        <a  style="color: rgba(176,246,232,0.65)" href="{{route('property.destroy', $property->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $properties->links() !!}

@endsection
