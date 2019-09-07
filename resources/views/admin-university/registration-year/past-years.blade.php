@extends('layouts.admin-master')

@section('title', 'Zidni Past Years')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">Manage Zidni University Specialization</h2>
                    <p>This board show you all specialization for Zidni University</p>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Specialization</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- HTML Markup -->
                <section id="html-markup" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Zidni University Specialization</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in" id="pastYearsTableContainer">

                        <table id="pastYearsTable" class="table hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>1st Semester</th>
                                    <th>2st Semester</th>
                                </tr>
                            </thead>
                            <tbody>

                                @for ($i = 0; $i < 3; $i++)
                                    <tr id="idName{{$i}}">
                                        <td>{{2016 + $i}} - {{2017 + $i}}</td>
                                        <td>September {{2016 + $i}} - January {{2017 + $i}}</td>
                                        <td>February {{2016 + $i}} - June {{2017 + $i}}</td>
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


<script type="text/javascript" src="{{asset('admin/js/pages-university/registration-year/past-years.js')}}"></script>


@endsection