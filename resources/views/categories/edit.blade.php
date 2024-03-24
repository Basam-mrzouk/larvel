@extends('layouts.app')
@section('content')
@include('includes.navbar')

<h2 class="text-center">Create New Category</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">



            <form action="{{route('categories.update')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="old_id" value="{{$categories->id}}">

                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" name="cate_image">
                  </div>

                  @error('cate_image')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                <div class="form-group">
                  <label for="exampleInputEmail1">ID</label>
                  <input type="text" class="form-control" name="id" value="{{$categories->id}}">
                </div>

                @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label for="exampleInputEmail1">Title_en</label>
                    <input type="text" class="form-control" name="title_en" value="{{$categories->title_en}}">
                  </div>

                  @error('title_en')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror


                  <div class="form-group">
                    <label for="exampleInputEmail1">Title_ar</label>
                    <input type="text" class="form-control" name="title_ar" value="{{$categories->title_ar}}">
                  </div>


                  @error('title_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description_en</label>
                    <input type="text" class="form-control" name="description_en" value="{{$categories->description_en}}">
                  </div>


                  @error('description_en')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="form-group">
                    <label for="exampleInputEmail1">Description_ar</label>
                    <input type="text" class="form-control" name="description_ar" value="{{$categories->description_ar}}">
                  </div>

                  @error('description_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror


                  <div class="form-group">
                    <label for="exampleInputEmail1">Parent_id</label>

                    <select name="parent_id" class="form-control">
                        <option selected value="{{$categories->id}}">{{$categories->id}}-{{$categories->title_en}}</option>
                        <option value="0">Main Category</option>
                        @foreach($allproduct as $item)
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
