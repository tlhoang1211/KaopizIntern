@extends('query_builder.layouts.blog')

@push('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });
    </script>
    @if(session('toast_error'))
        <script>
            $(document).ready(function () {
                toastr["error"]("Have fun storming the castle!")

                toastr.options = {
                    "closeButton": false,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            })
        </script>
    @endif

    @if(session('add_success'))
        <script>
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": false,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                toastr["success"]("New post was added successfully!")
            })
        </script>
    @endif

    @if(session('update_success'))
        <script>
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                toastr["success"]("Update Successful!")
            })
        </script>
    @endif

    @if(session('delete_success'))
        <script>
            $(document).ready(function () {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                toastr["success"]("Delete Successful!")
            })
        </script>
    @endif
@endpush

@push('style')
    <link rel="stylesheet" href="{{asset('assets/css/blog.css')}}">
    <link rel="stylesheet prefetch"
          href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
@endpush

@section('title', 'Posts List')

@section('content')
    <div class="table-title">
        <div class="row">
            <div class="col-sm-10"><h2><b>POSTS</b> LIST</h2></div>
            <div class="col-sm-2">
                {{--                                                <div class="search-box">--}}
                {{--                                                    <i class="material-icons">&#xE8B6;</i>--}}
                {{--                                                    <input type="text" class="form-control" placeholder="Customer&hellip;">--}}
                {{--                                                </div>--}}
                <button type="button" class="create_btn"
                        title="new"
                        data-toggle="modal"
                        data-target="#create">+
                </button>
                <!-- Modal -->
                <div class="modal fade" id="create" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Add new post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('post_store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id" class="col-form-label">Title:</label>
                                        <input type="text" class="form-control" id="title"
                                               spellcheck="false" name="title">
                                        @if ($errors->has('title'))
                                            <label class="alert-warning">{{$errors->first('title')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Content:</label>
                                        <textarea class="form-control" id="message-text" rows="10"
                                                  spellcheck="false" name="content"></textarea>
                                        @if ($errors->has('content'))
                                            <label class="alert-warning">{{$errors->first('content')}}</label>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button class="btn btn-primary" id="button"
                                                type="submit">Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th style="width: 10%">Title</th>
            <th style="width: 50%">Content</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr class="tr">
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td style="text-align: left">{!! Str::words($post->content, $words = 40, $end = '...') !!}</td>
                <td>{{date("d/m/Y", strtotime($post->created_at))}}</td>
                <td>{{date("d/m/Y", strtotime($post->updated_at))}}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button style="all: unset; color: #03A9F4; padding-right: 10px" type="button" class="btn"
                            title="view"
                            data-toggle="modal"
                            data-target="#view-{{$post->id}}"><i
                            class="material-icons">&#xE417;</i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="view-{{$post->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">View post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form spellcheck="false">
                                        <div class="form-group">
                                            <label for="id" class="col-form-label">ID:</label>
                                            <input type="text" class="form-control" id="id" readonly
                                                   value="{{$post->id}}"
                                                   spellcheck="false">
                                        </div>
                                        <div class="form-group">
                                            <label for="id" class="col-form-label">Title:</label>
                                            <input type="text" class="form-control" id="title" readonly
                                                   value="{{$post->title}}"
                                                   spellcheck="false">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Content:</label>
                                            <textarea class="form-control" id="message-text" readonly rows="10"
                                                      placeholder="{{$post->content}}"
                                                      spellcheck="false"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Comment:</label>
                                            <textarea class="form-control" id="message-text" readonly rows="10"
                                                      placeholder="@foreach($comments as $cmt)
                                                      @if($post->id === $cmt->post_id){!! '&#10;- ' . $cmt->content_comment !!} @endif
                                                      @endforeach"
                                                      spellcheck="false"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="id" class="col-form-label">Created Date:</label>
                                            <input type="text" class="form-control" id="created_at" readonly
                                                   value="{{date("d/m/Y", strtotime($post->created_at))}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id" class="col-form-label">Updated Date:</label>
                                            <input type="text" class="form-control" id="updated_at" readonly
                                                   value="{{date("d/m/Y", strtotime($post->updated_at))}}">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"
                                            data-toggle="modal"
                                            data-target="#edit-{{$post->id}}">Edit
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button style="all: unset; color: #FFC107; padding-right: 10px" type="button" class="btn"
                            title="edit"
                            data-toggle="modal"
                            data-target="#edit-{{$post->id}}"><i
                            class="material-icons">&#xE254;</i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="edit-{{$post->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Edit post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('post_update', $post->id)}}" method="POST">
                                        @csrf @method('PUT')
                                        <div class="form-group">
                                            <label for="id" class="col-form-label">ID</label>
                                            <input type="text" class="form-control" id="id" name="id" readonly
                                                   value="{{$post->id}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id" class="col-form-label">Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                   value="{{$post->title}}">
                                            <div style="margin: 5px">
                                                @if ($errors->has('title'))
                                                    <label class="alert-warning">{{$errors->first('title')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Content
                                                <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" id="content" name="content"
                                                      rows="10">{{$post->content}}</textarea>
                                            @if ($errors->has('content'))
                                                <label class="alert-warning">{{$errors->first('content')}}</label>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="id" class="col-form-label">Created Date</label>
                                            <input type="text" class="form-control" id="created_at" name="created_at"
                                                   readonly value="{{date("d/m/Y", strtotime($post->created_at))}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="id" class="col-form-label">Updated Date</label>
                                            <input type="text" class="form-control" id="updated_at" name="updated_at"
                                                   readonly value="{{date("d/m/Y", strtotime($post->updated_at))}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" id="button" class="btn btn-primary">Save changes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->

                    <form action="{{route('post_delete', $post->id)}}" method="POST" style="all: unset;">
                        @csrf @method('PUT')
                        <button style="all: unset; color: #E34724"
                                title="delete"
                                type="submit" class="btn">
                            <i class="material-icons">&#xE872;</i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{route('search.index')}}" style="color: red">Move to Eloquent ORM Exercise</a>
    <div class="clearfix" style="float: right">
        <ul>
            {{$posts->links()}}
        </ul>
    </div>
@endsection
