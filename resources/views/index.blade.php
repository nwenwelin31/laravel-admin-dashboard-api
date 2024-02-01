@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center bg-light">
            <div class="col-md-12">
                <h2 class="text-center m-4">GIC Shopping</h2>
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            @foreach ($items as $item)
                                <div class="col-md-6 mb-3 d-flex justify-content-center">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top img-fluid"
                                            src="{{ asset('/storage/gallery/' . $item->image) }}"
                                            alt="" style="width: 350px; height: 200px;" />
                                        <div class="card-body">
                                            <p class="card-text">{{ $item->name }}</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="card-text">Price : {{ $item->price }}</p>
                                                </div>
                                                <div class="col-md-6 d-flex justify-content-end">
                                                    <a href="" class="btn btn-primary">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center">Total List</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Item1</td>
                                            <td>15000</td>
                                        </tr>
                                        <tr>
                                            <td>Item2</td>
                                            <td>15000</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td>30000</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
