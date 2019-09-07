@extends('layouts.admin-master')

@section('title', 'Zidni Add Specialization')


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
                <h2 class="content-header-title">Manage Zidni University Add Specialization</h2>
                <p>This board show add specialization for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Add
                                Specialization</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Zidni University Add Specialization</h4>
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


                            <div class="form-group">
                                <label for="specializationName">Specialization Name</label>
                                <input type="text" class="form-control" id="specializationName"
                                    placeholder="Specialization Name" name="specializationName">
                            </div>


                            <div class="form-group">
                                <label for="specializationDescription">Specialization Description</label>
                                <textarea class="form-control" id="specializationDescription"
                                    name="specializationDescription" rows="5" placeholder="Specialization Description"></textarea>
                            </div>



                            <div class="form-group">
                                <label for="specializationDescription">Price</label>
                                <table id="price_table" class="table table-bordered w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">Plus <i class="fa fa-plus"></i></th>
                                            <th scope="col">Minus <i class="fa fa-minus"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="price-item">
                                                    <input type="text" class="form-control" name="plus_item_name_1" placeholder="Item Name">
                                                    <input type="number" class="form-control" name="plus_item_amount_1" min="0" placeholder="50">
                                                    <div>
                                                        <button type="button" class="btn price-btn plus"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="btn price-btn minus"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="price-item">
                                                    <input type="text" class="form-control" name="plus_item_name_1" placeholder="Item Name">
                                                    <input type="number" class="form-control" name="plus_item_amount_1" min="0" placeholder="50">
                                                    <div>
                                                        <button type="button" class="btn price-btn plus"><i class="fa fa-plus"></i></button>
                                                        <button type="button" class="btn price-btn minus"><i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                            <div id="specializationYears" role="tablist" aria-multiselectable="true">


                                <div class="card" data-year="1">
                                    <div class="card-header" role="tab" id="specializationYear_1">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-parent="#specializationYears" href="#year_1"
                                                    aria-expanded="true" aria-controls="year_1">
                                            <div class="icon-week-status">

                                                    <i class="fas fa-plus"></i>
                                                    <i class="fas fa-minus"></i>

                                            </div>
                                                                        
                                            <span>Specialization Level</span>

                                            </button>

                                        </h5>
                                    </div>

                                    <div id="year_1" class="collapse show in" role="tabpanel"
                                        aria-labelledby="specializationYear_1">
                                        <div class="card-block">

                                                <!-- <div class="form-group">

                                                    <label>Semester 1</label>
                                                    <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="specializationSemester_1[]"/>

                                                </div>


                                                <div class="form-group">

                                                    <label>Semester 2</label>
                                                    <input type="text" class="form-control daterange_1" placeholder="Select Start & End Date" name="specializationSemester_1[]"/>

                                                </div> -->

                                                <div class="form-group selectCourses">
                                                    <label>Select Courses</label>
                                                    <select class="form-control auto-save form-select-active" name="specializationCourses_1[]" multiple>
                                                        @foreach($subjects as $subject)
                                                        <option value="{{$subject->id}}">{{$subject->name}}</option> 
                                                        @endforeach                                  
                                                    </select>
                                                </div>
    

                                        </div>
                                    </div>
                                </div>

                                
                            </div>


                            <div class="add-year-button"> 

                                <button type="submit" class="btn btn-primary" id="addYear">Add Level</button>


                            </div>
                            



                            <div class="form-submit"><button type="submit"
                                    class="btn btn-secondary btn-lg btn-block">Create Specialization</button></div>



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

<script type="text/javascript" src="{{asset('admin/js/pages-university/specialization/add-specialization.js')}}"></script>


@endsection