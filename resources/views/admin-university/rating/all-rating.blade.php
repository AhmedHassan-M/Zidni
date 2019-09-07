@extends('layouts.admin-master')

@section('title', 'Zidni Courses Ratings')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">Manage Zidni University Courses Ratings</h2>
                    <p>This board show you all Courses Ratings for Zidni University</p>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="">Manage Zidni University Courses Ratings</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- HTML Markup -->
                <section id="html-markup" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Zidni University Courses Ratings</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in" id="allCoursesRatingsTableContainer">


                            <table id="allCoursesRatingsTable" class="table hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            <th>Course Name</th>
                                            <th>Course Content</th>
                                            <th>Course Instructor</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($ratings as $rating)
                                            <tr id="{{$rating->id}}">
                                                <td class="icon"></td>
                                                <td>{{$i + 1}}</td>
                                                <td>{{$rating->user->full_name}}</td>
                                                <td>{{$rating->subject->name}}</td>


                                                <td class="admin-rating">

                                                        <div class="rating_1">
                                                            <label class="icon">
                                                                <input type="radio" name="courseContentRating" value="5" title="5 stars">
                                                            </label>
                                                            <label >
                                                                <input type="radio" name="courseContentRating" value="4" title="4 stars" >
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="courseContentRating" value="3" title="3 stars">
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="courseContentRating" value="2" title="2 stars">
                                                            </label>
                                                            <label class="selected">
                                                                <input type="radio" name="courseContentRating" value="1" title="1 star">
                                                            </label>
                                                        </div>



                                                </td>
                                                <td class="admin-rating">


                                                        <div class="rating_1">
                                                            <label class="icon">
                                                                <input type="radio" name="courseContentRating" value="5" title="5 stars">
                                                            </label>
                                                            <label >
                                                                <input type="radio" name="courseContentRating" value="4" title="4 stars" >
                                                            </label>
                                                            <label class="selected">
                                                                <input type="radio" name="courseContentRating" value="3" title="3 stars">
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="courseContentRating" value="2" title="2 stars">
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="courseContentRating" value="1" title="1 star">
                                                            </label>
                                                        </div>




                                                </td>


                                                <td  class="options-container">

                                                    <a id="{{$rating->id}}" class="delete-user hide-options" data-toggle="tooltip" data-placement="left" title="Delete Course Rating"><span><i class="far fa-trash-alt"></i></span></a>

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


<script type="text/javascript" src="{{asset('admin/js/pages-university/rating/all-rating.js')}}"></script>


@endsection