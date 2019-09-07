@extends('layouts.instructor-master')

@section('title', 'Zidni All Exercises')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage All Exercises</h2>
                                        <p>This board give you easy way to see all Exercises</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/university/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="#">Manage all Exercises</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    

                                    <!-- HTML Markup -->
                                    <section id="html-markup-1" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Manage All Exercises</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">

                                                    <li><a href="#"><button class="btn btn-primary add-button">Add New Exercise</button></a></li>
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allExercisesTableContainer">

                                                <table id="allExercisesTable" class="table hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Exercise Name</th>
                                                                <th>Specialization</th>
                                                                <th># Questions</th>
                                                                <th>Passing Score</th>
                                                                <th>Total Score</th>
                                                                <th># Students Enrolled</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="id">
                                                                <td class="icon"></td>
                                                                <td>Name</td>
                                                                <td>Specialization</td>
                                                                <td>8</td>
                                                                <td>40%</td>
                                                                <td>80</td>
                                                                <td>38</td>
                                                                
                                                                <td class="options-container">

                                                                    <a class="edit-quizzes hide-options" href="/instructor/view-exercise" data-toggle="tooltip" data-placement="top" title="View Exercise"><span><i class="far fa-eye"></i></span></a>

                                                                    <a class="edit-quizzes hide-options" href="/instructor/edit-exercises" data-toggle="tooltip" data-placement="top" title="Edit Exercise"><span><i class="far fa-edit"></i></span></a>


                                                                    <a id="#" class="delete-quizzes hide-options" data-toggle="tooltip" data-placement="top" title="Delete Exercise"><span><i class="far fa-trash-alt"></i></span></a>
                                                                    
                                                                </td>
                                    
                                                            </tr>
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

<script type="text/javascript" src="{{asset('admin/js/instructor/exercises/all-exercises.js')}}"></script>

@endsection