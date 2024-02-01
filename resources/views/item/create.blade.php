@extends('dashboard.index');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body shadow bnt btn-dark">
                        <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h3 class="text-center">Create New Item</h3>
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input class="form-control" value="{{ old('name') }}" type="text" name="name"
                                        required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="price">Price</label>
                                    <input class="form-control" value="{{ old('price') }}" type="text" name="price"
                                        required>
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="category_id">Choose Category</label>
                                    <select class="form-control @error('category_id') is-invalid
                                    @enderror" name="category_id" id="category_id" aria-label="Default select example">
                                        <option selected>Open this select category</option>
                                        @foreach ($categories as $category)
                                        {{ $category }}
                                            <option name="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="expire_date">Expire Date</label>
                                    <input class="form-control" value="{{ old('expire_date') }}" type="date" name="expire_date"
                                        required>
                                    @error('expire_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="image">Image</label>
                                    <input class="form-control" value="{{ old('image') }}" type="file" name="image"
                                        required>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-button mt-3">
                                    <a href="{{ route('item.index') }}" class="btn btn-primary">Cancel</a>
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
