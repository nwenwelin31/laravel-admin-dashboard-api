@extends('dashboard.index');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <h3 class="text-center">Category List</h3>
                                {{-- <div class="col-md-1 mb-3">
                                    <a href="{{ route('category.create') }}" class="btn btn-primary float-end"><i
                                            class="fa fa-plus-circle"></i></a>
                                </div> --}}
                                {{-- @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif --}}

                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (Session::has('delete'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        {{ session('delete') }}
                                    </div>
                                @endif
                                @if (Session::has('update'))
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        {{ session('update') }}
                                    </div>
                                @endif
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apicategories as $category)
                                    <tr>
                                        {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                        <td>{{ $category['name'] }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('category.show', $category->id) }}"
                                                class="btn btn-outline-primary">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="post"
                                                class="d-inline-block">
                                                @method('delete')
                                                @csrf
                                                <button type="" class="btn btn-outline-danger">
                                                    {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
