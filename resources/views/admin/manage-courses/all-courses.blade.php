@extends('layouts.admin-master')

@section('title', 'Zidni All Courses')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage All Courses</h2>
                                        <p>This board give you easy access to Manage Courses</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/all-courses">Manage all Courses</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="courses-summary" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Courses Summary</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allCoursesTableContainer">


                                            <div class="container">


                                                <div class="courses-summary-container">


                                                    <div class="courses-summary-item">
    
    
                                                        <h5>{{count($courses)}}</h5>
                                                        <p>Courses Total Number</p>
    
                                                    </div>
    
    
                                                    <div class="courses-summary-item">
    
    
                                                        <h5>140</h5>
                                                        <p>Student Enrolled</p>
    
                                                    </div>
    
    
                                                    <div class="courses-summary-item">
    
    
                                                        <h5>6</h5>
                                                        <p>Enrolled as Free</p>
    
                                                    </div>
    
    
                                                    <div class="courses-summary-item">
    
    
                                                        <h5>4</h5>
                                                        <p>Enrolled as paid</p>
    
                                                    </div>
    
    
    
                                                    <div class="courses-summary-item">
    
    
                                                        <h5><span>$</span> 894.24</h5>
                                                        <p>Total Revenue</p>
    
                                                    </div>
    
    
                                                </div>
    
    


                                            </div>


                                        </div>
                                    </section>
                                    <!--/ HTML Markup -->


                                    <!-- HTML Markup -->
                                    <section id="html-markup-1" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Manage All Courses</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">

                                                    <li><a href="/admin/add-courses"><button class="btn btn-primary add-button">Add New Courses</button></a></li>
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allCoursesTableContainer">

                                                <table id="allCoursesTable" class="table hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Courses Name</th>
                                                                <th>Instructor name</th>
                                                                <th>Price</th>
                                                                <th>Student enrolled</th>
                                                                <th>Revenue</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($courses) > 0)
                                                            @foreach($courses as $course)
                                                            <tr id="{{$course->id}}">
                                                                <td class="icon"></td>
                                                            <td>{{$course->name}}</td>
                                                            
                                                                @if($course->instructor)
                                                                <td>{{$course->instructor->full_name}}</td>
                                                                @else
                                                                <td>-</td>
                                                                @endif
                                                                <td>{{$course->price}} $</td>
                                                                <td>0</td>
                                                                <td>0</td>
                                                                <td class="options-container">

                                                                    <a class="edit-course hide-options" href="/admin/edit-courses/{{$course->id}}" data-toggle="tooltip" data-placement="top" title="Edit Course"><span><i class="far fa-edit"></i></span></a>

                                                                    <a id="{{$course->id}}" class="delete-course hide-options" data-toggle="tooltip" data-placement="top" title="Delete Course"><span><i class="far fa-trash-alt"></i></span></a>
                                                                
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                            @endif

                                                           
                                                            


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

<script type="text/javascript" src="{{asset('admin/js/pages/allCoursesPage.js')}}"></script>

@endsection