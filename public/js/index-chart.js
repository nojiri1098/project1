$(function () {
    'use strict'

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode      = 'index'
    var intersect = true

    var $salesChart = $('#sales-chart')
    var salesChart  = new Chart($salesChart, {
        type   : 'bar',
        data   : {
            labels  : ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    backgroundColor: '#007bff',
                    borderColor    : '#007bff',
                    data           : [1000, 2000, 3000, 2500, 2700, 2500, 3000]
                },
                {
                    backgroundColor: '#ced4da',
                    borderColor    : '#ced4da',
                    data           : [700, 1700, 2700, 2000, 1800, 1500, 2000]
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips           : {
                mode     : mode,
                intersect: intersect
            },
            hover              : {
                mode     : mode,
                intersect: intersect
            },
            legend             : {
                display: false
            },
            scales             : {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display      : true,
                        lineWidth    : '4px',
                        color        : 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks    : $.extend({
                        beginAtZero: true,

                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }
                            return '$' + value
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display  : true,
                    gridLines: {
                        display: false
                    },
                    ticks    : ticksStyle
                }]
            }
        }
    })


    var count = document.getElementById('temperature-count').value
    var temperatures = new Array();
    for (var i = 0;i < count;i++) {
        temperatures.push(document.getElementById('temperature-' + i).value);
    }
    temperatures.reverse();

    var temperature_label = new Array();
    for (var i = 0;i < count;i++) {
        if (i != 143) {
            temperature_label.push("-" + (143 - i) + "m");
        } else {
            temperature_label.push("0h");
        }
    }

    var $temperatureChart = $('#temperature-chart')
    var temperatureChart  = new Chart($temperatureChart, {
        data   : {

            labels  : temperature_label,
            datasets: [{
                type                : 'line',
                data                : temperatures,
                backgroundColor     : 'transparent',
                borderColor         : '#007bff',
                fill                : false,
                pointRadius         : 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            tooltips           : {
                mode     : false,
                intersect: intersect
            },
            hover              : {
                mode     : false,
                intersect: intersect
            },
            legend             : {
                display: false
            },
            scales             : {
                xAxes: [{
                    display  : true,
                    gridLines: {
                        display: false
                    },
                    ticks    : ticksStyle
                }],
                // xAxes : [{
                //     gridLines:{
                //         color: "#5f5f5f",
                //     },
                //     type: 'linear',
                //     ticks: {
                //         //callback: function(value) {return ((value % 18) == 0)? (144-value)/6+'h' : ''},
                //         min: 0,
                //         max: 24,
                //         stepSize: 1,
                //         fontSize: 15,
                //     }
                // }],
                yAxes : [{
                    gridLines:{
                        color: "#5f5f5f",
                    },

                    ticks: {
                        fontSize: 15,
                    }
                }]

            }
        }
    })

    var count = document.getElementById('humidity-count').value
    var humidities = new Array();
    for (var i = 0;i < count;i++) {
        humidities.push(document.getElementById('humidity-' + i).value);
    }
    humidities.reverse();

    var humidity_label = new Array();
    for (var i = 0;i < count;i++) {
        if (i != 143) {
            humidity_label.push("-" + (143 - i) + "m");
        } else {
            humidity_label.push("0h");
        }
    }

    var $humidityChart = $('#humidity-chart')
    var humidityChart  = new Chart($humidityChart, {
        data   : {
            labels  : humidity_label,
            datasets: [{
                type                : 'line',
                data                : humidities,
                backgroundColor     : 'tansparent',
                borderColor         : '#ced4da',
                pointBorderColor    : '#ced4da',
                pointBackgroundColor: '#ced4da',
                fill                : false
            }]
        },
        options: {
            maintainAspectRatio: false,
            tooltips           : {
                mode     : mode,
                intersect: intersect
            },
            hover              : {
                mode     : mode,
                intersect: intersect
            },
            legend             : {
                display: false
            },
            scales             : {
                yAxes: [{
                    // display: false,
                    gridLines: {
                        display      : true,
                        lineWidth    : '4px',
                        color        : 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks    : $.extend({
                        beginAtZero : true,
                        suggestedMax: 100
                    }, ticksStyle)
                }],
                xAxes: [{
                    display  : true,
                    gridLines: {
                        display: false
                    },
                    ticks    : ticksStyle
                }]
            }
        }
    })
})
