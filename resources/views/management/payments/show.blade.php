@extends('management.layouts.master')
@section('title')
    Payments
@endsection
@section('content')
    <style>
        td, th {
            padding: 8px 0px;
        }
    </style>
    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> Payments</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <div class="body table-responsive">
                            <h5>User Detail</h5>

                            <table>
                                <tbody>
                                <tr>
                                    <th width="20%">Name</th>
                                    <td width="30%">{{$payments->user->detail->name}}</td>
                                    <th width="20%">Email</th>
                                    <td  width="30%">
                                        <a  class="text-dark " href="mailto:{{$payments->user->detail->email}}">{{$payments->user->detail->email}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{$payments->user->detail->gender}}</td>
                                    <th width="20%">Country</th>
                                    <td>{{$payments->user->detail->country}}</td>
                                </tr>
                                <tr>
                                    <th>Field</th>
                                    <td>{{$payments->user->detail->field}}</td>
                                    <th>Level</th>
                                    <td>{{$payments->user->detail->level}}</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <div class="body table-responsive">
                            <h5>Quizzez</h5>
                            <table>
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="text-center">Score</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments->user->quizzes as $quiz)
                                    <tr>
                                        <th width="25%">{{$quiz->quiz->title}}</th>
                                        <td class="text-center" width="15%">{{App\Helpers\Results::Get($quiz->id,'total')}}</td>
                                        <td width="20%">
                                            {{date('d/m/y h:i A', $quiz->created)}}
                                        </td>
                                        <td>
                                            <a class="d-inline-flex align-items-center btn btn-primary"
                                               target="_blank" href="{{url('generate-certificate',$quiz->unique_key)}}"
                                            >Download Certificate</a>
                                            <a class="d-inline-flex align-items-center btn btn-primary"
                                               target="_blank" href="{{url('generate-certificate-view',$quiz->unique_key)}}"
                                            >View Certificate</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <div class="body table-responsive">
                            <h5>Quizzez</h5>
                            <table>

                                <tbody>
                                <tr>
                                    <th>Trial Charge </th>
                                    <td class="text-center">{{ number_format(0.60, 2) }}  €</td>
                                    <td>{{ date('d/m/y h:i A',strtotime($payments->created_at)) }}</td>
                                    <td></td>
                                </tr>
                                @if(count($invoices) > 1)
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <th>Monthly Subscription </th>
                                            <td class="text-center">{{ number_format($invoice->amount_paid / 100, 2) }} €</td>
                                            <td>{{ date('d/m/y h:i A', $invoice->created) }}</td>
                                            <td><a href="{{$invoice->invoice_pdf}}" target="_blank">Receipt</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


@endsection

