@extends('layouts.admin-master')

@section('title', 'Zidni University Applicant Profile')


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
                <h2 class="content-header-title">Manage Zidni University Applicant Profile</h2>
                <p>This board show you the Applicant Profile for Zidni University</p>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper col-xs-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/university/home">University Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/admin/all-user">Manage Zidni University Applicant
                                Profile</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">


            <!-- HTML Markup -->
            <section id="html-markup" class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Zidni University Applicant Profile</h4>
                    <a class="btn p-btn-primary" id="convertApplicantToStudent" href="#">Convert Applicant To Student</a>
                </div>
                <div class="card-body collapse in">

                    <div class="container-fluid">

                        <div class="col-md-6">


                            

                            <div class="card applicant-profile-card">

                                    
                                <div class="load-card-box"></div>

                                <img class="card-img-top" src="{{asset('images/university.jpg')}}" width="100%"
                                    height="150">

                                <div class="applicant-profile-img">
                                    @if($application->has('user'))
                                    @if(!empty($application->user->photo))
                                    <img class="" src="{{asset('image/$application->user->photo')}}">
                                    @elseif(!empty($application->user->social_photo))
                                    <img class="" src="{{$application->user->social_photo}}">
                                    @else
                                    <img class="" src="{{asset('images/user.png')}}">
                                    @endif
                                    @else
                                    <img class="" src="{{asset('images/user.png')}}">
                                    @endif


                                </div>


                                <div class="card-block">
                                    <h4 class="card-title">@if($application->has('user')){{$application->user->full_name}}@endif</h4>

                                    <table class="table-fill">
                                        <tbody class="table-hover">

                                            <th colspan="2" scope="colgroup">Contact Information</th>


                                            <tr>
                                                <td class="text-left">E-Mail</td>
                                                
                                                <td class="text-left">@if($application->has('user')){{$application->user->email}}@endif</td>
                                                
                                            </tr>
                                            <tr>
                                                <td class="text-left">Phone Number</td>
                                                <td class="text-left">{{$application->full_phone}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">TimeZone</td>
                                                <td class="text-left">{{$application->timezone}}</td>
                                            </tr>


                                            <th colspan="2" scope="colgroup">Personal Information</th>


                                            <tr>
                                                <td class="text-left">Passport Number</td>
                                                <td class="text-left">{{$application->passport}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Full Name In Latin</td>
                                                <td class="text-left">{{$application->passport_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Full Name In Arabic</td>
                                                <td class="text-left">{{$application->name_ar}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">BrithDay</td>
                                                <td class="text-left">{{$application->birth_date}}</td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Citizenship</td>
                                                <td class="text-left">{{$application->citizenship}}</td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Marital Status</td>
                                                <td class="text-left">{{$application->marital_status}}</td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">Gender</td>
                                                <td class="text-left">{{$application->gender}}</td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Country</td>
                                                <td class="text-left">{{$application->country}}</td>
                                            </tr>

                                            <th colspan="2" scope="colgroup">Occupation & Education</th>



                                            <tr>
                                                <td class="text-left">Current Employment</td>
                                                <td class="text-left">{{$application->employment}}</td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Certificate Name</td>
                                                <td class="text-left">{{$application->certificate}}</td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Graduation Year</td>
                                                <td class="text-left">{{$application->graduate_year}}</td>
                                            </tr>


                                            <tr>
                                                <td class="text-left">Specialization</td>
                                                <td class="text-left">@if($application->has('specialization')->exists()){{$application->specialization->name}}@endif</td>
                                            </tr>
                                            
                                            @if($application->has('document')->exists())

                                            <th colspan="2" scope="colgroup">Applicant Documents</th>


                                            <tr>
                                                <td class="text-left">{{$application->document->file1}}</td>
                                                <td class="text-center">

                                                    <a href="/uploads/files/{{$application->document->file1}}" class="btn btn-secondary" target="_blank" download>Review Document</a>


                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">{{$application->document->file2}}</td>
                                                <td class="text-center">

                                                    <a href="/uploads/files/{{$application->document->file2}}" class="btn btn-secondary" target="_blank" download>Review Document</a>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">{{$application->document->file3}}</td>
                                                <td class="text-center">

                                                    <a href="/uploads/files/{{$application->document->file3}}" class="btn btn-secondary" target="_blank" download>Review Document</a>

                                                </td>
                                            </tr>

                                            @endif
                                            @if($application->step == 3)

                                            <th colspan="2" scope="colgroup">Payment Status</th>

                                            <tr>
                                                <td class="text-left">Payment Status</td>
                                                <td class="text-left">Uncompleted</td>
                                            </tr>

                                            @endif

                                        </tbody>
                                    </table>


                                </div>
                            </div>


                        </div>



                        <div class="col-md-6">


                            <div class="card admin-action-card">

                                <div class="load-card-box"></div>

                                <h3 class="card-header">Update Applicant Status</h3>
                                <div class="card-block">

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


                                    <form method="POST" id="applicantActionsForm">

                                        {{ csrf_field() }}

                                        {{-- STEP 1 --}}
                                        @if($application->step <= 1)

                                        <div class="form-title">

                                            <h4>Step 1 ( Online Documents )</h4>

                                        </div>


                                        {{-- ONLINE --}}

                                            <div class="form-group select-input-container">
                                                    <label for="applicantOnlineDocumentsStatus">Online Documents Status</label>
                                                    <select class="form-control select-int-nosearch" id="applicantOnlineDocumentsStatus" name="applicantOnlineDocumentsStatus">
                                                        <option value="">Select Online Documents Status</option>
                                                        <option value="completed">Completed</option>
                                                        <option value="request-documents">Request Online Documents</option>
                                                        <option value="rejected-applicant">Reject Applicant</option>

                                                        
                                                    </select>
                                            </div>


                                            {{-- Completed Online Documents --}}

                                            <div class="form-group" id="applicantCompletedOnlineDocumentsContainer">
                                                <label for="applicantCompletedOnlineDocuments">Completed Online Documents</label>
                                                <textarea class="form-control" id="applicantCompletedOnlineDocuments" name="applicantCompletedOnlineDocuments" rows="7"></textarea>
                                            </div>


                                            {{-- Required Online Documents --}}

                                            <div class="form-group" id="applicantRequiredOnlineDocumentsContainer">
                                                <label for="applicantRequiredOnlineDocuments">Required Online Documents</label>
                                                <textarea class="form-control" id="applicantRequiredOnlineDocuments" name="applicantRequiredOnlineDocuments" rows="7"></textarea>
                                            </div>


                                            {{-- Reject Online Documents --}}


                                            <div class="form-group" id="applicantRejectOnlineDocumentsContainer">
                                                <label for="applicantRejectOnlineDocuments">Reject Online Documents</label>
                                                <textarea class="form-control" id="applicantRejectOnlineDocuments" name="applicantRejectOnlineDocuments" rows="7"></textarea>
                                            </div>


                                        @elseif($application->step == 2)



                                        <div class="form-title">

                                            <h4>Step 2 ( Offline Documents )</h4>
    
                                        </div>


                                        {{-- OFFLINE --}}

                                        <div class="form-group select-input-container">
                                                <label for="applicantOfflineDocumentsStatus">Documents Offline Status</label>
                                                <select class="form-control select-int-nosearch" id="applicantOfflineDocumentsStatus" name="applicantOfflineDocumentsStatus">
                                                    <option value="">Select Offline Documents Status</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="request-documents">Request Offline Documents</option>
                                                    <option value="rejected-applicant">Reject Applicant</option>
                                                </select>
                                        </div>



                                        {{-- Completed Online Documents --}}

                                        <div class="form-group" id="applicantCompletedOfflineDocumentsContainer">
                                            <label for="applicantCompletedOfflineDocuments">Completed Offline Documents</label>
                                            <textarea class="form-control" id="applicantCompletedOfflineDocuments" name="applicantCompletedOfflineDocuments" rows="7"></textarea>
                                        </div>
                                            


                                        {{-- Required Offline Documents --}}


                                        <div class="form-group" id="applicantRequiredOfflineDocumentsContainer">
                                            <label for="applicantRequiredOfflineDocuments">Required Offline Documents</label>
                                            <textarea class="form-control" id="applicantRequiredOfflineDocuments" name="applicantRequiredOfflineDocuments" rows="7"></textarea>
                                        </div>


                                        {{-- Reject Offline Documents --}}


                                        <div class="form-group" id="applicantRejectOfflineDocumentsContainer">
                                            <label for="applicantRejectOfflineDocuments">Reject Offline Documents</label>
                                            <textarea class="form-control" id="applicantRejectOfflineDocuments" name="applicantRejectOfflineDocuments" rows="7"></textarea>
                                        </div>

                                        @elseif($application->step == 3)


                                        <div class="form-title">

                                            <h4>Step 3 ( Payment )</h4>
    
                                        </div>
    

                                        {{-- Payment Status --}}

                                        <div class="form-group select-input-container">
                                                <label for="applicantPaymentStatus">Payment Status</label>
                                                <select class="form-control select-int-nosearch" id="applicantPaymentStatus" name="applicantPaymentStatus">
                                                    <option value="">Select Payment Status</option>
                                                    <option value="completed">Completed</option>
                                                    <option value="rejected-applicant">Rejected</option>

                                                </select>
                                        </div>



                                        <div class="form-group" id="applicantCompletedPaymentContainer">
                                            <label for="applicantCompletedPayment">Completed Payment</label>
                                            <textarea class="form-control" id="applicantCompletedPayment" name="applicantCompletedPayment" rows="7"></textarea>
                                        </div>


                                        <div class="form-group" id="applicantRejectPaymentContainer">
                                            <label for="applicantRejectPayment">Reject Payment</label>
                                            <textarea class="form-control" id="applicantRejectPayment" name="applicantRejectPayment" rows="7"></textarea>
                                        </div>

                                        @endif


                                        <div class="form-submit"><button type="submit" class="btn btn-secondary btn-lg btn-block">Update Applicant Status</button></div>



                                    </form>




                                </div>
                            </div>


                            <div class="card applicant-activity-log">    
                                    <div class="card-block">
                                        <table class="table-fill">
                                            <tbody class="table-hover">
    
                                                <th colspan="2" scope="colgroup">Activity Log</th>
    
                                                @foreach($application->activity as $activity)
                                                <tr>
                                                    <td class="text-left">{{date("d/m/Y", strtotime($activity->created_at))}}</td>
                                                    <td class="text-left">{{$activity->activity}}</td>
                                                </tr>
                                                @endforeach
    
    
    
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
<script type="text/javascript" src="{{asset('admin/js/pages-university/applicant/applicant-profile.js')}}"></script>


@endsection