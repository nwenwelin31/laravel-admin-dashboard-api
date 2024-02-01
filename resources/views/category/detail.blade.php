@extends('dashboard.index');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body shadow btn btn-dark">
                        <table class="table">
                            <thead>
                                <h3 class="text-center">Category Detail</h3>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        {{ $category->index+1 }}
                                    </td>
                                    <td>{{ $category->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left "> Back</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
