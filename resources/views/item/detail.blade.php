@extends('dashboard.index');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body shadow btn btn-dark">
                        <table class="table">
                            <h3 class="text-center">Item Detail</h3>
                            <tr>
                                <td>Item Name</td>
                                <td>{{ $item->name }}</td>

                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{ $item->price }}</td>

                            </tr>
                            <tr>
                                <td>Category Type</td>
                                <td>{{ $item->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Expire Date</td>
                                <td>{{ $item->expire_date }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('item.index') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left ">
                                Back</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
