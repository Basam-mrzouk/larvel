


@extends('layouts.app')
@section('content')
@include('includes.navbar')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 m-auto">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{__('language.TITLE')}}</th>
                        <th scope="col">Description_en</th>
                        <th scope="col">Parent_id</th>
                        <th scope="col">created_at</th>
                        <th scope="col">Opearation</th>
                      </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">{{$jony->id}}</td>
                    <td scope="row">{{$jony->title_en}}</td>
                    <td scope="row">{{$jony->description_en}}</td>
                    <td scope="row">{{$jony->parent_id}}</td>
                    <td scope="row">{{$jony->created_at}}</td>
                    <td scope="row">
                        <a href="{{route('home')}}" class="btn btn-success">
                            <i class="fa-solid fa-house"></i>
                        </a>
                    </td>

                  </tr>

                </tbody>
              </table>

        </div>
    </div>
</div>


@endsection
