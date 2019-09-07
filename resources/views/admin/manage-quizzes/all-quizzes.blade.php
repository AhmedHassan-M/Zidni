@extends('layouts.admin-master')

@section('title', 'Zidni All Quizzes')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage All Quizzes</h2>
                                        <p>This board give you easy way to see all Quize</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/all-quizzes">Manage all Quizzes</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    

                                    <!-- HTML Markup -->
                                    <section id="html-markup-1" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Manage All Quizzes</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">

                                                    <li><a href="/admin/add-quizzes"><button class="btn btn-primary add-button">Add New Quize</button></a></li>
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allQuizzesTableContainer">

                                                <table id="allQuizzesTable" class="table hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Quiz Name</th>
                                                                <th>Number Of Questions</th>
                                                                <th>Passing Score</th>
                                                                <th>Total Score</th>
                                                                <th>Student Enrolled</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($quizzes) > 0)
                                                            @foreach($quizzes as $quiz)
                                                            <tr id="{{$quiz->id}}">
                                                                <td class="icon"></td>
                                                                <td>{{$quiz->title}}</td>
                                                                <td>{{count($quiz->question)}}</td>
                                                                <?php  
                                                                    $percentage = $quiz->passing_score * 10;
                                                                    $multiply = $percentage * $quiz->final_score;
                                                                    $passingScore = $multiply/100;
                                                                ?>
                                                                <td>{{$passingScore}}</td>
                                                                <td>{{$quiz->final_score}}</td>
                                                                <td>-----</td>
                                                                <td class="options-container">

                                                                    <a class="edit-quizzes hide-options" href="/admin/edit-quizzes/{{$quiz->id}}" data-toggle="tooltip" data-placement="top" title="Edit Quiz"><span><i class="far fa-edit"></i></span></a>


                                                                    <a id="{{$quiz->id}}" class="delete-quizzes hide-options" data-toggle="tooltip" data-placement="top" title="Delete Quiz"><span><i class="far fa-trash-alt"></i></span></a>
                                                                    
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

<script type="text/javascript" src="{{asset('admin/js/pages/allQuizzes.js')}}"></script>

@endsection