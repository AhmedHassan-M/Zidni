@extends('layouts.admin-master')

@section('title', 'Zidni University Rejected Applicants')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">Manage Zidni University Rejected Applicants</h2>
                    <p>This board show you all Rejected Applicants for Zidni University</p>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Rejected Applicants</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- HTML Markup -->
                <section id="html-markup" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Zidni University Rejected Applicants</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in" id="rejectedApplicantTableContainer">


                            <table id="rejectedApplicantTable" class="table hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Applied Date</th>
                                            <th>Applicant Profile</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($applications as $i => $application)
                                            <tr id="{{$application->id}}">
                                                <td class="icon"></td>
                                                <td>{{$i + 1}}</td>
                                                <td>{{$application->passport_name}}</td>
                                                <td>@if($application->user) {{$application->user->email}} @endif</td>
                                                <td>{{date("d/m/Y", strtotime($application->created_at))}}</td>
                                                @if($application->status == 0)
                                                <td>Waiting Review</td>
                                                @else
                                                <td>Accepted</td>
                                                @endif
                                                <td><a href="/admin/university/applicant-profile/{{$application->id}}" class="btn btn-secondary" target="_blank">Review Application</a></td>
                                                <td  class="options-container"><a id="{{$application->id}}" class="delete-user hide-options"><span><i class="far fa-trash-alt"></i></span></a></td>
                                            </tr>
                                        @endforeach
                                        


                                    </tbody>
                                </table>




                    </div>
                </section>
                <!--/ HTML Markup -->
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- END MAIN CONTENT -->




@endsection




@section('scripts')


<script type="text/javascript" src="{{asset('admin/js/pages-university/applicant/rejected-applicant.js')}}"></script>


@endsection