<?php include('../includes/registrar_header.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="z-10 inline-flex items-center p-2 mt-2 ms-3 text-sm text-white bg-blue-800 rounded-lg sm:hidden hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300">
    <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
    <span class="sr-only">Open sidebar</span>
</button>

<div class="p-6 sm:ml-64 bg-gray-100 min-h-screen z-10">

  <div class="mb-6 mt-25 animation-fade-bottom">
    <h1 class="text-3xl font-bold text-blue-950 mb-5 animation-fade-bottom">Registrar Dashboard</h1>
  </div>

  <!-- Dashboard Cards -->
  <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 animation-fade-bottom">
    <div class="bg-white p-5 rounded-lg shadow border-l-4 border-blue-600">
      <h2 class="text-gray-600 text-sm font-medium">Enrolled Students</h2>
      <p class="text-2xl font-semibold text-gray-900">1,235</p>
    </div>
    <div class="bg-white p-5 rounded-lg shadow border-l-4 border-orange-500">
      <h2 class="text-gray-600 text-sm font-medium">Total Applications</h2>
      <p class="text-2xl font-semibold text-gray-900">55</p>
    </div>
    <div class="bg-white p-5 rounded-lg shadow border-l-4 border-blue-950">
      <h2 class="text-gray-600 text-sm font-medium">Pending Applications</h2>
      <p class="text-2xl font-semibold text-gray-900">30</p>
    </div>
    <div class="bg-white p-5 rounded-lg shadow border-l-4 border-amber-500">
      <h2 class="text-gray-600 text-sm font-medium">Approved Applications</h2>
      <p class="text-2xl font-semibold text-gray-900">25</p>
    </div>
  </div>

  <!-- Graphs -->
  <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Applications this week -->
    <div class="bg-white rounded-lg shadow p-4">
      <h2 class="text-lg font-semibold text-gray-800 mb-4">Applications This Week</h2>
      <canvas id="applicationsChart" height="200"></canvas>
    </div>

    <!-- Donut Chart -->
    <div class="bg-white rounded-lg shadow p-4">
      <h2 class="text-lg font-semibold text-gray-800 mb-4">Enrollment by Year Level</h2>
      <canvas id="enrolledDonut" height="200"></canvas>
    </div>
  </div>

  <!-- Recent Applications Table -->
  <div class="mt-10 animation-fade-bottom">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Applications</h2>
    <div class="bg-white rounded-lg shadow p-4 overflow-x-auto">
      <table class="min-w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
          <tr>
            <th class="px-4 py-2">Application ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Date</th>
            <th class="px-4 py-2">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="px-4 py-2">1001</td>
            <td class="px-4 py-2">Rodrigo Galauran JUNIOR</td>
            <td class="px-4 py-2">July 20, 2025</td>
            <td class="px-4 py-2 text-green-600 font-medium">Approved</td>
          </tr>
          <tr class="border-b">
            <td class="px-4 py-2">1002</td>
            <td class="px-4 py-2">John Benedict Congson</td>
            <td class="px-4 py-2">July 19, 2025</td>
            <td class="px-4 py-2 text-yellow-500 font-medium">Pending</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div> <!-- closes main content container -->

<script>
// Applications this week chart
const ctx1 = document.getElementById('applicationsChart').getContext('2d');
new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Aug 1', 'Aug 2', 'Aug 3', 'Aug 4', 'Aug 5', 'Aug 6', 'Aug 7'],
        datasets: [{
            label: 'Applications',
            data: [5, 8, 4, 10, 6, 12, 9],
            backgroundColor: 'rgba(37, 99, 235, 0.7)'
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } }
    }
});

// Donut chart for enrollment by year level
const ctx2 = document.getElementById('enrolledDonut').getContext('2d');
const yearLevels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
const enrollmentCounts = [320, 290, 310, 315]; // replace with PHP DB data if needed
const totalStudents = enrollmentCounts.reduce((a, b) => a + b, 0);

new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: yearLevels,
        datasets: [{
            data: enrollmentCounts,
            backgroundColor: ['#2563eb', '#22c55e', '#f59e0b', '#ef4444']
        }]
    },
    options: {
        responsive: true,
        cutout: '70%',
        plugins: {
            legend: { position: 'bottom' },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let value = context.raw;
                        let percentage = ((value / totalStudents) * 100).toFixed(1);
                        return `${context.label}: ${value} (${percentage}%)`;
                    }
                }
            }
        }
    }
});
</script>

<?php include('../includes/footer.php'); ?>
