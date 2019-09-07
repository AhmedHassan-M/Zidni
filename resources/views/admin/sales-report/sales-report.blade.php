@extends('layouts.admin-master')

@section('title', 'Zidni Sales Report')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Sales Report</h2>
                                        <p>This board show you sales report aboiut all courses on the platform</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/sales-report">Sales Report</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="courses-summary" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Total Revenue Summary</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="allCoursesTableContainer">


                                            <div class="container">


                                                <div class="courses-summary-container">


                                                    <div class="courses-summary-item">
    
    
                                                        <h5><span>$</span> 894.24</h5>
                                                        <p>Master's Degree</p>
    
                                                    </div>
    
    
                                                    <div class="courses-summary-item">
    
    
                                                        <h5><span>$</span> 894.24</h5>
                                                        <p>Specialization</p>
    
                                                    </div>
    
    
                                                    <div class="courses-summary-item">
    
    
                                                        <h5><span>$</span> 894.24</h5>
                                                        <p>live Sessions</p>
    
                                                    </div>
    
    
                                                    <div class="courses-summary-item">
    
    
                                                        <h5><span>$</span> 894.24</h5>
                                                        <p>Courses</p>
    
                                                    </div>
    
    
    
                                                    <div class="courses-summary-item">
    
    
                                                        <h5><span>$</span> 894.24</h5>
                                                        <p>Total Revenue</p>
    
                                                    </div>
    
    
                                                </div>
    
    


                                            </div>


                                        </div>
                                    </section>
                                    <!--/ HTML Markup -->


                                    <!-- HTML Markup -->
                                    <section id="salesReportContainer">


                                        <div class="container">

                                            <div class="row">


                                                <div class="col-md-6">

                                                    <div class="salesReportTitle">

                                                        <h4>Master's Degree</h4>

                                                    </div>

                                                    <div class="salesReportBody">

                                                        <div class="salesReportTotal">

                                                            <h5>Total Master's Degrees :</h5>

                                                            <p>- <span>200</span> Master's Degree</p>


                                                        </div>


                                                        <div class="salesReportEnrolment">


                                                            <div class="enrolmentTitle">

                                                                <h5>Enrolment :</h5>

                                                            </div>


                                                            <div class="enrolmentItemContainer">

                                                                <div class="enrolmentItem">

                                                                    <p>Total</p>
    
                                                                    <span>150</span>
    
                                                                </div>
    
                                                                <div class="enrolmentItem">
    
                                                                    <p>Paied</p>
    
                                                                    <span>10</span>
    
                                                                </div>
    
                                                                <div class="enrolmentItem">
    
                                                                    <p>Free</p>
    
                                                                    <span>50</span>
    
                                                                </div>


                                                            </div>



                                                            
                                                        </div>


                                                        <div class="salesReportMoney">

                                                            <h5>Totlal Money :</h5>

                                                            <p>$ <span>223.56</span></p>


                                                        </div>


                                                    </div>


                                                </div>


                                                <div class="col-md-6">

                                                        <div class="salesReportTitle">
    
                                                            <h4>Specialization</h4>
    
                                                        </div>
    
                                                        <div class="salesReportBody">
    
                                                            <div class="salesReportTotal">
    
                                                                <h5>Total Specialization :</h5>
    
                                                                <p>- <span>200</span> Specialization</p>
    
    
                                                            </div>
    
    
                                                            <div class="salesReportEnrolment">
    
    
                                                                <div class="enrolmentTitle">
    
                                                                    <h5>Enrolment :</h5>
    
                                                                </div>
    
    
                                                                <div class="enrolmentItemContainer">
    
                                                                    <div class="enrolmentItem">
    
                                                                        <p>Total</p>
        
                                                                        <span>150</span>
        
                                                                    </div>
        
                                                                    <div class="enrolmentItem">
        
                                                                        <p>Paied</p>
        
                                                                        <span>10</span>
        
                                                                    </div>
        
                                                                    <div class="enrolmentItem">
        
                                                                        <p>Free</p>
        
                                                                        <span>50</span>
        
                                                                    </div>
    
    
                                                                </div>
    
    
    
                                                                
                                                            </div>
    
    
                                                            <div class="salesReportMoney">
    
                                                                <h5>Totlal Money :</h5>
    
                                                                <p>$ <span>223.56</span></p>
    
    
                                                            </div>
    
    
                                                        </div>
    
    
                                                    </div>



                                                    
                                                    <div class="col-md-6">

                                                            <div class="salesReportTitle">

                                                                <h4>Courses</h4>

                                                            </div>

                                                            <div class="salesReportBody">

                                                                <div class="salesReportTotal">

                                                                    <h5>Total Courses :</h5>

                                                                    <p>- <span>200</span> Courses</p>


                                                                </div>


                                                                <div class="salesReportEnrolment">


                                                                    <div class="enrolmentTitle">

                                                                        <h5>Enrolment :</h5>

                                                                    </div>


                                                                    <div class="enrolmentItemContainer">

                                                                        <div class="enrolmentItem">

                                                                            <p>Total</p>

                                                                            <span>150</span>

                                                                        </div>

                                                                        <div class="enrolmentItem">

                                                                            <p>Paied</p>

                                                                            <span>10</span>

                                                                        </div>

                                                                        <div class="enrolmentItem">

                                                                            <p>Free</p>

                                                                            <span>50</span>

                                                                        </div>


                                                                    </div>



                                                                    
                                                                </div>


                                                                <div class="salesReportMoney">

                                                                    <h5>Totlal Money :</h5>

                                                                    <p>$ <span>223.56</span></p>


                                                                </div>


                                                            </div>


                                                        </div>




                                                        <div class="col-md-6">

                                                                <div class="salesReportTitle">
        
                                                                    <h4>live Sessions</h4>
        
                                                                </div>
        
                                                                <div class="salesReportBody">
        
                                                                    <div class="salesReportTotal">
        
                                                                        <h5>Total live Sessions :</h5>
        
                                                                        <p>- <span>200</span> live Sessions</p>
        
        
                                                                    </div>
        
        
                                                                    <div class="salesReportEnrolment">
        
        
                                                                        <div class="enrolmentTitle">
        
                                                                            <h5>Enrolment :</h5>
        
                                                                        </div>
        
        
                                                                        <div class="enrolmentItemContainer">
        
                                                                            <div class="enrolmentItem">
        
                                                                                <p>Total</p>
        
                                                                                <span>150</span>
        
                                                                            </div>
        
                                                                            <div class="enrolmentItem">
        
                                                                                <p>Paied</p>
        
                                                                                <span>10</span>
        
                                                                            </div>
        
                                                                            <div class="enrolmentItem">
        
                                                                                <p>Free</p>
        
                                                                                <span>50</span>
        
                                                                            </div>
        
        
                                                                        </div>
        
        
        
                                                                        
                                                                    </div>
        
        
                                                                    <div class="salesReportMoney">
        
                                                                        <h5>Totlal Money :</h5>
        
                                                                        <p>$ <span>223.56</span></p>
        
        
                                                                    </div>
        
        
                                                                </div>
        
        
                                                            </div>
        
        
                                                        </div>
        
        




                                                </div>

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

{{-- <script type="text/javascript" src="{{asset('admin/js/pages/salesReportPage.js')}}"></script> --}}

@endsection