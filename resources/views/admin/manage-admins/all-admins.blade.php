@extends('layouts.admin-master')

@section('title', 'Zidni All Admins')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage All Admins</h2>
                                        <p>This board shows you all other admin and you can add more admin</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/home/all-admins">Manage All Admins</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Manage All Admins</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allAdminsTableContainer">

                    
                                            
                                                <table id="allAdminsTable" class="table hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Full Name</th>
                                                                <th>User Name</th>
                                                                <th>Role</th>
                                                                <th>Creating Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="icon"></td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="icon"></td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
                                                            </tr>


                                                            <tr>
                                                                <td class="icon"></td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
                                                                <td>Lorem ipsum</td>
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

<script type="text/javascript" src="{{asset('admin/js/pages/allAdminsPage.js')}}"></script>

@endsection