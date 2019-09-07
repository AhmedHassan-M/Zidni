@extends('layouts.admin-master')

@section('title', 'Zidni All Categories')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">Manage All Categories</h2>
                    <p>This board give you easy way to manage Categories</p>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/all-categories">Manage All Categories</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">


                <!-- HTML Markup -->
                <section id="html-markup" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage All Categories</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a href="/admin/add-categories"><button class="btn btn-primary add-button">Add New Categories</button></a></li>
                                <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in" id="allCategoriesTableContainer">

                            <table id="allCategoriesTable" class="table hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Categories Name</th>
                                            <th>Course Number</th>
                                            <th>Creator</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cat as $cats)
                                        <tr  id="{{$cats->id}}">
                                            <td class="icon"></td>
                                            <td>{{$cats->name}}</td>
                                            <td>Lorem ipsum</td>
                                            <?php $creator = DB::table('users')->where('id',$cats->creator)->get(); ?>
                                            @if(count($creator) > 0)
                                            <td>{{$creator[0]->full_name}}</td>
                                            @else
                                            <td>-</td>
                                            @endif
                                            <td>{{$cats->created_at}}</td>
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

<script type="text/javascript" src="{{asset('admin/js/pages/allCategoriesPage.js')}}"></script>

@endsection