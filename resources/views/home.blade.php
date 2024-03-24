

@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container-fluid px-5">
    <div class="row">
        <div class="col-md-6 mt-5">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5>Categories <span class="badge badge-info">{{$ahmed->count()}}</span></h5>
                  <a href="{{route('categories.create')}}" class="btn btn-success">Create New Category</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-primary">{{session('success')}}</div>
                    @endif
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">ID</th>
                            <th scope="col">{{__('language.TITLE')}}</th>
                            <th scope="col">Description_en</th>
                            <th scope="col">Parent_id</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Opearation</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($ahmed->count()>0)
                            @foreach ($ahmed as $item)
                          <tr>
                            <td scope="row">
                                <img alt="no-image-uploaded" src="{{asset('categories/image/'.$item->cate_image)}}" style="width: 70px; height: 70px">

                            </td>
                            <td scope="row">{{$item->id}}</td>
                            <td scope="row">{{$item->title}}</td>
                            <td scope="row">{{$item->description}}</td>
                            <td scope="row">{{$item->parent_id}}</td>
                            <td scope="row">{{$item->created_at}}</td>
                            <td scope="row" class="d-flex">
                                <a href="{{route('categories.show',$item->id)}}"  class="btn btn-success mr-1">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{route('categories.edit',$item->id)}}"  class="btn btn-info mr-1">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <a href="{{route('categories.delete',$item->id)}}"  class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>

                          </tr>
                          @endforeach
                          @else
                          <div class="alert alert-danger">No Data Yet..!</div>
                          @endif
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
        </div>


        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-header">
                  Products <span class="badge badge-info">{{$mohamed->count()}}</span>
                </div>
                <div class="card-body">
                    @if ($mohamed->count()>0)
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title_en</th>
                            <th scope="col">Description_en</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantiy</th>
                            <th scope="col">created_at</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($mohamed as $item)
                          <tr>
                            <td scope="row">{{$item->id}}</td>
                            <td scope="row">{{$item->title_en}}</td>
                            <td scope="row">{{$item->description_en}}</td>
                            <td scope="row">{{$item->price}}</td>
                            <td scope="row">{{$item->quantity}}</td>
                            <td scope="row">{{$item->created_at}}</td>

                          </tr>
                          @endforeach
                          @else
                          <div class="alert alert-danger">No Data Yet..!</div>
                          @endif
                        </tbody>
                      </table>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
