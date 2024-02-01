@extends('dashboard.index');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body shadow  btn btn-dark">
                        <form action="{{ route('category.update', $category->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="col-md-12">
                                    <label for="name">Category Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?? $category->name }}" type="text" name="name" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-button mt-3">
                                    <a href="{{ route('category.index') }}" class="btn btn-primary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
