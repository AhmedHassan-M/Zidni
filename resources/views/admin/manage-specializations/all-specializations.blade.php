@extends('layouts.admin-master')

@section('title', 'Zidni All Specializations')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage All Specializations</h2>
                                        <p>This board give you easy access to manage Specializations</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/all-masters">Manage All Specializations</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="courses-summary" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Specializations Summary</h4>
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
    
    
                                                        <h5>{{count($specializations)}}</h5>
                                                        <p>Specializations Total Number</p>
    
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
                                            <h4 class="card-title">Manage All Specializations</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">

                                                    <li><a href="/admin/add-specializations"><button class="btn btn-primary add-button">Add New Specializations</button></a></li>
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allSpecializationsTableContainer">

                                                <table id="allSpecializationsTable" class="table hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Specializations Name</th>
                                                                <th>Specializations Courses</th>
                                                                <th>Price</th>
                                                                <th>Student enrolled</th>
                                                                <th>Revenue</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($specializations) > 0)
                                                                @foreach($specializations as $specialization)
                                                                <tr id="{{$specialization->id}}">
                                                                    <td class="icon"></td>
                                                                    <td>{{$specialization->name}}</td>
                                                                    <td>


                                                                        <div class="dropdown">
                                                                            @if(count($specialization->courses) > 0)
                                                                            <?php $courses = $specialization->courses; ?>
                                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                {{$courses[0]->name}}
                                                                            </button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                            @foreach($courses as $course)
                                                                                <a class="dropdown-item">{{$course->name}}</a>
                                                                            @endforeach
                                                                            </div>
                                                                            @endif
                                                                        </div>

                                                                        
                                                                    </td>
                                                                    <td>{{$specialization->price}}</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td class="options-container">

                                                                        <a class="edit-specializations hide-options" href="/admin/edit-specialization/{{$specialization->id}}"><span><i class="far fa-edit"></i></span></a>

                                                                        <a id="{{$specialization->id}}" class="delete-specializations hide-options"><span><i class="far fa-trash-alt"></i></span></a>
                                                                    
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

<script type="text/javascript" src="{{asset('admin/js/pages/allSpecializations.js')}}"></script>

@endsection