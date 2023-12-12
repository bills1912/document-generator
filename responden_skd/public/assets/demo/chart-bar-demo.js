// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: _ydata_affiliation,
    datasets: [{
      label: "Total responden",
      backgroundColor: [
        "rgba(119,158,203,1)", 
        "rgba(255,105,97,1)", 
        "rgba(166,123,91,1)"
      ],
      borderColor: [
        "rgba(119,158,203,1)", 
        "rgba(255,105,97,1)", 
        "rgba(166,123,91,1)"
      ],
      data: _xdata_affiliation,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
