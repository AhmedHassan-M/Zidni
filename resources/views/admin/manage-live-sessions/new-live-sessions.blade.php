@extends('layouts.admin-master')

@section('title', 'Zidni New Live Sessions')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage Live Sessions</h2>
                                        <p>This board give you easy access to the most important sections</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                    <li class="breadcrumb-item active"><a href="/admin/new-live-sessions">Manage Live sessions</a></li>
                                        

                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Comeing Soon</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in">

                                            <div class="come-soon">

                                                <img src="{{asset('images/logo.png')}}" alt="Comeing Soon">

                                                <h1>Comeing Soon</h1>

                                            </div>

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


@endsection