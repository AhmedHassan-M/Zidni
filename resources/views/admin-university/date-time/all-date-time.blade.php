@extends('layouts.admin-master')

@section('title', 'Zidni Date & Time')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">Manage Zidni University Date & Time</h2>
                    <p>This board show you all Date & Time for Zidni University</p>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Date & Time</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- HTML Markup -->
                <section id="html-markup" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Zidni University Date & Time</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in" id="allDateAndTimeTableContainer">


                            <table id="allDateAndTimeTable" class="table hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Day</th>
                                            <th>Start From</th>
                                            <th>End At</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @for ($i = 0; $i < 50; $i++)
                                            <tr id="{{$i}}">
                                                <td class="icon"></td>
                                                <td>{{$i}}</td>
                                                <td>test</td>
                                                <td>10:00 AM</td>
                                                <td>11:00 AM</td>
                                                <td  class="options-container">
                                                    
                                                    
                                                    <a class="edit-course hide-options" href="/admin/university/edit-date-time" data-toggle="tooltip" data-placement="left" title="Edit Date & Time"><span><i class="far fa-edit"></i></span></a>

                                                    
                                                    <a id="" class="delete-user hide-options" data-toggle="tooltip" data-placement="left" title="Delete Date & Time"><span><i class="far fa-trash-alt"></i></span></a>
                                                
                                                
                                                
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


<script type="text/javascript" src="{{asset('admin/js/pages-university/date-time/all-date-time.js')}}"></script>


@endsection