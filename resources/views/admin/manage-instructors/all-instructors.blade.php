@extends('layouts.admin-master')

@section('title', 'Zidni All Instructors')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage All Instructors</h2>
                                        <p>This board give you easy access to all instructors</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/all-instructors">Manage All Instructors</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup-1" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Manage All Instructors</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">

                                                    <li><a href="/admin/add-instructors"><button class="btn btn-primary add-button">Add New Instructors</button></a></li>
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allInstructorsTableContainer">

                                                <table id="allInstructorsTable" class="table hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Instructor Name</th>
                                                                <th>Instructor Overview</th>
                                                                <th>Options</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($instructors) > 0)
                                                            @foreach($instructors as $instructor)
                                                            <tr id="{{$instructor->id}}">
                                                                <td class="icon"></td>
                                                                <td>{{$instructor->full_name}}</td>
                                                                <td class="instructorsTable-overview">
                                                            
                                                                    <div class="overview-container">
        
                                                                        <a class="overview-content" data-toggle="modal" data-target="#overviewModal">
        
                                                                                {{$instructor->overview}}

        
                                                                        </a>
                                                                    
                                                                    </div>
        
                                                                </td>
                                                                <td class="options-container">

                                                                    <a class="edit-instructors hide-options" href="/admin/edit-instructor/{{$instructor->id}}"><span><i class="far fa-edit"></i></span></a>

                                                                    <a id="{{$instructor->id}}" class="delete-instructors hide-options"><span><i class="far fa-trash-alt"></i></span></a>
                                                                
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                            @endif
                                                            
                                                            


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


                        <!-- Modal -->
<div class="modal fade" id="overviewModal" tabindex="-1" role="dialog" aria-labelledby="overviewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Overview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="overview-content-modal"></p>
        </div>
      </div>
    </div>
</div>






@endsection




@section('scripts')

<script type="text/javascript" src="{{asset('admin/js/pages/allInstructors.js')}}"></script>

@endsection