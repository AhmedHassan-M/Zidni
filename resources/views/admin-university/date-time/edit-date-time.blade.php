@extends('layouts.admin-master')

@section('title', 'Zidni Edit Date & Time')


@section('links')


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/pickadate@3.6.2/lib/themes/default.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/pickadate@3.6.2/lib/themes/default.time.css" rel="stylesheet" />





@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Zidni University Edit Date & Time</h2>
                <p>This board show Edit Date & Time for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Edit
                            Date & Time</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Zidni University Edit Date & Time</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">

                    
                    <div class="load-card-box"></div>


                    <div class="container">


                        <form class="university-form-style" id="editDateAndTimeForm">






                            <div class="form-group select-input-container">
                                    <label for="selectDay">Select Day</label>
                                    <select class="form-control auto-save form-select-active" id="selectDay" name="selectDay">
                                        <option value="">Select Day</option>
                                        <option value="sunday">Sunday</option>
                                        <option value="monday">Monday</option>
                                        <option value="tuesday">Tuesday</option>
                                        <option value="wednesday">Wednesday</option>
                                        <option value="thursday">Thursday</option>
                                        <option value="friday">Friday</option>
                                        <option value="saturday">Saturday</option>                                        
                                    </select>
                            </div>



                            <div class="two-inputs">



                                    <div class="form-group ">
                                        <label for="startTime">Start From</label>
                                        <input type="text" autocomplete="off" class="form-control time-input pickatime-start" value="3:00 AM" name="startTime" id="startTime" placeholder="Start From">
                                    </div>



                                    <div class="form-group ">
                                        <label for="endTime">End At</label>
                                        <input type="text" autocomplete="off" class="form-control time-input pickatime-end" value="05:00 AM" name="endTime" id="endTime" placeholder="End At">
                                    </div>
       
                
            
                            </div>





                            <div class="form-submit"><button type="submit"
                                    class="btn btn-secondary btn-lg btn-block">Update Date & Time</button>
                                
                                
                                </div>



                        </form>


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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pickadate@3.6.2/lib/compressed/picker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pickadate@3.6.2/lib/compressed/picker.time.min.js"></script>


<script type="text/javascript" src="{{asset('admin/js/pages-university/date-time/edit-date-time.js')}}"></script>

@endsection