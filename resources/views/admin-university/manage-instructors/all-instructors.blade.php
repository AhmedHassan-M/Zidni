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
                                        <h2 class="content-header-title">Manage Instructors</h2>
                                        <p>This board give you easy access to all instructors</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/university/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="#">Manage All Instructors</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup-1" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">All Instructors</h4>
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
                                                            @for ($i = 0; $i < 4; $i++)
                                                            <tr id="{{$i}}">
                                                                <td class="icon"></td>
                                                                <td>Instructor Name </td>
                                                                <td class="instructorsTable-overview">
                                                                    <div class="overview-container">
                                                                        <a class="overview-content" data-toggle="modal" data-target="#overviewModal">
                                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td class="options-container">

                                                                    <a class="edit-instructors hide-options" href="/admin/edit-instructor/{{$i}}"><span><i class="far fa-edit"></i></span></a>

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

<script type="text/javascript" src="{{asset('admin/js/pages-university/manage-instructors/allInstructors.js')}}"></script>

@endsection