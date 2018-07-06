$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $pulse1Chart = $('#pulse1-chart')
  var pulse1Chart  = new Chart($pulse1Chart, {
    data   : {
      datasets: [{
        type                : 'line',
        data                : [{x:0,y:25},{x:10,y:12}, {x:36,y:27},{x:55,y:16}, {x:72,y:22}, {x:108,y:20}, {x:144,y:18}],
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
            fontSize: 15,
          }
        }]

     }
    }
  })
  var $humidityChart = $('#humidity-chart')
  var humidityChart  = new Chart($humidityChart, {
    data   : {
//      labels  : ['0h', '3h', '6h', '9h', '12', '15h', '18h','21h'],
      datasets: [{
          type                : 'line',
          data                : [{x:0,y:25},{x:10,y:12}, {x:36,y:27},{x:55,y:16}, {x:72,y:22}, {x:108,y:20}, {x:144,y:18}],
          backgroundColor     : 'tansparent',
          borderColor         : '#007bff',
          fill                : false,
          pointRadius         : 0
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
           fontSize: 15,
         }
       }]
      }
    }
  })
})
