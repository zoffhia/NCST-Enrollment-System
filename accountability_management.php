<?php include('includes/records_header.php'); ?>

<div class="px-4 md:px-6 py-6 md:ml-64 mt-20">
  <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow-lg">
    <h2 class="text-2xl font-semibold mb-4">Students with Accountabilities</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300 rounded-lg">
        <thead>
          <tr class="bg-gray-100 text-left">
            <th class="py-2 px-4 border-b">Student ID</th>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Accountability Type</th>
            <th class="py-2 px-4 border-b">Status</th>
            <th class="py-2 px-4 border-b">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="py-2 px-4 border-b">2025-001</td>
            <td class="py-2 px-4 border-b">Maria Santos</td>
            <td class="py-2 px-4 border-b">Library Book</td>
            <td class="py-2 px-4 border-b text-red-600">Uncleared</td>
            <td class="py-2 px-4 border-b">
              <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                Clear
              </button>
            </td>
          </tr>
          <tr>
            <td class="py-2 px-4 border-b">2025-001</td>
            <td class="py-2 px-4 border-b">Maria Santos</td>
            <td class="py-2 px-4 border-b">Unpaid Tuition</td>
            <td class="py-2 px-4 border-b text-red-600">Uncleared</td>
            <td class="py-2 px-4 border-b">
              <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                Clear
              </button>
            </td>
          </tr>
          <tr>
            <td class="py-2 px-4 border-b">2025-002</td>
            <td class="py-2 px-4 border-b">Juan Dela Cruz</td>
            <td class="py-2 px-4 border-b">Library Book</td>
            <td class="py-2 px-4 border-b text-green-600">Cleared</td>
            <td class="py-2 px-4 border-b">
              <button class="bg-gray-300 text-gray-600 px-3 py-1 rounded cursor-not-allowed" disabled>
                Clear
              </button>
            </td>
          </tr>
          <tr>
            <td class="py-2 px-4 border-b">2025-003</td>
            <td class="py-2 px-4 border-b">Ana Lopez</td>
            <td class="py-2 px-4 border-b">Unpaid Tuition</td>
            <td class="py-2 px-4 border-b text-red-600">Uncleared</td>
            <td class="py-2 px-4 border-b">
              <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                Clear
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?php include('includes/footer.php'); ?>