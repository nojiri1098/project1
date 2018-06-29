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

  var $temperatureChart = $('#temperature-chart')
  var temperatureChart  = new Chart($temperatureChart, {
    data   : {

    //  labels  : ['0h', '3h', '6h', '9h', '12', '15h', '18h','21h'],
      datasets: [{
      //  label  : '#of Votes'
        type                : 'line',
        data                : [{x:0,y:25},{x:10,y:12}, {x:36,y:27},{x:55,y:16}, {x:72,y:22}, {x:108,y:20}, {x:144,y:18}],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
      //  pointBorderColor    : '#007bff',
      //  pointBackgroundColor: '#007bff',
        fill                : false,
        pointRadius         : 0
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
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
    /*    yAxes: [{
           display: true,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : false,
            suggestedMax: 50
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: true
          },
          ticks    : ticksStyle
        }]
      */
   xAxes : [{
    gridLines:{
      color: "#5f5f5f",
    },
    type: 'linear',
    ticks: {
     callback: function(value) {return ((value % 18) == 0)? (144-value)/6+'h' : ''},
      min: 0,
      max: 144,
      stepSize: 1,
      fontSize: 15,
    }
  }],
  yAxes : [{
    gridLines:{
      color: "#5f5f5f",
    },

    ticks: {
  //    callback: function(value) {return ((value % 18) == 0)? value : ''},
  /*   min: 0,
      max: 30,
      stepSize: 1,*/
      fontSize: 15,
    }
  }]

     }
    }
  })
  var $humidityChart = $('#humidity-chart')
  var humidityChart  = new Chart($humidityChart, {
    data   : {
      labels  : ['0h', '3h', '6h', '9h', '12', '15h', '18h','21h'],
      datasets: [{
          type                : 'line',
          data                : [60, 80, 70, 67, 80, 77, 100, 90],
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
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
