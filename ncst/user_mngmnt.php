<?php include('includes/admin_header.php'); ?>

<!-- Main content wrapper (beside sidebar) -->
<div class="px-4 md:px-6 py-6 md:ml-64 mt-20" id="userManagementApp">

  <!-- Inner content card -->
  <div class="max-w-7xl mx-auto bg-white p-6 mt-15 rounded shadow-lg animation-fade-bottom delay-3">
  <div class="flex justify-end mb-4">
      <button @click="openModal()" class="bg-blue-700 text-white px-4 py-2 mx-2 rounded hover:bg-blue-800">Add User</button>

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

    <div class="w-full flex justify-center px-4">
      <div class="w-full max-w-6xl overflow-x-auto">
        <table id="userTable" class="min-w-full text-sm text-left text-gray-800 border border-gray-300">
                     <thead class="bg-blue-100 text-blue-900 uppercase">
             <tr>
               <th class="px-6 py-3 border">ID No.</th>
               <th class="px-6 py-3 border">Name</th>
               <th class="px-6 py-3 border">Birth Date</th>
               <th class="px-6 py-3 border">Email</th>
               <th class="px-6 py-3 border">User Type</th>
               <th class="px-6 py-3 border">Role</th>
               <th class="px-6 py-3 border">Date Created</th>
               <th class="px-6 py-3 border">Status</th>
               <th class="px-6 py-3 border">Actions</th>
             </tr>
           </thead>
          
          <tbody>
                         <!-- Loading state -->
             <tr v-if="loading">
               <td colspan="9" class="px-6 py-4 text-center">
                 <div class="flex items-center justify-center">
                   <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-700"></div>
                   <span class="ml-2">Loading users...</span>
                 </div>
               </td>
             </tr>
             
             <!-- No users state -->
             <tr v-else-if="users.length === 0">
               <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                 No users found. Add your first user using the "Add User" button.
               </td>
             </tr>
            
                         <!-- User data -->
             <tr v-for="(user, index) in users" :key="index" class="hover:bg-gray-50">
               <td class="px-6 py-3 border">{{ user.id_no }}</td>
               <td class="px-6 py-3 border">{{ user.full_name }}</td>
               <td class="px-6 py-3 border">{{ formatDate(user.birthDate) }}</td>
               <td class="px-6 py-3 border">{{ user.email }}</td>
               <td class="px-6 py-3 border">{{ user.user_type.charAt(0).toUpperCase() + user.user_type.slice(1) }}</td>
               <td class="px-6 py-3 border">{{ capitalizeRole(user.role) }}</td>
               <td class="px-6 py-3 border">{{ formatDate(user.dateCreated) }}</td>
               <td class="px-6 py-3 border font-semibold" :class="user.status === 'Active' ? 'text-green-600' : 'text-red-600'">
                 {{ user.status }}
               </td>
               <td class="px-6 py-3 border">
                 <div class="space-x-2 flex items-center">
                   <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</button>
                   <button class="bg-red-500 text-white px-3 py-1 rounded">Deactivate</button>
                 </div>
               </td>
             </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Vue.js Modal -->
  <div v-if="showModal" class="fixed inset-0 z-50 backdrop-blur-sm backdrop-brightness-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-full max-w-2xl shadow-lg max-h-[90vh] overflow-y-auto">
      <h2 class="text-xl font-bold mb-4">Add User</h2>
      <div v-if="message" :class="messageType === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'" class="p-3 rounded mb-4">
        {{ message }}
      </div>
      <!-- Only ONE dropdown for user type -->
      <select v-model="userForm.userType" @change="updateRoles()" class="w-full border px-3 py-2 rounded mb-3" required>
        <option value="" disabled>Select User Type</option>
        <option value="student">Student</option>
        <option value="employee">Employee</option>
      </select>
      <!-- Student Table -->
      <div v-if="userForm.userType === 'student'">
        <div class="mb-4 font-semibold text-blue-700">Enrolled Students Without Accounts</div>
        <table class="min-w-full text-sm text-left text-gray-800 border border-gray-300 mb-4">
          <thead class="bg-blue-100 text-blue-900 uppercase">
            <tr>
              <th class="px-4 py-2 border">Student No.</th>
              <th class="px-4 py-2 border">Name</th>
              <th class="px-4 py-2 border">Course</th>
              <th class="px-4 py-2 border">Year Level</th>
              <th class="px-4 py-2 border">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="loading">
              <td colspan="5" class="px-4 py-2 text-center">Loading students...</td>
            </tr>
            <tr v-else-if="studentsNoAccount.length === 0">
              <td colspan="5" class="px-4 py-2 text-center text-gray-500">No students found.</td>
            </tr>
            <tr v-for="student in studentsNoAccount" :key="student.student_no">
              <td class="px-4 py-2 border">{{ student.student_no }}</td>
              <td class="px-4 py-2 border">{{ student.first_name }} {{ student.last_name }}</td>
              <td class="px-4 py-2 border">{{ student.course }}</td>
              <td class="px-4 py-2 border">{{ student.year_level }}</td>
              <td class="px-4 py-2 border">
                <button @click="createStudentAccount(student)" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700" :disabled="loading">Create Account</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="flex justify-end">
          <button type="button" @click="closeModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Close</button>
        </div>
      </div>
      <!-- Employee Form -->
      <form v-else @submit.prevent="addUser()">
        <!-- Role (dependent on user type) -->
        <select v-model="userForm.role" class="w-full border px-3 py-2 rounded mb-3" required>
          <option value="" disabled>Select Role</option>
          <option v-for="role in availableRoles" :key="role" :value="role">
            {{ role.charAt(0).toUpperCase() + role.slice(1) }}
          </option>
        </select>
        <!-- Common Fields -->
        <input v-model="userForm.firstName" type="text" placeholder="First Name" class="w-full border px-3 py-2 rounded mb-3" required>
        <input v-model="userForm.midName" type="text" placeholder="Middle Name" class="w-full border px-3 py-2 rounded mb-3">
        <input v-model="userForm.lastName" type="text" placeholder="Last Name" class="w-full border px-3 py-2 rounded mb-3" required>
        <input v-model="userForm.suffix" type="text" placeholder="Suffix" class="w-full border px-3 py-2 rounded mb-3">
        <input v-model="userForm.birthDate" type="date" placeholder="Birth Date" class="w-full border px-3 py-2 rounded mb-3" required>
        <input v-model="userForm.email" type="email" placeholder="Email" class="w-full border px-3 py-2 rounded mb-3" required>
        <input v-model="userForm.password" type="password" placeholder="Password" class="w-full border px-3 py-2 rounded mb-3" required>
        <!-- Employee Fields -->
        <div v-if="showEmployeeFields || showDepartmentHeadFields || showAdminFields">
          <input v-model="userForm.empId" type="text" placeholder="Employee No" class="w-full border px-3 py-2 rounded mb-3" required>
        </div>
        <!-- Department Head Fields -->
        <div v-if="showDepartmentHeadFields">
          <input v-model="userForm.departmentName" type="text" placeholder="Department Name" class="w-full border px-3 py-2 rounded mb-3" required>
        </div>
        <div class="flex justify-end space-x-2">
          <button type="button" @click="closeModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
          <button type="submit" :disabled="loading" class="px-4 py-2 rounded bg-blue-700 text-white hover:bg-blue-800 disabled:opacity-50">
            <span v-if="loading">Adding...</span>
            <span v-else>Add</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="/ncst/js/vue.global.js"></script>
<script src="/ncst/js/user_mngmnt_vue.js"></script>
<?php include('includes/footer.php'); ?>