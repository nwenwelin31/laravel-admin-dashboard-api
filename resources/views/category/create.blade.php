@extends('dashboard.index');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body shadow bnt btn-dark">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="form-body">
                                <h3 class="text-center">Create New Category</h3>
                                <div class="col-md-12">
                                    <label for="name">Category Name</label>
                                    <input class="form-control" value="{{ old('name') }}" type="text" name="name"
                                        required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-button mt-3">
                                    <a href="{{ route('category.index') }}" class="btn btn-primary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
