// Bar Chart
const ctxBar = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(ctxBar, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
    datasets: [{
      label: 'Sales',
      data: [12000, 19000, 3000, 5000, 20000],
      backgroundColor: ['#FFCE56', '#36A2EB', '#FF6384', '#FF9F40', '#4BC0C0']
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false, // This allows the chart to fill its container
  }
});

// Pie Chart
const ctxPie = document.getElementById('pieChart').getContext('2d');
const pieChart = new Chart(ctxPie, {
  type: 'pie',
  data: {
    labels: ['Product 1', 'Product 2', 'Product 3'],
    datasets: [{
      data: [50, 30, 20],
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false, // This allows the chart to fill its container
  }
});

