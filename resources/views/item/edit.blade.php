@extends('dashboard.index');
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body shadow bnt btn-dark">
                        <form action="{{ route('item.update',$item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" value="{{ $item->name }}" type="text" name="name"
                                        required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="price">Price</label>
                                    <input class="form-control @error('price') is-invalid @enderror" value="{{ $item->price }}" type="text" name="price"
                                        required>
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="category_id">Choose Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" aria-label="Default select example">
                                        <option selected>Open this select category</option>
                                        @foreach ($categories as $category)
                                        {{ $category }}
                                            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="expire_date">Expire Date</label>
                                    <input class="form-control @error('expire_date') is-invalid @enderror" value="{{ $item->expire_date }}" type="text" name="expire_date"
                                        required>
                                    @error('expire_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="image">Image</label><br>
                                    <img src="{{ asset('/storage/gallery/' . $item->image) }}" style="width: 9ex"/>
                                    <input class="form-control @error('image') is-invalid @enderror" value="{{ $item->image }}" type="file" name="image"
                                        required>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-button mt-3">
                                    <a href="{{ route('item.index') }}" class="btn btn-primary">Cancel</a>
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
