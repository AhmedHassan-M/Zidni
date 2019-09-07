



$(window).on("load", function() {

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#column-chart");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },

        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: false
        }
    };

    // Chart Data
    var chartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: "Courses",
            data: [65, 59, 80, 81, 56, 65, 59, 80, 81, 56, 300, 500],
            backgroundColor: "#01273F",
            hoverBackgroundColor: "rgb(1, 39, 63, 0.9)",
            borderColor: "transparent"
        }, {
            label: "Master's Degree",
            data: [28, 48, 40, 19, 86, 81, 56, 65, 59, 80, 81, 56, 100],
            backgroundColor: "#f1dd7e",
            hoverBackgroundColor: "rgb(241,221,126, 0.9)",
            borderColor: "transparent"
        }, {
            label: "Specializations",
            data: [56, 28, 94, 33, 44, 12, 98, 250, 67, 300, 70, 90, 60],
            backgroundColor: "#d6632c",
            hoverBackgroundColor: "rgba(214, 99, 44, 0.9)",
            borderColor: "transparent"
        }
    
    
        ]
    };

    var config = {
        type: 'bar',

        // Chart Options
        options: chartOptions,

        data: chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);




    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
          labels: ["Courses", "Master's Degree", "Specializations"],
          datasets: [
            {
              backgroundColor: ["#01273F", "#f1dd7e","#d6632c"],
              data: [2478,5267,3000]
            }
          ]
        },
        options: {
            legend: {
                display: false
            }
        }
    });
    
    
    
    new Chart(document.getElementById("bar-chart-horizontal"), {
        type: 'horizontalBar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [
            {
              backgroundColor: ["#01273F", "#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F","#01273F"],
              data: [2478,5267,734,784,433,2478,5267,734,784,433,500,900]
            }
          ]
        },
        options: {
            legend: {
                display: false
            }
        }
    });

});




