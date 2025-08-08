<?php include('includes/stud_header.php'); ?>
<!-- Student-side Online Enrollment -->

<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 md:ml-64">
  <div class="w-full max-w-3xl bg-white rounded-lg shadow-xl p-6 mx-auto">
    <h2 class="text-2xl font-bold mb-4 text-center text-blue-800">List Of Sections</h2>

    <!-- Scrollable container -->
    <div class="overflow-y-auto max-h-[400px]">
      <h3 class="text-lg font-semibold text-white bg-blue-950 px-6 py-2 rounded-t">BSIT-31A1</h3>
      <table class="min-w-full bg-white border border-gray-200 text-sm text-left text-gray-700 mb-4">
        <thead class="bg-gray-100 text-gray-700 uppercase">
          <tr>
            <th class="px-6 py-3">Subject Code</th>
            <th class="px-6 py-3">Class Type</th>
            <th class="px-6 py-3">Start Time</th>
            <th class="px-6 py-3">End Time</th>
            <th class="px-6 py-3">Days</th>
            <th class="px-6 py-3">Instructor</th>
            <th class="px-6 py-3">Units</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="px-6 py-4">IT101</td>
            <td class="px-6 py-4">Lecture</td>
            <td class="px-6 py-4">08:00 AM</td>
            <td class="px-6 py-4">09:30 AM</td>
            <td class="px-6 py-4">Mon/Wed</td>
            <td class="px-6 py-4">Mr. Santos</td>
            <td class="px-6 py-4">3</td>
          </tr>
          <tr class="border-t">
            <td class="px-6 py-4">IT102</td>
            <td class="px-6 py-4">Lab</td>
            <td class="px-6 py-4">10:00 AM</td>
            <td class="px-6 py-4">12:00 PM</td>
            <td class="px-6 py-4">Tue/Thu</td>
            <td class="px-6 py-4">Ms. Garcia</td>
            <td class="px-6 py-4">2</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Footer outside scroll -->
    <div class="mt-4">
      <div class="text-right font-semibold">Total Units: 5</div>
      <div class="text-right mt-2">
        <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-semibold">Enroll</button>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
