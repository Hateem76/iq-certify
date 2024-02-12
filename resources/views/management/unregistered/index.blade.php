@extends('management.layouts.master')
@section('title')
    Unregistered User
@endsection
@section('content')
    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> Unregistered User</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <div class="body table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th class="col-lg-3">Name/Email</th>
                                    <th class="col-lg-3">Country</th>
                                    <th class="col-lg-3">Gender</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $count=1
                                ?>
                                @foreach($user as $row)
                                    <tr>
                                        <td>
                                            <a class="text-dark text-decoration-none" href="">
                                                    {{$row->name}}
                                                    <br>
                                                    {{$row->email}}
                                            </a>
                                        </td>
                                        <td>
                                                {{$row->country}}
                                        </td>


                                        <td>
                                            <label class="badge badge-info text-uppercase" data-toggle="modal" data-target="#active_inactive">Gender: {{$row->gender}}</label>
{{--                                            <label class="badge badge-info text-uppercase" data-toggle="modal" data-target="#active_inactive">Age: {{$row->age}}</label>--}}
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


@endsection

