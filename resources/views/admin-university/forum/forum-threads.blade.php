@extends('layouts.admin-master')

@section('title', 'Zidni Manage Forum Threads')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                        <h2 class="content-header-title">Manage Forum Threads</h2>
                        <p>This board give you easy way to manage the forum threads</p>
                    </div>
                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                        <div class="breadcrumb-wrapper col-xs-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/university/home">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="#">Manage Forum Threads</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-body">
    
                    <!-- HTML Markup -->
                    <section id="html-markup-1" class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manage Forum Threads</h4>
                        </div>
                        <div class="card-body collapse in" id="allThreadsTableContainer">

                                <table id="allThreadsTable" class="table hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Thread Title</th>
                                                <th>Category</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < 4; $i++)
                                            <tr id="{{$i}}">
                                                <td class="icon"></td>
                                                <td>{{$i}}</td>
                                                <td>
                                                    <a href="#" class="thread_link" target="_blank" title="View Thread">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                    </a>
                                                </td>
                                                <td>Category Title</td>
                                                <td class="options-container">

                                                    <a id="{{$i}}" class="delete-instructors hide-options"><span><i class="far fa-trash-alt"></i></span></a>
                                                
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

<script type="text/javascript" src="{{asset('admin/js/pages-university/forum/forum-threads.js')}}"></script>

@endsection