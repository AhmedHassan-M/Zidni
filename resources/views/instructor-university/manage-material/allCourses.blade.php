@extends('layouts.instructor-master')

@section('title', 'Zidni University All Courses')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">Manage Zidni University All Courses</h2>
                    <p>This board show you all Courses for Zidni University</p>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">University Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="#">Manage Zidni University Courses</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- HTML Markup -->
                <section id="html-markup" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Zidni University Courses</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in" id="allCoursesTableContainer">


                            <table id="allCoursesTable" class="table hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Instructor</th>
                                            <th>Specialization</th>
                                            <th>Year & Semester</th>
                                            <th>Date & Time</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @for ($i = 0; $i < 50; $i++)
                                            <tr id="{{$i}}">
                                                <td class="icon"></td>
                                                <td>{{$i}}</td>
                                                <td>---</td>
                                                <td>---</td>
                                                <td>---</td>
                                                <td>First Year, Semester 1</td>
                                                <td>Monday From 11:00 AM To 01:00 PM</td>
                                                <td  class="options-container">
                                                    
                                                    
                                                    <a class="edit-course hide-options" href="/instructor/courses-edit" data-toggle="tooltip" data-placement="left" title="Edit Course"><span><i class="far fa-edit"></i></span></a>

                                                    
                                                    <a id="" class="delete-user hide-options" data-toggle="tooltip" data-placement="left" title="Delete Course"><span><i class="far fa-trash-alt"></i></span></a>
                                                
                                                
                                                
                                                </td>
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


<script type="text/javascript" src="{{asset('admin/js/instructor/courses/all-courses.js')}}"></script>


@endsection