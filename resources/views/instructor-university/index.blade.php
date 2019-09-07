@extends('layouts.instructor-master')

@section('title', 'Zidni Instructor')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">

                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Overview</h2>
                                        <p>This board give you easy access to the most important sections</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item active"><a href="index.html">Dashboard</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">

                                    <!-- HTML Markup -->
                                    <section class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Activity</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in">

                                            <div class="card-block">
                                                <canvas id="column-chart" height="350"></canvas>
                                            </div>
            
                                        </div>
                                    </section>
                                    <!--/ HTML Markup -->



                                    <div class="row">
                                            <div class="col-xl-3 col-lg-6 col-xs-12">
                                                <div class="card statistics">
                                                    <div class="card-body">
                                                        <div class="card-block">
                                                            <div class="media">
                                                                <div class="media-body text-xs-left">
                                                                    <h3 class="statistics-counter">0</h3>
                                                                    <span class="statistics-title">--</span>
                                                                </div>
                                                                <div class="media-right media-middle">
                                                                    <i class="fas fa-users font-large-2 float-xs-right"></i>
                                                                </div>

                                                                <div class="statistics-link">

                                                                    <a href="/admin/all-users">--</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-xs-12">
                                                <div class="card statistics">
                                                    <div class="card-body">
                                                        <div class="card-block">
                                                            <div class="media">
                                                                <div class="media-body text-xs-left">
                                                                    <h3 class="statistics-counter">0</h3>
                                                                    <span class="statistics-title">--</span>
                                                                </div>
                                                                <div class="media-right media-middle">
                                                                    <i class="fas fa-desktop font-large-2 float-xs-right"></i>
                                                                </div>

                                                                <div class="statistics-link">

                                                                    <a href="/admin/all-courses">--</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-xs-12">
                                                <div class="card statistics">
                                                    <div class="card-body">
                                                        <div class="card-block">
                                                            <div class="media">
                                                                <div class="media-body text-xs-left">
                                                                    <h3 class="statistics-counter">00</h3>
                                                                    <span class="statistics-title">--</span>
                                                                </div>
                                                                <div class="media-right media-middle">
                                                                    <i class="fas fa-question-circle font-large-2 float-xs-right"></i>
                                                                </div>

                                                                <div class="statistics-link">

                                                                    <a href="/admin/all-quizzes">--</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-xs-12">
                                                <div class="card statistics">
                                                    <div class="card-body">
                                                        <div class="card-block">
                                                            <div class="media">
                                                                <div class="media-body text-xs-left">
                                                                    <h3 class="statistics-counter">00</h3>
                                                                    <span class="statistics-title">--</span>
                                                                </div>
                                                                <div class="media-right media-middle">
                                                                    <i class="fas fa-inbox font-large-2 float-xs-right"></i>
                                                                </div>

                                                                <div class="statistics-link">

                                                                    <a href="/admin/subscribe-inbox">--</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    <section id="chart-two" class="">

                                        <div class="row">


                                                <div class="col-xl-6 col-lg-12">
                                                        <div class="card">
                                
                                                            <div class="card-header">
                                                                <h4 class="card-title">--</h4>
                                                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                                <div class="heading-elements">
                                                                    <ul class="list-inline mb-0">
                                                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                
                                                            <div class="card-body">
                                
                                
                                
                                                                <div class="card-block">
                                                                    <canvas id="doughnut-chart" width="800" height="700"></canvas>
                                                                </div>
        
        
                                
                                                            </div>
                                                        </div>
                                                    </div>
        
        
        
                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="card">
                                
                                                            <div class="card-header">
                                                                <h4 class="card-title">--</h4>
                                                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                                                <div class="heading-elements">
                                                                    <ul class="list-inline mb-0">
                                                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                
                                                            <div class="card-body">
                                
                                
                                
                                                                <div class="card-block">
        
                                                                        <canvas id="bar-chart-horizontal" width="800" height="700"></canvas>
        
                                                                </div>
        
        
                                
                                                            </div>
                                                        </div>
                                                    </div>
                                
                                


                                        </div>

                        
                                        </section>
                        


                                </div>
                            </div>
                        </div>
                        <!-- ////////////////////////////////////////////////////////////////////////////-->
                    
                    
                        <!-- END MAIN CONTENT -->




@endsection




@section('scripts')


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script type="text/javascript">



// $(window).on("load", function() {


//     var ctx = $("#column-chart");

//     var chartOptions = {
//         elements: {
//             rectangle: {
//                 borderWidth: 2,
//                 borderColor: 'rgb(0, 255, 0)',
//                 borderSkipped: 'bottom'
//             }
//     },

//     responsive: true,
//     maintainAspectRatio: false,
//     responsiveAnimationDuration: 500,
//     legend: {
//         position: 'top',
//     },
//     scales: {
//         xAxes: [{
//             display: true,
//             gridLines: {
//                 color: "#f3f3f3",
//                 drawTicks: false,
//             },
//             scaleLabel: {
//                 display: true,
//             }
//         }],
//         yAxes: [{
//             display: true,
//             gridLines: {
//                 color: "#f3f3f3",
//                 drawTicks: false,
//             },
//             scaleLabel: {
//                 display: true,
//             }
//         }]
//     },
//     title: {
//         display: false
//     }
// };

// // Chart Data
// var chartData = {
//     labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
//     datasets: [{
//         label: "Courses",
//         data: coursesActivity,
//         backgroundColor: "#01273F",
//         hoverBackgroundColor: "rgb(1, 39, 63, 0.9)",
//         borderColor: "transparent"
//     }, {
//         label: "Master's Degree",
//         data: mastersActivity,
//         backgroundColor: "#f1dd7e",
//         hoverBackgroundColor: "rgb(241,221,126, 0.9)",
//         borderColor: "transparent"
//     }, {
//         label: "Specializations",
//         data: specsActivity,
//         backgroundColor: "#d6632c",
//         hoverBackgroundColor: "rgba(214, 99, 44, 0.9)",
//         borderColor: "transparent"
//     }


//     ]
// };

// var config = {
//     type: 'bar',

//     // Chart Options
//     options: chartOptions,

//     data: chartData
// };

// // Create the chart
// var lineChart = new Chart(ctx, config);




// new Chart(document.getElementById("doughnut-chart"), {
//     type: 'doughnut',
//     data: {
//       labels: ["Courses", "Master's Degree", "Specializations"],
//       datasets: [
//         {
//           backgroundColor: ["#01273F", "#f1dd7e","#d6632c"],
//           data: [coursesNo,mastersNo,specializationsNo]
//         }
//       ]
//     },
//     options: {
//         legend: {
//             display: false
//         }
//     }
// });



// new Chart(document.getElementById("bar-chart-horizontal"), {
//     type: 'horizontalBar',
//     data: {
//         labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
//         datasets: [
//         {
//           backgroundColor: ["#01273F", "#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F"],
//           data: usersTracking
//         }
//       ]
//     },
//     options: {
//         legend: {
//             display: false
//         }
//     }
// });

// });









</script>


@endsection

