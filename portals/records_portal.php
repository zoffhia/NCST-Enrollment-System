<?php include('../includes/records_header.php'); ?>

<!-- Main Content -->
<div class="md:ml-64 mt-20 px-6">
    <h1 class="text-blue-950 text-lg"> Records Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500">Total Enrolled</h3>
            <p class="text-3xl font-bold text-blue-900">256</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500">1st Year</h3>
            <p class="text-3xl font-bold text-blue-900">74</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500">2nd Year</h3>
            <p class="text-3xl font-bold text-blue-900">63</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500">3rd Year</h3> 
            <p class="text-3xl font-bold text-blue-900">59</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-gray-500">4th Year</h3>
            <p class="text-3xl font-bold text-blue-900">60</p>
        </div>
    </div>


    <!-- Chart Container -->
    <div class="bg-white p-6 rounded shadow mt-6">
        <h2 class="text-lg font-semibold mb-4">Enrolled Students This Month</h2>
        <canvas id="enrollmentChart" height="100"></canvas>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('enrollmentChart').getContext('2d');

    const enrollmentChart = new Chart(ctx, {
        type: 'bar', // can be 'line', 'bar', 'pie', etc.
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // X-axis labels
            datasets: [{
                label: 'Enrolled Students',
                data: [12, 19, 14, 22], // Example values
                backgroundColor: 'rgba(37, 99, 235, 0.5)', // Tailwind blue-600 with opacity
                borderColor: 'rgb(37, 99, 235)',
                borderWidth: 1,
                borderRadius: 6 // rounded bars
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 5 }
                }
            }
        }
    });
    </script>

</div>

<?php include('../includes/footer.php'); ?>
