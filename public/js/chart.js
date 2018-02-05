/*!
 * Start Bootstrap - SB Admin v4.0.0-beta.2 (https://startbootstrap.com/template-overviews/sb-admin)
 * Copyright 2013-2017 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
 */

Chart.defaults.global.defaultFontFamily='-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
Chart.defaults.global.defaultFontColor="#292b2c";
var ctx=document.getElementById("myAreaChart"),
myLineChart=new Chart(ctx, {
    type:"line", data: {
        labels:["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7"], datasets:[ {
            label: "Sessions",
            lineTension: .3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 7,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 20,
            pointBorderWidth: 2,
            data: [1,2,3,4,5,6,7]
        }
        ]
    }
    , options: {
        scales: {
            xAxes:[ {
                time: {
                    unit: "date"
                }
                , gridLines: {
                    display: !1
                }
                , ticks: {
                    maxTicksLimit: 7
                }
            }
            ], yAxes:[ {
                ticks: {
                    
                }
                , gridLines: {
                    color: "rgba(0, 0, 0, .125)"
                }
            }
            ]
        }
        , legend: {
            display: !1
        }
    }
}

);