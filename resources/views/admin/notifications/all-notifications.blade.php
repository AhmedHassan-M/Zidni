@extends('layouts.admin-master')

@section('title', 'Zidni Admin All Notifications')


@section('links')

@endsection



@section('content')



    <!-- START MAIN CONTENT -->




                        <!-- START MAIN CONTENT -->
                
                
                        <div class="app-content content container-fluid">
                                <div class="content-wrapper">
                                    <div class="content-header row">
                                        <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                            <h2 class="content-header-title">All Notifications</h2>
                                            <p>See All Notifications</p>
                                        </div>
                                        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                            <div class="breadcrumb-wrapper col-xs-12">
                                                <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                        <li class="breadcrumb-item"><a href="/admin/all-notification">All Notifications</a></li>
                                            
    
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-body">
                        
                        
                                        <!-- HTML Markup -->
                                        <section id="html-markup" class="card all-notifications-content">
                                            <div class="card-body collapse in">

                                                    <div class="all-notifications-data">

                                                            <ul>
                            
                            
                                                            {{-- For Demo Only --}}
                            
                            
                                                            @foreach ($adminNotifications as $adminNotification)
                            
                                                                    <li>
                            
                                                                        <a class="notifications-link" href="{{$adminNotification->link}}">

                                                                            <div class="notifications-container">
                                                            
                                                                                <div class="notifications-img">
                                                            
                                                                                        @if($adminNotification->title == "Contact-Us Message")

                                                                                        <i class="fas fa-envelope"></i>
                                
                                                                                        @elseif($adminNotification->title == "Registration")
                                
                                                                                        <i class="fas fa-user"></i> 
                                
                                                                                        @elseif($adminNotification->title == "Course Enrollment")
                                
                                                                                        <i class="fas fa-user-graduate"></i>
                                                                                        
                                                                                        @elseif($adminNotification->title == "Specialization Enrollment")
                                
                                                                                        <i class="fas fa-user-graduate"></i>
                                                                                        
                                                                                        @elseif($adminNotification->title == "Master-Degree Enrollment")
                                
                                                                                        <i class="fas fa-user-graduate"></i>
                                
                                                                                        @endif
                                                                                        
                                                                                        
                                                                                </div>
                                                            
                                                                                <div class="notifications-info">
                                                            
                                                                                    <p>{{$adminNotification->title}}</p>
                                                                                    <h4>{{$adminNotification->text}}</h4>
                                                                                    <?php $date = strtotime($adminNotification->created_at); ?>
                                                                                    <span>{{date("d/m/Y",$date)}}</span>
                                                            
                                                                                </div>                              
                                                                            </div>
                            
                                                                        </a>
                            
                                                                    </li>
                            
                            
                                                            @endforeach
                            
                            
                            
                                                            </ul>
                            
                            
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


@endsection