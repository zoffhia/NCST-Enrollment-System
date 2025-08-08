<?php include('includes/registrar_header.php');?>

<div class="min-h-screen bg-gray-100 flex justify-center px-4 py-12 z-0 ml-[64px] lg:ml-[250px]">
    <div class="mt-24 w-full max-w-6xl bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Pending Enrollment Requests</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-6 py-3">ID Number</th>
                    <th class="px-6 py-3">Full Name</th>
                    <th class="px-6 py-3">Student Type</th>
                    <th class="px-6 py-3">Chosen Section</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-t" id="row-2023-00123">
                    <td class="px-6 py-4">2023-00123</td>
                    <td class="px-6 py-4">Juan Dela Cruz</td>
                    <td class="px-6 py-4 status">Old Student</td>
                    <td class="px-6 py-4">BSIT - Section A</td>
                    <td class="px-6 py-4">Pending</td>
                    <td class="px-6 py-4">
                    <button onclick="viewSchedule('2023-00123')" class="text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded">View Schedule</button>
                    </td>
                </tr>
                <tr class="border-t" id="row-2023-00456">
                    <td class="px-6 py-4">2023-00456</td>
                    <td class="px-6 py-4">Maria Clara</td>
                    <td class="px-6 py-4 status">Transferee</td>
                    <td class="px-6 py-4">BSBA - Section B</td>
                    <td class="px-6 py-4">Pending</td>
                    <td class="px-6 py-4">
                    <button onclick="viewSchedule('2023-00456')" class="text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded">View Schedule</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
            <!-- Schedule Modal -->
        <div id="scheduleModal" class="fixed inset-0 bg-blue-900/30 backdrop-blur-sm flex items-center justify-center hidden z-40">
        <div class="bg-white w-full max-w-4xl p-6 rounded shadow-lg relative">
            <h2 class="text-xl font-bold mb-4">Selected Schedule: BSIT - Section A</h2>
            <table class="min-w-full text-sm text-left text-gray-700 border">
            <thead class="bg-gray-100 text-xs uppercase">
                <tr>
                <th class="px-4 py-2">Subject Code</th>
                <th class="px-4 py-2">Class Type</th>
                <th class="px-4 py-2">Start Time</th>
                <th class="px-4 py-2">End Time</th>
                <th class="px-4 py-2">Days</th>
                <th class="px-4 py-2">Instructor</th>
                <th class="px-4 py-2">Units</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Schedule -->
                <tr class="border-t">
                <td class="px-4 py-2">IT101</td>
                <td class="px-4 py-2">Lecture</td>
                <td class="px-4 py-2">08:00 AM</td>
                <td class="px-4 py-2">09:30 AM</td>
                <td class="px-4 py-2">Mon/Wed</td>
                <td class="px-4 py-2">Mr. Santos</td>
                <td class="px-4 py-2">3</td>
                </tr>
                <tr class="border-t">
                <td class="px-4 py-2">IT102</td>
                <td class="px-4 py-2">Lab</td>
                <td class="px-4 py-2">10:00 AM</td>
                <td class="px-4 py-2">12:00 PM</td>
                <td class="px-4 py-2">Tue/Thu</td>
                <td class="px-4 py-2">Ms. Garcia</td>
                <td class="px-4 py-2">2</td>
                </tr>
            </tbody>
            <tfoot class="bg-gray-50 font-semibold">
                <tr>
                <td colspan="6" class="px-4 py-2 text-right">Total Units</td>
                <td class="px-4 py-2">15</td>
                </tr>
            </tfoot>
            </table>

            <div class="flex justify-end mt-6 gap-2">
            <button onclick="closeModal('scheduleModal')" class="px-4 py-2 rounded border border-gray-400 hover:bg-gray-100">Cancel</button>
            <button onclick="confirmEnrollment()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Confirm Enrollment</button>
            </div>
        </div>
        </div>

        <!-- Registration Form Modal -->
        <div id="registrationModal" class="fixed inset-0 bg-blue-900/30 backdrop-blur-sm flex items-center justify-center hidden z-40">
            <div class="bg-white max-w-5xl w-full p-6 rounded shadow-xl relative space-y-4 overflow-y-auto max-h-[90vh]">
                <!-- Header -->
                <div class="flex items-center gap-4">
                <img src="/ncst/img/NCST-logo.png" alt="School Logo" class="w-16 h-16 object-contain" />
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">NATIONAL COLLEGE OF SCIENCE & TECHNOLOGY</h1>
                    <p class="text-sm text-gray-500">Academic Year 2025-2026</p>
                </div>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-blue-800">Student Registration Form</h2>
                    <p><span class="font-semibold">Reference No:</span> REG-2025-00123</p>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-2 pt-4">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Print</button>
                    <button onclick="closeRegistrationModal()" class="border border-gray-400 px-4 py-2 rounded hover:bg-gray-100">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div> 

<script src="/ncst/js/sweetalert2@11.js"></script>
<script>
  let selectedStudentId = null;

  function viewSchedule(studentId) {
    selectedStudentId = studentId;
    document.getElementById('scheduleModal').classList.remove('hidden');
  }

  function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
  }

  function confirmEnrollment() {
    Swal.fire({
      title: 'Confirm Enrollment?',
      text: "This action will finalize the student's enrollment.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, confirm it!',
      cancelButtonText: 'Cancel',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('scheduleModal').classList.add('hidden');
        document.getElementById('registrationModal').classList.remove('hidden');
      }
    });
  }

  function closeRegistrationModal() {
    document.getElementById('registrationModal').classList.add('hidden');

    if (selectedStudentId) {
      const row = document.getElementById(`row-${selectedStudentId}`);
      const statusCell = row.querySelector('.status');
      statusCell.innerText = 'Enrolled';
      statusCell.classList.add('text-green-600', 'font-semibold');
    }

    selectedStudentId = null;
  }
</script>

<?php include('includes/footer.php');?>