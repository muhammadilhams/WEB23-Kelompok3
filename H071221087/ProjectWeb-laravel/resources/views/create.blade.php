@extends('layouts\navbar')

@section('content')
    <div class="row" style="margin-right : 120px">
        <div style="margin-left: 20%;" class="col-sm-8">
            <div class="card p-4 mt-5">
                <form method="POST" action="/addbooks" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name :</label>
                        <input type="text" class="form-control" name="name" value="{{ old('nama') }}"
                            placeholder="Insert name">
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>

                    <!-- Roles -->
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Kategori :')" />
                        <div class="kategori" style="display:flex; ">
                            <div class="choice" style="padding-right: 40px ">
                                <input type="radio" name="kategori" value="seller"
                                    {{ old('role') == 'seller' ? 'checked' : '' }} required>
                                <label for="seller">Novel</label>
                            </div>

                            <div class="choice">
                                <input type="radio" name="kategori" value="buyer"
                                    {{ old('role') == 'buyer' ? 'checked' : '' }} required>
                                <label for="buyer">Self Improvement</label>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3 mt-3">
                        <label class="form-label">Price :</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}"
                            placeholder="Insert price">
                        @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Author :</label>
                        <input type="text" class="form-control" name="author" value="{{ old('author') }}"
                            placeholder="Insert author">
                        @if ($errors->has('author'))
                            <span class="text-danger">{{ $errors->first('author') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">publisher :</label>
                        <input type="text" class="form-control" name="publisher" value="{{ old('publisher') }}"
                            placeholder="Insert publisher">
                        @if ($errors->has('publisher'))
                            <span class="text-danger">{{ $errors->first('publisher') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Description :</label>
                        <textarea class="form-control" rows="4" name="description" placeholder="Insert description">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Stock :</label>
                        <input type="number" class="form-control" name="stok" value="{{ old('stok') }}"
                            placeholder="Insert stock">
                        @if ($errors->has('stok'))
                            <span class="text-danger">{{ $errors->first('stok') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Image :</label>
                        <input type="file" class="form-control" name="image" placeholder="Insert image">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <div>
                        <button style="background-color: #9BABB8; color:#EEE3CB;" type="submit" class="btn">Add
                            Books</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
