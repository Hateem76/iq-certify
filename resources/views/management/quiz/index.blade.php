@extends('management.layouts.master')
@section('title')
    Quiz
@endsection
@section('content')

    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> Quizzes</h4>
                            </li>



                        </ul>
                    </div>
                </div>


                <div class="card">
                    <div class="header">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

{{--                            <button type="button" class="btn btn-primary " data-toggle="modal"--}}
{{--                                    data-target="#exampleModal"> Create Quiz--}}
{{--                            </button>--}}
                        </div>



                        <div class="body table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th class="col-lg-3">Title</th>
                                    <th class="col-lg-3">status</th>
                                    <th class="col-lg-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $count=1
                                ?>
                                @foreach($quiz as $row)
                                    <tr>
                                        <td>
                                            {{$row->title}}
                                        </td>

                                        @if($row->status == 1)
                                            <td><label class="badge badge-info" data-toggle="modal" data-target="#active_inactive">Published</label>

                                            </td>
                                        @else
                                            <td><label class="badge badge-danger" data-toggle="modal" data-target="#active_inactive">Draft</label>

                                            </td>
                                        @endif
                                        <td>

                                            <button type="button" class=" btn bg-primary btn-circle waves-effect waves-circle waves-float text-white" data-toggle="modal"
                                                    data-target="#exampleModal{{$row->id}}"> <i class="fas fa-pencil-alt">   </i>
                                            </button>
                                            <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="formModal" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="formModal">Update Quiz</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('quiz.update',$row->id)}}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <label for="email_address1">Status</label>
                                                                <div class="row">
                                                                    <div class="col-sm-3 col-lg-2">
                                                                        <div class="form-check form-check-radio">
                                                                            <label>
                                                                                <input {{$row->status == '1' ? 'checked' : ''}} name="status" type="radio"  class="status" value="1" />
                                                                                <span>Enable</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3 col-lg-2">
                                                                        <div class="form-check form-check-radio">
                                                                            <label>
                                                                                <input {{$row->status == '0' ? 'checked' : ''}} name="status" type="radio" class="status" value="0" />
                                                                                <span>Disable</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <label for="email_address1">Name</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="title"
                                                                               class="form-control" name="title"
                                                                               value="{{$row->title}}"
                                                                               placeholder="Type quiz Title Here">
                                                                    </div>
                                                                </div>
                                                                <label for="email_address1">Description</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <textarea type="text" id="description"
                                                                                  class="form-control" name="description"
                                                                                  placeholder="Type quiz Description Here">{{$row->description}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="email_address1" >Timer</label>
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        <input type="text" id="time_duration"
                                                                               class="form-control" min="0" name="time_duration"
                                                                               value="{{$row->time_duration}}"
                                                                               placeholder="">
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-danger waves-effect"
                                                                        data-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                        class="btn btn-info waves-effect">Update  Quiz</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{--                                            <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#exampleModalCenter{{$row->id}}">--}}
                                            {{--                                                <i class="fas fa-trash">   </i>--}}
                                            {{--                                            </button>--}}
                                            {{--                                            <div class="modal fade" id="exampleModalCenter{{$row->id}}" tabindex="-1" role="dialog"--}}
                                            {{--                                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
                                            {{--                                                <div class="modal-dialog modal-dialog-centered" role="document">--}}
                                            {{--                                                    <div class="modal-content">--}}
                                            {{--                                                        <div class="modal-header">--}}
                                            {{--                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Delete--}}
                                            {{--                                                            </h5>--}}
                                            {{--                                                            <button type="button" class="close" data-dismiss="modal"--}}
                                            {{--                                                                    aria-label="Close">--}}
                                            {{--                                                                <span aria-hidden="true">&times;</span>--}}
                                            {{--                                                            </button>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                        <div class="modal-body">--}}
                                            {{--                                                            Are you sure want to proceed this action?                                           </div>--}}
                                            {{--                                                        <div class="modal-footer">--}}
                                            {{--                                                            <button type="submit" class="btn btn-danger waves-effect"--}}
                                            {{--                                                                    data-dismiss="modal">Close</button>--}}
                                            {{--                                                            <form action="{{route('quiz.destroy',$row->id)}}" method="post">--}}
                                            {{--                                                                @csrf--}}
                                            {{--                                                                @method('DELETE')--}}

                                            {{--                                                                <button type="submit" class="btn btn-info waves-effect">Delete</button>--}}
                                            {{--                                                            </form>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            <a href="{{route('quiz.show',$row->id)}}" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                <i class="fas fa-chevron-right">   </i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                </form>









            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="formModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModal">New Quiz</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('quiz.store')}}" method="post">
                                @csrf
                                <label for="email_address1">Status</label>
                                <div class="row">
                                    <div class="col-sm-3 col-lg-2">
                                        <div class="form-check form-check-radio">
                                            <label>
                                                <input checked name="status" type="radio"  class="status" value="1" />
                                                <span>Enable</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-lg-2">
                                        <div class="form-check form-check-radio">
                                            <label>
                                                <input name="status" type="radio" class="status" value="0" />
                                                <span>Disable</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <label for="email_address1">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="title"
                                               class="form-control" name="title"
                                               placeholder="Type quiz Title Here">
                                    </div>
                                </div>
                                <label for="email_address1">Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                     <textarea type="text" id="description"
                                      class="form-control" name="description"
                                       placeholder="Type quiz Description Here"></textarea>
                                    </div>
                                </div>
                                <label for="email_address1" >Timer</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" id="time_duration"
                                               class="form-control" min="0" name="time_duration"
                                               placeholder="">
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger waves-effect"
                                    data-dismiss="modal">Cancel</button>
                            <button type="submit"
                                    class="btn btn-info waves-effect">Create Quiz</button>
                        </div>
                    </div>

                </div>
            </div>

@endsection

