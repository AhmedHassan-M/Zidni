@extends('layouts.admin-master')

@section('title', 'Zidni University Student Profile')


@section('links')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<style>
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    @media (max-width: 670px) {
        .card-header {
            flex-direction: column;
        }
    }
    .card-header::after {
        display: none;
    }
</style>


@endsection



@section('content')



<!-- START MAIN CONTENT -->


<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <h2 class="content-header-title">Manage Zidni University Student Profile</h2>
                <p>This board show you the Student Profile for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Student
                                Profile</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Zidni University Student Profile</h4>
                    <a class="btn p-btn-secondary" href="/admin/university/edit-student">Edit Student Data</a>
                </div>
                <div class="card-body collapse in">

                    <div class="container-fluid">

                        <div class="col-md-6">


                            

                            <div class="card applicant-profile-card">

                                    
                                <div class="load-card-box"></div>

                                <img class="card-img-top" src="{{asset('images/university.jpg')}}" width="100%"
                                    height="150">

                                <div class="applicant-profile-img">


                                    <img class="" src="{{asset('images/user.png')}}">



                                </div>


                                <div class="card-block">
                                    <h4 class="card-title">John Doe</h4>

                                    <table class="table-fill">
                                        <tbody class="table-hover">

                                            <th colspan="2" scope="colgroup">Contact Information</th>


                                            <tr>
                                                <td class="text-left">E-Mail</td>
                                                <td class="text-left">John@doe.com</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Phone Number</td>
                                                <td class="text-left">0123456789</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">TimeZone</td>
                                                <td class="text-left">test</td>
                                            </tr>


                                            <th colspan="2" scope="colgroup">Personal Information</th>


                                            <tr>
                                                <td class="text-left">Passport Number</td>
                                                <td class="text-left">67235478234872634</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Full Name In Latin</td>
                                                <td class="text-left">John Doe</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Full Name In Arabic</td>
                                                <td class="text-left">إسم مجهول</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">BrithDay</td>
                                                <td class="text-left">day/month/year</td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Citizenship</td>
                                                <td class="text-left">Test</td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Marital Status</td>
                                                <td class="text-left">Test</td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Gender</td>
                                                <td class="text-left">Test</td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Country</td>
                                                <td class="text-left">Test</td>
                                            </tr>

                                            <th colspan="2" scope="colgroup">Occupation & Education</th>



                                            <tr>
                                                <td class="text-left">Current Employment</td>
                                                <td class="text-left">Test</td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Certificate Name</td>
                                                <td class="text-left">Test</td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Graduation Year</td>
                                                <td class="text-left">2019</td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Specialization</td>
                                                <td class="text-left">Test</td>
                                            </tr>


                                            <th colspan="2" scope="colgroup">Applicant Documents</th>


                                            <tr>
                                                <td class="text-left">Documents Name</td>
                                                <td class="text-center">

                                               <a href="/admin/university/applicant-profile" class="btn btn-secondary" target="_blank">Review Document</a>


                                                </td>
                                            </tr>




                                            <tr>
                                                <td class="text-left">Documents Name</td>
                                                <td class="text-center">

                                                        <a href="/admin/university/applicant-profile" class="btn btn-secondary" target="_blank">Review Document</a>

                                                </td>
                                            </tr>



                                            <th colspan="2" scope="colgroup">Payment Status</th>

                                            <tr>
                                                <td class="text-left">Payment Status</td>
                                                <td class="text-left">Uncompleted</td>
                                            </tr>



                                        </tbody>
                                    </table>


                                </div>
                            </div>


                        </div>



                        <div class="col-md-6">

                            <div class="card applicant-activity-log">    
                                    <div class="card-block">
                                        <table class="table-fill">
                                            <tbody class="table-hover">
    
                                                <th colspan="2" scope="colgroup">Activity Log</th>
    
    
                                                <tr>
                                                    <td class="text-left">1/1/2019</td>
                                                    <td class="text-left">Action</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">1/1/2019</td>
                                                    <td class="text-left">Action</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">1/1/2019</td>
                                                    <td class="text-left">Action</td>
                                                </tr>

    
    
    
                                            </tbody>
                                        </table>
    
    
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript" src="{{asset('admin/js/pages-university/manage-student/student-profile.js')}}"></script>


@endsection