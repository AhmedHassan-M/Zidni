@extends('layouts.admin-master')

@section('title', 'Zidni Students')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">Manage Zidni University Students</h2>
                    <p>This board show you all Students of Zidni University</p>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Students</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- HTML Markup -->
                <section id="html-markup" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Zidni University Students</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in" id="allApplicantTableContainer">


                            <table id="allApplicantTable" class="table hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Specialization</th>
                                            <th>Student Status</th>
                                            <th>Applicant Profile</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @for ($id = 0; $id < 8; $id++)
                                            <tr id="{{$id}}">
                                                <td class="icon"></td>
                                                <td>{{$id + 1}}</td>
                                                <td>Passport Name</td>
                                                <td>email{{$id}}@domain.com</td>
                                                <td>Fiqth</td>
                                                <td>Active</td>
                                                <td><a href="/admin/university/student-profile" class="btn btn-secondary" target="_blank">View Student</a></td>
                                                <td  class="options-container"><a id="" class="delete-user hide-options"><span><i class="far fa-trash-alt"></i></span></a></td>
                                            </tr>
                                        @endfor
                                        


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


<script type="text/javascript" src="{{asset('admin/js/pages-university/manage-student/all-students.js')}}"></script>


@endsection