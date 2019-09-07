@extends('layouts.admin-master')

@section('title', 'Zidni Current Registration Year')


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
                <h2 class="content-header-title">Manage Zidni University Current Year</h2>
                <p>This board show current registration year for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Current Registration Year</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Zidni University Current Registration Year</h4>
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

                        @if(session()->has('failure'))
                            <div class="alert alert-danger">
                                {{ session()->get('failure') }}
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <form method="POST" class="university-form-style" id="addSpecializationForm">
                            {{ csrf_field() }}

                            <input name="current_year" type="hidden" value="@if(isset($currentYear)){{$currentYear->id}}@endif">

                            <div class="form-group">
                                <label for="yearName">Year Name</label>
                                <input type="text" class="form-control" id="yearName"
                                    placeholder="ex: 2019 - 2020" name="yearName" value="@if(old('yearName')){{old('yearName')}}@elseif(isset($currentYear)){{$currentYear->name}}@endif{{old('yearName')}}">
                            </div>


                            <div class="form-group">
                                <label for="yearDescription">Year Description</label>
                                <textarea class="form-control" id="yearDescription"
                                    name="yearDescription" rows="5" placeholder="Year Description">@if(old('yearDescription')){{old('yearDescription')}}@elseif(isset($currentYear)){{$currentYear->description}}@endif{{old('yearDescription')}}</textarea>
                            </div>

                            <h5>1st Semester</h5>

                            <!--
                                ::::INSTRUCTIONS::::
                                => at a certain time, the admin will not be able to change the dates of the semester so they have to be disabled (just add "disabled" attribute)
                            -->

                            <div class="form-group">
                                <label>1st Semester (Start - End)</label>
                                <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="currentYearSemester_1" value="@if(old('currentYearSemester_1')){{old('currentYearSemester_1')}}@elseif(isset($currentYear)){{date('m/d/Y' , strtotime($currentYear->semester_one_start))}} - {{date('m/d/Y' , strtotime($currentYear->semester_one_end))}}@endif"/>
                            </div>

                            <div class="form-group">
                                <label>Application for 1st Semester (Start - End)</label>
                                <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="currentYearApplicationSemester_1" value="@if(old('currentYearApplicationSemester_1')){{old('currentYearApplicationSemester_1')}}@elseif(isset($currentYear)){{date('m/d/Y' , strtotime($currentYear->semester_one_app_start))}} - {{date('m/d/Y' , strtotime($currentYear->semester_one_app_end))}}@endif"/>
                            </div>

                            <div class="form-group">
                                <label>1st Semester Exams (Start - End)</label>
                                <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="currentYearExamsSemester_1" value="@if(old('currentYearExamsSemester_1')){{old('currentYearExamsSemester_1')}}@elseif(isset($currentYear)){{date('m/d/Y' , strtotime($currentYear->semester_one_exam_start))}} - {{date('m/d/Y' , strtotime($currentYear->semester_one_exam_end))}}@endif{{old('currentYearExamsSemester_1')}}"/>
                            </div>

                            <h5>2nd Semester</h5>

                            <div class="form-group">
                                <label>2nd Semester (Start - End)</label>
                                <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="currentYearSemester_2" value="@if(old('currentYearSemester_2')){{old('currentYearSemester_2')}}@elseif(isset($currentYear)){{date('m/d/Y' , strtotime($currentYear->semester_two_start))}} - {{date('m/d/Y' , strtotime($currentYear->semester_two_end))}}@endif{{old('currentYearSemester_2')}}"/>
                            </div>

                            <div class="form-group">
                                <label>Application for 2nd Semester (Start - End)</label>
                                <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="currentYearApplicationSemester_2" value="@if(old('currentYearApplicationSemester_2')){{old('currentYearApplicationSemester_2')}}@elseif(isset($currentYear)){{date('m/d/Y' , strtotime($currentYear->semester_two_app_start))}} - {{date('m/d/Y' , strtotime($currentYear->semester_two_app_end))}}@endif{{old('currentYearApplicationSemester_2')}}"/>
                            </div>

                            <div class="form-group">
                                <label>2nd Semester Exams (Start - End)</label>
                                <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="currentYearExamsSemester_2" value="@if(old('currentYearExamsSemester_2')){{old('currentYearExamsSemester_2')}}@elseif(isset($currentYear)){{date('m/d/Y' , strtotime($currentYear->semester_two_exam_start))}} - {{date('m/d/Y' , strtotime($currentYear->semester_two_exam_end))}}@endif{{old('currentYearExamsSemester_2')}}"/>
                            </div>

                            <div class="form-submit"><button type="submit" class="btn btn-secondary btn-lg btn-block">Save Registration Year</button></div>
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

<script type="text/javascript" src="{{asset('admin/js/pages-university/registration-year/current-year.js')}}"></script>


@endsection