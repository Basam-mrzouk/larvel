@extends('layouts.app')
@section('content')
@include('includes.navbar')

<h2 class="text-center">Create New Category</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">


                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div> --}}
                {{-- @endif --}}
            <form action="{{route('categories.save')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" name="cate_image">
                  </div>

                  @error('cate_image')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">ID</label>
                  <input type="text" class="form-control" name="id">
                </div>

                @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label for="exampleInputEmail1">Title_en</label>
                    <input type="text" class="form-control" name="title_en">
                  </div>

                  @error('title_en')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror


                  <div class="form-group">
                    <label for="exampleInputEmail1">Title_ar</label>
                    <input type="text" class="form-control" name="title_ar">
                  </div>


                  @error('title_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description_en</label>
                    <input type="text" class="form-control" name="description_en">
                  </div>


                  @error('description_en')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description_ar</label>
                    <input type="text" class="form-control" name="description_ar">
                  </div>

                  @error('description_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror


                  <div class="form-group">
                    <label for="exampleInputEmail1">Parent_id</label>

                    <select name="parent_id" class="form-control">
                        <option value="0">Main Category</option>
                        @foreach($categories as $item)
                        <option value="{{$item->id}}" >{{$item->id}}-{{$item->title_en}}</option>
                        @endforeach
                    </select>

                    @error('parent_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                  </div>


                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </form>
        </div>
    </div>
</div>


@endsection
