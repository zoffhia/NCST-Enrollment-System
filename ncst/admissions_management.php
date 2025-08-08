<?php include('includes/registrar_header.php');?>

<!-- DataTables CSS -->
<link rel="stylesheet" href="/ncst/css/datatables.min.css">

<!-- Container -->
<div class="p-4 md:ml-64 mt-20">
  <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Admissions Management</h2>
    
    <!-- Table -->
    <div class="overflow-x-auto">
      <table id="admissionTable" class="display w-full">
        <thead>
          <tr class="bg-blue-950 text-white">
            <th>Name</th>
            <th>Email</th>
            <th>Student Type</th>
            <th>Course</th>
            <th>Requirements Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Dummy Data -->
          <tr>
            <td>Juan Dela Cruz</td>
            <td>juan@example.com</td>
            <td>Transferee</td>
            <td>BS Computer Science</td>
            <td class="text-yellow-600 font-semibold">Approved</td>
            <td>
              <button onclick="openModal('modal')" class="bg-blue-600 text-white px-3 py-1 rounded mr-2 hover:bg-blue-700">View</button>
              <button class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600">Archive</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Export Button - At the very bottom -->
    <div class="p-4 md:ml-64">
      <div class="max-w-7xl mx-auto flex justify-end">
        <div class="relative">
          <button id="exportBtn" onclick="toggleExportDropdown()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Export
          </button>
          
          <!-- Export Dropdown -->
          <div id="exportDropdown" class="absolute bottom-full right-0 mb-2 bg-white border border-gray-200 rounded-lg shadow-lg hidden z-10 min-w-48">
            <div class="py-1">
              <button onclick="exportAs('pdf')" class="w-full text-left px-4 py-2 hover:bg-gray-100 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36c.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05a12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064a.44.44 0 0 1-.06.2a.3.3 0 0 1-.094.124a.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822c.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
                  <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2z"/>
                </svg>
                PDF
              </button>
              <button onclick="exportAs('word')" class="w-full text-left px-4 py-2 hover:bg-gray-100 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M21.17 3.25q.33 0 .59.25q.24.24.24.58v15.84q0 .34-.24.58q-.26.25-.59.25H7.83q-.33 0-.59-.25q-.24-.24-.24-.58V17H2.83q-.33 0-.59-.24Q2 16.5 2 16.17V7.83q0-.33.24-.59Q2.5 7 2.83 7H7V4.08q0-.34.24-.58q.26-.25.59-.25m-.8 8.09l1.2 3.94H9.6l1.31-6.56H9.53l-.78 3.88l-1.11-3.75H6.5l-1.19 3.77l-.78-3.9H3.09l1.31 6.56h1.37m14.98 4.22V17H8.25v2.5m12.5-3.75v-3.12H12v3.12m8.75-4.37V8.25H12v3.13M20.75 7V4.5H8.25V7Z"/>
                </svg>
                Word Document
              </button>
              <button onclick="exportAs('excel')" class="w-full text-left px-4 py-2 hover:bg-gray-100 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="currentColor" viewBox="0 0 48 48">
                  <path fill-rule="evenodd" d="M29 6v8h13v2H29v7h13V8c0-1.105-.836-2-1.867-2zm0 19h13v7H29zm0 9h13v6c0 1.105-.836 2-1.867 2H29zm-2 0v8H15.867C14.836 42 14 41.105 14 40v-6zm0-20H14V8c0-1.105.836-2 1.867-2H27zm-3.948 2v7H27v-7zm0 9v7H27v-7zM6 17a1 1 0 0 1 1-1h13.158a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm3.607 2h2.26l1.834 3.754L15.64 19h2.112l-2.91 5l2.976 5H15.59l-1.999-3.93l-1.99 3.93H9.34l3.024-5.018z" clip-rule="evenodd"/>
                </svg>
                Spreadsheet
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="modal" class="fixed hidden inset-0 backdrop-blur-sm bg-blue-900/60 flex items-center justify-center z-50">
  <div class="bg-white p-6 w-full max-w-lg rounded-lg shadow-lg">
    <h2 class="text-lg font-semibold mb-4">Submitted Information</h2>
        <!-- Example Info -->
        <p><strong>Full Name:</strong> Juan Dela Cruz</p>
        <p><strong>Email:</strong> juan@example.com</p>
        <p><strong>Program:</strong> BS Computer Science</p>
        <p><strong>Requirement Status:</strong> Approved</p>
        <!--Information that was submitted by the student through the admission form will be displayed here-->
        <button onclick="approveStudent()" id="approveBtn" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Confirm Slot</button>
        <button onclick="closeModal('modal')" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Close</button>
    </div>

  </div>
</div>

<!-- jQuery + DataTables -->
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/datatables.min.js"></script>

<script>
    const checkboxes = document.querySelectorAll('.requirement-checkbox');
const approveBtn = document.getElementById('approveBtn');

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    const allChecked = [...checkboxes].every(cb => cb.checked);
    approveBtn.disabled = !allChecked;
  });
});

  $(document).ready(function () {
    $('#admissionTable').DataTable({
      searching: false // Remove search field
    });
  });

  function openModal(id) {
    // Reset approve button state
    const approveBtn = document.getElementById('approveBtn');
    if (approveBtn) {
      approveBtn.disabled = true;
    }
    document.getElementById(id).classList.remove('hidden');
  }

  function closeModal(id) {
    // Reset checkboxes when closing modal
    const checkboxes = document.querySelectorAll('.requirement-checkbox');
    checkboxes.forEach(checkbox => {
      checkbox.checked = false;
    });
    // Reset approve button state
    const approveBtn = document.getElementById('approveBtn');
    if (approveBtn) {
      approveBtn.disabled = true;
    }
    document.getElementById(id).classList.add('hidden');
  }

  function approveStudent() {
    alert("Student approved successfully!");
    // You could send a POST request here to update DB
    closeModal('modal');
  }

  // Export dropdown functions
  function toggleExportDropdown() {
    const dropdown = document.getElementById('exportDropdown');
    dropdown.classList.toggle('hidden');
  }

  function exportAs(type) {
    // Hide dropdown after selection
    document.getElementById('exportDropdown').classList.add('hidden');
    
    // Handle export based on type
    switch(type) {
      case 'pdf':
        alert('Exporting as PDF...');
        // Add PDF export logic here
        break;
      case 'word':
        alert('Exporting as Word Document...');
        // Add Word export logic here
        break;
      case 'excel':
        alert('Exporting as Spreadsheet...');
        // Add Excel export logic here
        break;
    }
  }

  // Close dropdown when clicking outside
  document.addEventListener('click', function(event) {
    const exportBtn = document.getElementById('exportBtn');
    const exportDropdown = document.getElementById('exportDropdown');
    
    if (!exportBtn.contains(event.target) && !exportDropdown.contains(event.target)) {
      exportDropdown.classList.add('hidden');
    }
  });
</script>

<?php include('includes/footer.php');?>