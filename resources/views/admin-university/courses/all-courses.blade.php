@extends('layouts.admin-master')

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
                            <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Courses</a></li>
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

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                            <table id="allCoursesTable" class="table hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>price</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($subjects as $i => $subject)
                                            <tr id="{{$subject->id}}">
                                                <td class="icon"></td>
                                                <td>{{$i + 1}}</td>
                                                <td>{{$subject->name}}</td>
                                                <td>{!!mb_strimwidth($subject->description, 0 , 100 , '...')!!}</td>
                                                <td>{{$subject->price}}$</td>
                                                <td  class="options-container">
                                                    
                                                    
                                                    <a class="edit-course hide-options" href="/admin/university/edit-courses" data-toggle="tooltip" data-placement="left" title="Edit Course"><span><i class="far fa-edit"></i></span></a>

                                                    
                                                    <a id="{{$subject->id}}" class="delete-user hide-options" data-toggle="tooltip" data-placement="left" title="Delete Course"><span><i class="far fa-trash-alt"></i></span></a>
                                                
                                                
                                                
                                                </td>
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


<script type="text/javascript" src="{{asset('admin/js/pages-university/courses/all-courses.js')}}"></script>


@endsection