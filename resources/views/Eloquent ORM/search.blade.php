@extends('Query Builder Exercise.layouts.blog')

@push('script')
    <script type="text/javascript">

    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{asset('assets/css/search.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/blog.css')}}">
@endpush

@section('title', 'User Search')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h4><b>USERS</b> SEARCH</h4>
                <form action="{{route('search.result')}}" method="get" role="search">
                    @csrf
                    <div class="input-group">
                        <input id="id" type="text" class="form-control" name="id"
                               placeholder="User ID" autocomplete="off">
                        <input id="name" type="text" class="form-control" name="name"
                               placeholder="User Name" autocomplete="off">
                        <input id="class" type="text" class="form-control" name="class"
                               placeholder="User Class" autocomplete="off">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary" style="width: 100px">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="input-group-btn" style="margin-left: 10px">
                            <button type="submit" id="reset" class="btn btn-primary" style="width: 100px">
                                <i class="fas fa-undo-alt"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-7">
                <h4><b>USERS</b> LIST</h4>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width: 50%">Name</th>
                        <th>Class</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($data))
                        @if($data->isEmpty())
                            <p style="color: red">Sorry, there is no data that meets your requirements!</p>
                        @else
                            @foreach($data as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->class}}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endif
                    </tbody>
                </table>

                <div style="float:right;">{{ $data->appends(request()->except('page'))->links() }}</div>
            </div>
        </div>

        <a href="{{route('search.advance.index')}}" style="padding: 10px">Move to Eloquent ORM Advance Exercise</a>
    </div>

@endsection
