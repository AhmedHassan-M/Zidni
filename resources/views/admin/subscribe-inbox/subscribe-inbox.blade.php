@extends('layouts.admin-master')

@section('title', 'Zidni Subscribe Inbox')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Subscribe Inbox</h2>
                                        <p>This board give you easy way to see all newsletter subscriber</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/subscribe-inbox">Subscribe Inbox</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Subscribe Inbox</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="subscribeInboxTableContainer">


                                            <table id="subscribeInboxTable" class="table hover" cellspacing="0" width="100%">
                                                    <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Subscriber ID</th>
                                                                <th>Subscriber Email</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($subscribs as $key => $subscrib)
                                                            <tr id="{{$subscrib->id}}">
                                                                <td class="icon"></td>
                                                                <td>{{$key+1}}</td>
                                                                <td>{{$subscrib->email}}</td>
                                                                <td class="options-container">
                                                                    <a class="delete-subscriber hide-options" id="{{$subscrib->id}}"><span><i class="far fa-trash-alt"></i></span></a>
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

<script type="text/javascript" src="{{asset('admin/js/pages/subscribeInboxPage.js')}}"></script>

@endsection