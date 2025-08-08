<?php include('../includes/admin_header.php'); ?>

<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="mt-25 inline-flex items-center p-2 mt-2 ms-3 text-sm text-white bg-blue-800 rounded-lg sm:hidden hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300">
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16"><path fill="currentColor" d="M7.62 7.18L2.79 3.03c-.7-.6-1.79-.1-1.79.82v8.29c0 .93 1.09 1.42 1.79.82l4.83-4.14c.5-.43.5-1.21 0-1.64"/></svg>
    <span class="sr-only">Open sidebar</span>
</button>

<div class="p-6 sm:ml-64 bg-gray-100 min-h-screen">
  <div class="max-w-7xl mx-auto bg-white p-6 mt-15 rounded shadow-lg animation-fade-bottom">
    <h1 class="text-3xl font-bold text-blue-800 mb-3">Admin Dashboard</h1>

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-9 text-sm">
    <!-- Total Users -->
    <div class="bg-blue-100 rounded-lg shadow p-5 animation-fade-bottom">
      <h2 class="text-sm font-medium text-blue-800 uppercase mb-1">Total Users</h2>
      <p class="text-3xl font-bold text-blue-900" id="totalUsers">Loading...</p>
    </div>

    <!-- Students -->
    <div class="bg-blue-200 rounded-lg shadow p-5 animation-fade-bottom">
      <h2 class="text-sm font-medium text-blue-900 uppercase mb-1">Students</h2>
      <p class="text-3xl font-bold text-blue-950" id="studentCount">Loading...</p>
    </div>

    <!-- Student Assistants -->
    <div class="bg-blue-300 rounded-lg shadow p-5 animation-fade-bottom">
      <h2 class="text-sm font-medium text-blue-950 uppercase mb-1">Student Assistants</h2>
      <p class="text-3xl font-bold text-blue-900" id="studentAssistantCount">Loading...</p>
    </div>

    <!-- Department Heads -->
    <div class="bg-yellow-100 rounded-lg shadow p-5 animation-fade-bottom">
      <h2 class="text-sm font-medium text-yellow-800 uppercase mb-1">Department Heads</h2>
      <p class="text-3xl font-bold text-yellow-900" id="departmentHeadCount">Loading...</p>
    </div>

    <!-- Registrars -->
    <div class="bg-yellow-200 rounded-lg shadow p-5 animation-fade-bottom">
      <h2 class="text-sm font-medium text-yellow-900 uppercase mb-1">Registrars</h2>
      <p class="text-3xl font-bold text-yellow-950" id="registrarCount">Loading...</p>
    </div>

    <!-- Treasury -->
    <div class="bg-yellow-300 rounded-lg shadow p-5 animation-fade-bottom">
        <!-- Treasury -->
        <div>
          <h2 class="text-xs font-medium text-yellow-950 uppercase mb-1">Treasury</h2>
          <p class="text-2xl font-bold text-yellow-900" id="treasuryCount">Loading...</p>
        </div>
    </div>
  </div>
</div>

<div class="max-w-7xl mx-auto bg-white p-6 mt-15 rounded shadow-lg animation-fade-bottom delay-3">
  <div class="flex justify-end mb-4">
      <button type="button" id="dropdownBtn" data-dropdown-toggle="exportMenu" class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
        Export As
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
      </button>

      <div id="exportMenu" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownBtn">
          <li>
            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><g fill="currentColor"><path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36c.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05a12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064a.44.44 0 0 1-.06.2a.3.3 0 0 1-.094.124a.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822c.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/><path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2z"/></g></svg>
              PDF
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><path fill="currentColor" fill-rule="evenodd" d="M29 6v8h13v2H29v7h13V8c0-1.105-.836-2-1.867-2zm0 19h13v7H29zm0 9h13v6c0 1.105-.836 2-1.867 2H29zm-2 0v8H15.867C14.836 42 14 41.105 14 40v-6zm0-20H14V8c0-1.105.836-2 1.867-2H27zm-3.948 2v7H27v-7zm0 9v7H27v-7zM6 17a1 1 0 0 1 1-1h13.158a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm3.607 2h2.26l1.834 3.754L15.64 19h2.112l-2.91 5l2.976 5H15.59l-1.999-3.93l-1.99 3.93H9.34l3.024-5.018z" clip-rule="evenodd"/></svg>
              Excel
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M21.17 3.25q.33 0 .59.25q.24.24.24.58v15.84q0 .34-.24.58q-.26.25-.59.25H7.83q-.33 0-.59-.25q-.24-.24-.24-.58V17H2.83q-.33 0-.59-.24Q2 16.5 2 16.17V7.83q0-.33.24-.59Q2.5 7 2.83 7H7V4.08q0-.34.24-.58q.26-.25.59-.25m-.8 8.09l1.2 3.94H9.6l1.31-6.56H9.53l-.78 3.88l-1.11-3.75H6.5l-1.19 3.77l-.78-3.9H3.09l1.31 6.56h1.37m14.98 4.22V17H8.25v2.5m12.5-3.75v-3.12H12v3.12m8.75-4.37V8.25H12v3.13M20.75 7V4.5H8.25V7Z"/></svg>
              Word Document
            </a>
          </li>
        </ul>
      </div>
  </div>

  <!--For Viewing Only-->
    <div class="w-full flex justify-center px-4">
      <div class="w-full max-w-6xl overflow-x-auto">
        <table id="userTable" class="min-w-full text-sm text-left text-gray-800 border border-gray-300">
          <thead class="bg-blue-100 text-blue-900 uppercase">
            <tr>
              <th class="px-6 py-3 border">ID</th>
              <th class="px-6 py-3 border">ID No.</th>
              <th class="px-6 py-3 border">Name</th>
              <th class="px-6 py-3 border">Birth Date</th>
              <th class="px-6 py-3 border">Email</th>
              <th class="px-6 py-3 border">User Type</th> <!--Student/Employee-->
              <th class="px-6 py-3 border">Role</th> <!--For Student: Student, Student Assistant || For Employees: Registrar, Department Head, Treasury??-->
              <th class="px-6 py-3 border">Date Created</th>
              <th class="px-6 py-3 border">Status</th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <td class="px-6 py-3 border">1</td>
              <td class="px-6 py-3 border">2022-12234</td>
              <td class="px-6 py-3 border">John Smith</td>
              <td class="px-6 py-3 border">08/21/1998</td>
              <td class="px-6 py-3 border">juan@example.com</td>
              <td class="px-6 py-3 border">Student</td>
              <td class="px-6 py-3 border">Student Assistant</td>
              <td class="px-6 py-3 border">2025-07-21</td>
              <td class="px-6 py-3 border font-semibold">Active</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!--
  <div id="addUserModal" class="fixed inset-0 z-50 backdrop-blur-sm backdrop-brightness-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
    <h2 class="text-xl font-bold mb-4">Add User</h2>

    <form id="addUserForm" onsubmit="event.preventDefault(); addUser();">
       User Type 
      <select id="userTypeSelect" class="w-full border px-3 py-2 rounded mb-3" onchange="updateRoles()" required>
        <option value="" disabled selected>Select User Type</option>
        <option value="student">Student</option>
        <option value="employee">Employee</option>
      </select>

      Role (dependent on user type) 
      <select id="roleSelect" class="w-full border px-3 py-2 rounded mb-3" onchange="handleRoleChange()" required>
        <option value="" disabled selected>Select Role</option>
      </select>

       Common Fields
      <input type="text" name="firstName" placeholder="First Name" class="w-full border px-3 py-2 rounded mb-3" required>
      <input type="text" name="midName" placeholder="Middle Name" class="w-full border px-3 py-2 rounded mb-3">
      <input type="text" name="lastName" placeholder="Last Name" class="w-full border px-3 py-2 rounded mb-3" required>
      <input type="text" name="suffix" placeholder="Suffix" class="w-full border px-3 py-2 rounded mb-3">
      <input type="date" name="birthDate" placeholder="Birth Date" class="w-full border px-3 py-2 rounded mb-3" required>
      <input type="email" name="email" placeholder="Email" class="w-full border px-3 py-2 rounded mb-3" required>

       Dynamic Fields
      <div id="dynamicFields"></div>

      <div class="flex justify-end space-x-2">
        <button type="button" onclick="document.getElementById('addUserModal').classList.add('hidden')" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
        <button type="submit" class="px-4 py-2 rounded bg-blue-700 text-white hover:bg-blue-800">Add</button>
      </div>
    </form>
  </div>
</div>
-->
</div>

<script>
  // Load user counts when page loads
  document.addEventListener('DOMContentLoaded', function() {
    loadUserCounts();
  });

  function loadUserCounts() {
    const formData = new FormData();
    formData.append('action', 'get_user_counts');

    fetch('/ncst/functions/user_count_functions.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      document.getElementById('totalUsers').textContent = data.total_users;
      document.getElementById('studentCount').textContent = data.students;
      document.getElementById('studentAssistantCount').textContent = data.student_assistants;
      document.getElementById('departmentHeadCount').textContent = data.department_heads;
      document.getElementById('registrarCount').textContent = data.registrars;
      document.getElementById('treasuryCount').textContent = data.treasury;
    })
    .catch(error => {
      console.error('Error loading user counts:', error);
      // Set default values if there's an error
      document.getElementById('totalUsers').textContent = '0';
      document.getElementById('studentCount').textContent = '0';
      document.getElementById('studentAssistantCount').textContent = '0';
      document.getElementById('departmentHeadCount').textContent = '0';
      document.getElementById('registrarCount').textContent = '0';
      document.getElementById('treasuryCount').textContent = '0';
    });
  }

  function toggleStatus() {
    const btn = document.getElementById("statusBtn");
    const isActive = btn.textContent === "Activate";
    btn.textContent = isActive ? "Deactivate" : "Activate";
    btn.className = isActive 
      ? "bg-gray-500 text-white px-3 py-1 rounded"
      : "bg-green-500 text-white px-3 py-1 rounded";
  }

  function addUser() {
    document.getElementById('addUserModal').classList.add('hidden');
    // Reload user counts after adding user
    loadUserCounts();
  }

    const roleOptions = {
    student: ['student', 'student assistant'],
    employee: ['registrar', 'treasury', 'clinic nurse', 'department head', 'admin']
  };

  function updateRoles() {
    const userType = document.getElementById('userTypeSelect').value;
    const roleSelect = document.getElementById('roleSelect');
    const dynamicFields = document.getElementById('dynamicFields');

    // Clear previous roles and fields
    roleSelect.innerHTML = '<option value="" disabled selected>Select Role</option>';
    dynamicFields.innerHTML = '';

    if (roleOptions[userType]) {
      roleOptions[userType].forEach(role => {
        const option = document.createElement('option');
        option.value = role;
        option.textContent = capitalize(role);
        roleSelect.appendChild(option);
      });
    }
  }

  function handleRoleChange() {
    const role = document.getElementById('roleSelect').value;
    const dynamicFields = document.getElementById('dynamicFields');
    dynamicFields.innerHTML = ''; // Clear previous

    // Add fields based on role
    if (role === 'student' || role === 'student assistant') {
      dynamicFields.innerHTML = `
        <input type="text" placeholder="Student ID" class="w-full border px-3 py-2 rounded mb-3" required>
        <input type="text" placeholder="Course" class="w-full border px-3 py-2 rounded mb-3" required>
        <input type="text" placeholder="Year Level" class="w-full border px-3 py-2 rounded mb-3" required>
      `;
    } else if (role === 'registrar' || role === 'treasury' || role === 'clinic nurse') {
      dynamicFields.innerHTML = `
        <input type="text" placeholder="Employee ID" class="w-full border px-3 py-2 rounded mb-3" required>
      `;
    } else if (role === 'department head') {
      dynamicFields.innerHTML = `
        <input type="text" placeholder="Head ID" class="w-full border px-3 py-2 rounded mb-3" required>
        <input type="text" placeholder="Department Name" class="w-full border px-3 py-2 rounded mb-3" required>
      `;
    } else if (role === 'admin') {
      dynamicFields.innerHTML = `
        <input type="text" placeholder="Admin ID" class="w-full border px-3 py-2 rounded mb-3" required>
      `;
    }
  }

  function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }

  function addUser() {
    alert('User added!');
    document.getElementById('addUserModal').classList.add('hidden');
    // Reload user counts after adding user
    loadUserCounts();
  }
</script>

<?php include('../includes/footer.php'); ?>