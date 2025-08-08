<?php include('../includes/registrar_header.php'); ?>

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
  <!-- Students Card -->
  <div class="bg-white p-5 rounded-lg shadow border-l-4 border-blue-600 shadow-md transform transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:border-l-20">
    <h2 class="text-gray-600 text-sm font-medium">Enrolled Students</h2>
    <p class="text-2xl font-semibold text-gray-900">1,235</p>
  </div>

  <!-- Applicants -->
  <div class="bg-white p-5 rounded-lg shadow border-l-4 border-orange-500 shadow-md transform transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:border-l-20">
    <h2 class="text-gray-600 text-sm font-medium">Total Applications</h2>
    <p class="text-2xl font-semibold text-gray-900">55</p>
  </div>

  <!-- Pending Enrollments -->
  <div class="bg-white p-5 rounded-lg shadow border-l-4 border-blue-950 shadow-md transform transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:border-l-20">
    <h2 class="text-gray-600 text-sm font-medium">Pending Applications</h2>
    <p class="text-2xl font-semibold text-gray-900">30</p>
  </div>

  <!-- Approved Enrollments -->
  <div class="bg-white p-5 rounded-lg shadow border-l-4 border-amber-500 shadow-md transform transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:border-l-20">
    <h2 class="text-gray-600 text-sm font-medium">Approved Applications</h2>
    <p class="text-2xl font-semibold text-gray-900">25</p>
  </div>
  </div>
</div>


<div class="mt-10 grid grid-cols-1 lg:grid-cols-3 gap-6 animation-fade-bottom z-10">
  <!--Recent student applications-->
  <div class="lg:col-span-2">
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

  <!--quick actions panel-->
  <div class="z-10">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h2>
    <div class="bg-white rounded-lg shadow p-4 space-y-4">
      <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
        Add New Student
      </button>
      <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded">
        View Pending Applications
      </button>
      <button class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded">
        Generate Report
      </button>
    </div>
  </div>
</div>

<?php include('../includes/footer.php'); ?>