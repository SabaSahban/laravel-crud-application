@extends('products.layout')
@section('content')
    <br><a class="btn btn-secondary" href="{{ route('property.index') }}"> Home</a>
    <a class="btn btn-secondary" href="{{ route('currency.create') }}"> Add Currency</a><br><br>

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
            <th scope="col">action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($currencies as $currency)
            <tr>
                <td>{{ $currency->currency_name }}</td>
                <td>
                        @csrf
                        <a  class="btn btn-secondary"  href="{{route('currency.edit', $currency->id)}}">Edit</a>
                        <a  class="btn btn-secondary" href="{{route('currency.destroy', $currency->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $currencies->links() !!}

@endsection
