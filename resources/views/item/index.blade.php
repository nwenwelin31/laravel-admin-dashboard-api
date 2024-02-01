@extends('dashboard.index');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <h3 class="text-center">Item List</h3>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category Type</th>
                                    <th>Expire Date</th>
                                    <th>Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->category->name}}</td>
                                        <td>{{ $item->expire_date }}</td>
                                        <td><img src="{{ asset('/storage/gallery/' . $item->image) }}" style="width: 9ex"/></td>
                                        <td>
                                            <a href="{{ route('item.edit',$item->id) }}" class="btn btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('item.show',$item->id) }}" class="btn btn-outline-primary">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <form action="{{ route('item.destroy',$item->id) }}" method="post"
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
