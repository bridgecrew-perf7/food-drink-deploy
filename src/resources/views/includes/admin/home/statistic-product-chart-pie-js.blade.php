<script>
  
let amount_ofs = <?php echo json_encode($amount_ofs)?>;
let name_products = <?php echo json_encode($name_products)?>;
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: name_products,
    datasets: [{
      data: amount_ofs,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745','#E5E5E5'],
    }],
  },
});

</script>