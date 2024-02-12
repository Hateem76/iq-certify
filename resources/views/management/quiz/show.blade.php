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
                                <h4 class="page-title"> {{$quiz->title}} </h4>
                            </li>
                                <h4 class="page-title border-0 pl-3"> Total Question ({{count($question)}}) </h4>




                        </ul>
                    </div>
                </div>


                <div class="card">
                    <div class="header">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

{{--                            <a href="{{route('question.create')}}?p={{$quiz->id}}" class="btn btn-primary "--}}
{{--                                    > Create Question--}}
{{--                            </a>--}}
                        </div>



                        <div class="body table-responsive">
                            <table class="table" id="mTable">
                                <thead>
                                <tr>
                                    <th class="col-lg-1">S.No</th>
                                    <th class="col-lg-1">Image</th>
                                    <th class="col-lg-5">Title</th>
                                    <th class="col-lg-2">Category</th>
                                    <th class="col-lg-3">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $count=1
                                ?>
                                @foreach($question as $row)
                                    <tr>
                                        <td>
                                            {{$count}}
                                        </td>
                                        <td>
                                            <img width="50px" src="{{asset('images/question/'.'/'.$row->question_image)}}" alt="">
                                        </td>
                                        <td>
                                            {{$row->title}}
                                        </td>
                                        <td>
                                            {{$row->category}}
                                        </td>

                                        <td>

                                            <a  href="{{route('question.edit',$row->id)}}" class=" btn bg-primary btn-circle waves-effect waves-circle waves-float text-white">
                                                <i class="fas fa-pencil-alt">  </i>
                                            </a>
{{--                                            <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#exampleModalCenter{{$row->id}}">--}}
{{--                                                <i class="fas fa-trash">   </i>--}}
{{--                                            </button>--}}
                                            <div class="modal fade" id="exampleModalCenter{{$row->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Delete
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure want to proceed this action?                                           </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger waves-effect"
                                                                    data-dismiss="modal">Close</button>
                                                            <form action="{{route('question.destroy',$row->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-info waves-effect">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                    $count++
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                </form>
            </div>


@endsection

