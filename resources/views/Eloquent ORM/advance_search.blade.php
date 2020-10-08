@extends('Query Builder Exercise.layouts.blog')

@push('script')

@endpush

@push('style')
    <link rel="stylesheet" href="{{asset('assets/css/search.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog.css')}}">
@endpush

@section('title', 'User Search Advance')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h4><b>USERS</b> SEARCH</h4>
                <form action="{{route('search.advance.result')}}" method="get" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="id"
                               placeholder="User ID">
                        <input type="text" class="form-control" name="phonenumber"
                               placeholder="User Phone Number">
                        <input type="text" class="form-control" name="name"
                               placeholder="User Name">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary" style="width: 100px">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                    </div>
                </form>
            </div>
            <div class="col-lg-7">
                <h4><b>USERS</b> LIST</h4>
                <table class="table table-striped table-hover table-bordered" style="margin-top: 18px">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width: 40%">Name</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($adv_data))
                        @if($adv_data->isEmpty())
                            <p style="color: red">Sorry, there is no data that meets your requirements!</p>
                        @else
                            @foreach($adv_data as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->first_name . " " . $user->last_name}}</td>
                                    <td>{{$user->phones->number}}</td>
                                    {{dd($user->roles)}}
                                    <td>{{$user->roles}}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                    </tbody>
                </table>

                <div style="float:right;">{{$adv_data->appends(request()->except('page'))->links() }}</div>
            </div>

            <a href="{{route('search.index')}}" style="padding: 15px; color: gold">Move to Eloquent ORM Exercise</a>
        </div>
    </div>
@endsection
