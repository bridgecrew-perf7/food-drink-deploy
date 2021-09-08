<script>

let number_of_orders = <?php echo json_encode($number_of_orders)?>;
// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [ "{{__('custom.January')}}","{{__('custom.February')}}","{{__('custom.March')}}","{{__('custom.April')}}",
              "{{__('custom.May')}}","{{__('custom.June')}}","{{__('custom.July')}}","{{__('custom.August')}}",
              "{{__('custom.September')}}","{{__('custom.October')}}","{{__('custom.November')}}","{{__('custom.December')}}"
            ],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: number_of_orders,
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
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 100,
          maxTicksLimit: 10
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

</script>