@extends('layouts.admin-master')

@section('title', 'Zidni All Roles')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage All Roles</h2>
                                        <p>This board shows you all roles and you can add more roles</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/home/add-roles">Manage All Roles</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Manage All Roles</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allRolesTableContainer">

                                                <table id="allRolesTable" class="table hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Role Name</th>
                                                                <th>Admin Name</th>
                                                                <th>Email</th>
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

<script type="text/javascript" src="{{asset('admin/js/pages/allRolesPage.js')}}"></script>

@endsection