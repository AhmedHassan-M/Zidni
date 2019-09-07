@extends('layouts.admin-master')

@section('title', 'Zidni Edit Specialization')


@section('links')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<style>

.select2-container {
    width: 100% !important;
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    width: 100%;
}
.select2-container--default .select2-search--inline .select2-search__field {
    width: 100% !important;
    margin-top: 2px;
}

</style>

@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Zidni University Edit Specialization</h2>
                <p>This board show Edit specialization for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Edit
                                Specialization</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Zidni University Edit Specialization</h4>
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


                        <form method="POST" class="university-form-style" id="addSpecializationForm">

                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="specializationName">Specialization Name</label>
                                <input type="text" class="form-control" id="specializationName"
                                    placeholder="Specialization Name" name="specializationName" value="{{$field->name}}">
                            </div>


                            <div class="form-group">
                                <label for="specializationDescription">Specialization Description</label>
                                <textarea class="form-control" id="specializationDescription"
                                    name="specializationDescription" rows="5" placeholder="Specialization Description">{{$field->description}}</textarea>
                            </div>



                            <div id="specializationYears" role="tablist" aria-multiselectable="true">

                            @foreach($field->level as $key => $level)
                                <div class="card" data-year="{{$key + 1}}">
                                    <div class="card-header" role="tab" id="specializationYear_{{$key + 1}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-parent="#specializationYears" href="#year_{{$key + 1}}"
                                                    aria-expanded="true" aria-controls="year_{{$key + 1}}">
                                            <div class="icon-week-status">

                                                    <i class="fas fa-plus"></i>
                                                    <i class="fas fa-minus"></i>

                                            </div>
                                                                        
                                            <span>Specialization Level</span>

                                            </button>

                                        </h5>
                                    </div>

                                    <div id="year_{{$key + 1}}" class="collapse show in" role="tabpanel"
                                        aria-labelledby="specializationYear_{{$key + 1}}">
                                        <div class="card-block">    
                                            <div class="form-group selectCourses">
                                                <label>Select Courses</label>
                                                <select class="form-control auto-save form-select-active" name="specializationCourses_{{$key + 1}}[]" multiple>
                                                    @foreach($subjects as $subject)  
                                                        @if(in_array ($subject->id , $level->subjects()->select('subjects.*')->pluck('id')->toArray()))
                                                            <option value="{{$subject->id}}" selected>{{$subject->name}}</option>
                                                        @else
                                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                        @endif    
                                                    @endforeach                    
                                                </select>
                                            </div>
                                            <h5>Resources: </h5>
                                            <div class="form-group">
                                                <label>Google Drive</label>
                                                <input type="text" class="form-control" name="specializationDrive_{{$key + 1}}" placeholder="Google Drive url" value="{{$level->google_drive}}">
                                            </div>
                                            <div class="form-group">
                                                <label>YouTube Playlist</label>
                                                <input type="text" class="form-control" name="specializationYoutube_{{$key + 1}}" placeholder="YouTube url" value="{{$level->youtube_playlist}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                                {{-- <div class="card" data-year="2">
                                    <div class="card-header" role="tab" id="specializationYear_2">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-parent="#specializationYears" href="#year_2"
                                                    aria-expanded="true" aria-controls="year_2">
                                            <div class="icon-week-status">

                                                    <i class="fas fa-plus"></i>
                                                    <i class="fas fa-minus"></i>

                                            </div>
                                                                        
                                            <span>Specialization Year</span>

                                            </button>


                                            <a class="deleteYear_1" id="deleteYear"><i class="fas fa-trash"></i></a>


                                        </h5>
                                    </div>

                                    <div id="year_2" class="collapse show in" role="tabpanel"
                                        aria-labelledby="specializationYear_2">
                                        <div class="card-block">

                                            <div class="form-group selectCourses">
                                                <label>Select Courses</label>
                                                <select class="form-control auto-save form-select-active" name="specializationCourses_1[]" multiple>
                                                    <option value="1">test 1</option>
                                                    <option value="2">test 2</option>                                     
                                                    <option value="3">test 3</option>                                     
                                                    <option value="4">test 4</option>                                     
                                                    <option value="5">test 5</option>                                     
                                                </select>
                                            </div>
                                            <h5>Resources: </h5>
                                            <div class="form-group">
                                                <label>Google Drive</label>
                                                <input type="text" class="form-control" name="specializationDrive_1" placeholder="Google Drive url">
                                            </div>
                                            <div class="form-group">
                                                <label>YouTube Playlist</label>
                                                <input type="text" class="form-control" name="specializationYoutube_1" placeholder="YouTube url">
                                            </div>

                                        </div>
                                    </div>
                                </div> --}}



                                
                            </div>


                            <div class="add-year-button"> 

                                <button class="btn btn-primary" id="addYear">Add Level</button>


                            </div>
                            



                            <div class="form-submit"><button type="submit"
                                    class="btn btn-secondary btn-lg btn-block">Update Specialization</button></div>



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



<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<script type="text/javascript" src="{{asset('admin/js/pages-university/specialization/edit-specialization.js')}}"></script>


@endsection