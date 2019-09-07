@extends('layouts.admin-master')

@section('title', 'Zidni Edit Instructors')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage Instructors</h2>
                                        <p>This board give you easy way to edit added instructors</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/university/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="#">Manage Edit Instructors</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Edit Instructor</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in">

                    
                                                <form class="instructor-form" id="editInstructorsForm">



                                                        <div class="form-group">
                                                          <label for="instructorFullName">Full Name</label>
                                                          <input type="text" class="form-control" id="instructorFullName" name="instructorFullName" placeholder="" value="{{$instructor->full_name}}">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="instructorFullName">Email</label>
                                                          <input type="text" class="form-control" id="instructorFullName" name="instructorFullName" placeholder="" value="{{$instructor->full_name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="instructorOverview">Overview</label>
                                                            <textarea class="form-control" id="instructorOverview" name="instructorOverview" rows="10">{{$instructor->overview}}</textarea>
                                                        </div>

                                                        <div class="form-group">

                                                                <label for="instructorPhoto">Uploud Photo</label>

                                                                <input type="file" id="instructorPhoto" name="instructorPhoto" class="dropify" data-height="400" data-max-file-size="2M" data-min-width="200" data-max-width="1000" data-min-height="200" data-max-height="1000" data-show-remove="true" data-errors-position="outside" data-allowed-file-extensions="jpg jpeg png" data-max-file-size-preview="2M" data-default-file="{{asset('image/'.$instructor->photo)}}">

                                                        </div>

                                                        {{--Ajax Submit--}}


                                                        <div class="form-submit">

                                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Update Instructor</button>
                                            
                                                                <div class="ajax-loading loader loader--style2" title="1">
                                                                  <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                    width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                                                    <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                                                      <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"
                                                                      />
                                                                    </path>
                                                                  </svg>
                                                                </div>
                                            
                                            
                                                        </div>



                                                </form>


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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script type="text/javascript" src="{{asset('admin/js/pages-university/manage-instructors/editInstructors.js')}}"></script>


@endsection