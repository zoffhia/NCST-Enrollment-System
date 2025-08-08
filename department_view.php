<?php include('includes/admin_header.php'); ?>

<!-- Main content wrapper -->
<div class="bg-gray-100 px-2 sm:px-4 md:px-6 py-6 md:ml-64 mt-20 min-h-screen">
    <!-- Selection for Department Type -->
    <div class="w-full max-w-lg sm:max-w-2xl md:max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-4 sm:p-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-950">Select Department Type</h1>
        <div class="flex flex-col sm:flex-row justify-center mt-6 gap-4 sm:gap-6">
            <button onclick="selectDepartmentType('academic')" class="flex flex-col items-center bg-blue-700 hover:bg-blue-800 text-sm text-white px-4 py-2 rounded w-full sm:w-32">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="42" height="42" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 3L1 9l11 6l9-4.91V17h2V9M5 13.18v4L12 21l7-3.82v-4L12 17z"/>
                </svg>
                Academic
            </button>
            <button onclick="selectDepartmentType('non-academic')" class="flex flex-col items-center bg-green-700 hover:bg-green-800 text-white px-4 text-sm py-2 rounded w-full sm:w-32">
                <!-- Non-Academic Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-1" width="42" height="42" viewBox="0 0 48 48">
                    <defs>
                        <mask id="ipSBuildingThree0">
                            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                            <path fill="#fff" fill-rule="evenodd" stroke="#fff" d="m24 8l20 13v23H4V21z" clip-rule="evenodd"/>
                            <path stroke="#000" d="M20 44V23l-8 5v16m16 0V23l8 5v16"/>
                            <path stroke="#fff" d="M41 44H8"/>
                            </g>
                        </mask>
                    </defs>
                    <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSBuildingThree0)"/>
                </svg>
                Non-Academic
            </button>
        </div>
    </div>

    <!-- Departments List -->
    <div id="departmentsSection" class="mt-6 hidden">
        <div class="w-full max-w-2xl sm:max-w-3xl md:max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-4 sm:p-6">
            <h2 id="departmentTitle" class="text-xl font-bold mb-4">Departments</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border border-gray-200">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 sm:px-6 py-3">Department Name</th>
                            <th class="px-4 sm:px-6 py-3">Type</th> <!--Academic or Non-Academic-->    
                            <th class="px-4 sm:px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="departmentsTable">
                        <!--Dynamic Rows-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Dynamic Modal-->
    <div id="unifiedModal" class="fixed inset-0 z-50 hidden items-center justify-center backdrop-blur-sm bg-blue-900/60">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-xs sm:max-w-lg md:max-w-2xl lg:max-w-4xl max-h-[90vh] overflow-y-auto p-2 sm:p-4 md:p-6 relative flex flex-col">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl">&times;</button>
            <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>
            <div id="modalContent"></div>
        </div>
    </div>
</div>


<script>

//NOTE : Change and use Vue JS for this

document.addEventListener('DOMContentLoaded', function() {
    // Academic and non-academic department arrays
    let academicDepartments = [ //Sample Data ONLY
        { name: 'Architecture and Engineering', type: 'Academic' },
        { name: 'Computer Science Departmenr', type: 'Academic' }
    ];
    let nonAcademicDepartments = [
        { name: 'Registrar Office', type: 'Non-Academic' },
        { name: 'Treasury', type: 'Non-Academic' }
    ];
    let currentDeptType = 'academic';

    function selectDepartmentType(type) {
        currentDeptType = type;
        document.getElementById('departmentsSection').classList.remove('hidden');
        document.getElementById('departmentTitle').textContent = type === 'academic' 
            ? 'Academic Departments' 
            : 'Non-Academic Departments';

        const departmentsTable = document.getElementById('departmentsTable');
        departmentsTable.innerHTML = '';

        const departments = type === 'academic'
            ? academicDepartments
            : nonAcademicDepartments;

        departments.forEach((dept, index) => {
            const actions = type === 'academic'
                ? `<button onclick="viewPrograms(${index})" class='px-3 py-1 bg-blue-700 text-white rounded hover:bg-blue-800'>View Programs</button>
                   <button onclick="editAcademicDepartment(${index})" class='px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600'>Edit</button>`
                : `<button onclick="viewEmployees(${index}, '${type}')" class='px-3 py-1 bg-blue-700 text-white rounded hover:bg-blue-800'>View Employees</button>
                   <button onclick="editNonAcademicDepartment(${index})" class='px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600'>Edit</button>`;

            departmentsTable.innerHTML += `
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-2 sm:px-4 md:px-6 py-3">${dept.name}</td>
                    <td class="px-2 sm:px-4 md:px-6 py-3">${dept.type}</td>
                    <td class="px-2 sm:px-4 md:px-6 py-3 space-x-2">${actions}</td>
                </tr>`;
        });
    }

    function editAcademicDepartment(index) {
        const dept = academicDepartments[index];
        let formHTML = `
            <form id='editAcademicDeptForm' onsubmit='return false;'>
                <div class='mb-4'>
                    <label class='block mb-1 font-semibold'>Department Name</label>
                    <input type='text' id='editAcademicDeptName' value="${dept.name}" class='w-full border px-3 py-2 rounded' required />
                </div>
                <div class='flex flex-col sm:flex-row gap-2'>
                    <button type='button' onclick='saveAcademicDeptEdit(${index})' class='px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800'>Save</button>
                    <button type='button' onclick='selectDepartmentType("academic")' class='px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400'>Cancel</button>
                </div>
            </form>
        `;
        openModal('Edit Academic Department', formHTML);
    }

    function saveAcademicDeptEdit(index) {
        const name = document.getElementById('editAcademicDeptName').value;
        academicDepartments[index].name = name;
        selectDepartmentType('academic');
    }

    function editNonAcademicDepartment(index) {
        const dept = nonAcademicDepartments[index];
        let formHTML = `
            <form id='editNonAcademicDeptForm' onsubmit='return false;'>
                <div class='mb-4'>
                    <label class='block mb-1 font-semibold'>Department Name</label>
                    <input type='text' id='editNonAcademicDeptName' value="${dept.name}" class='w-full border px-3 py-2 rounded' required />
                </div>
                <div class='flex flex-col sm:flex-row gap-2'>
                    <button type='button' onclick='saveNonAcademicDeptEdit(${index})' class='px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800'>Save</button>
                    <button type='button' onclick='selectDepartmentType("non-academic")' class='px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400'>Cancel</button>
                </div>
            </form>
        `;
        openModal('Edit Non-Academic Department', formHTML);
    }

    function saveNonAcademicDeptEdit(index) {
        const name = document.getElementById('editNonAcademicDeptName').value;
        nonAcademicDepartments[index].name = name;
        selectDepartmentType('non-academic');
    }
    
    function openModal(title, tableHTML) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalContent').innerHTML = tableHTML;
        document.getElementById('unifiedModal').classList.remove('hidden');
        document.getElementById('unifiedModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('unifiedModal').classList.add('hidden');
        document.getElementById('unifiedModal').classList.remove('flex');
    }

    // Store programs for academic departments (for demo, not per department)
    let academicPrograms = [
        { name: 'BS Computer Science', code: 'BSCS', level: 'Undergraduate' },
        { name: 'BS Civil Engineering', code: 'BSCE', level: 'Undergraduate' },
        { name: 'BS Architecture', code: 'BSARCH', level: 'Undergraduate' }

    ];

    function viewPrograms(departmentIndex) {
        // For demo, use academicPrograms array
        let tableHTML = `
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-2 sm:px-4 md:px-6 py-3">Program Name</th>
                        <th class="px-2 sm:px-4 md:px-6 py-3">Code</th>
                        <th class="px-2 sm:px-4 md:px-6 py-3">Level</th>
                        <th class="px-2 sm:px-4 md:px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ${academicPrograms.map((prog, index) => `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-2 sm:px-4 md:px-6 py-3">${prog.name}</td>
                            <td class="px-2 sm:px-4 md:px-6 py-3">${prog.code}</td>
                            <td class="px-2 sm:px-4 md:px-6 py-3">${prog.level}</td>
                            <td class="px-2 sm:px-4 md:px-6 py-3 space-x-2">
                                <button onclick="viewEmployees(${index}, 'academic')" class='px-3 py-1 bg-blue-700 text-white rounded hover:bg-blue-800'>View Employees</button>
                                <button onclick="editProgram(${index})" class='px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600'>Edit</button>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>`;
        openModal('Programs', tableHTML);
    }

    function editProgram(index) {
        const prog = academicPrograms[index];
        let formHTML = `
            <form id='editProgramForm' onsubmit='return false;'>
                <div class='mb-4'>
                    <label class='block mb-1 font-semibold'>Program Name</label>
                    <input type='text' id='editProgramName' value="${prog.name}" class='w-full border px-3 py-2 rounded' required />
                </div>
                <div class='mb-4'>
                    <label class='block mb-1 font-semibold'>Code</label>
                    <input type='text' id='editProgramCode' value="${prog.code}" class='w-full border px-3 py-2 rounded' required />
                </div>
                <div class='mb-4'>
                    <label class='block mb-1 font-semibold'>Level</label>
                    <select id='editProgramLevel' class='w-full border px-3 py-2 rounded'>
                        <option value='Undergraduate' ${prog.level === 'Undergraduate' ? 'selected' : ''}>Undergraduate</option>
                        <option value='Graduate' ${prog.level === 'Graduate' ? 'selected' : ''}>Graduate</option>
                    </select>
                </div>
                <div class='flex flex-col sm:flex-row gap-2'>
                    <button type='button' onclick='saveProgramEdit(${index})' class='px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800'>Save</button>
                    <button type='button' onclick='viewPrograms()' class='px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400'>Cancel</button>
                </div>
            </form>
        `;
        openModal('Edit Program', formHTML);
    }

    function saveProgramEdit(index) {
        const name = document.getElementById('editProgramName').value;
        const code = document.getElementById('editProgramCode').value;
        const level = document.getElementById('editProgramLevel').value;
        academicPrograms[index] = { name, code, level };
        viewPrograms();
    }

    // Store employees for academic and non-academic departments
    const academicEmployees = [
        { name: 'John Doe', position: 'Department Head', status: 'Active' },
        { name: 'Jane Smith', position: 'Professor', status: 'Inactive' }
    ];
    const nonAcademicEmployees = [
        { name: 'Alice Brown', position: 'Registrar', status: 'Active' },
        { name: 'Bob White', position: 'Treasurer', status: 'Inactive' }
    ];
    let currentEmployeeType = 'academic'; // Track which type is being viewed

    function viewEmployees(parentIndex, type) {
        // Default to academic if not specified
        currentEmployeeType = type || currentEmployeeType || 'academic';
        window._currentEmployees = currentEmployeeType === 'academic' ? academicEmployees : nonAcademicEmployees;

        let tableHTML = `
            <div class='overflow-x-auto'>
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-2 sm:px-4 md:px-6 py-3">Name</th>
                        <th class="px-2 sm:px-4 md:px-6 py-3">Position</th>
                        <th class="px-2 sm:px-4 md:px-6 py-3">Status</th>
                        <th class="px-2 sm:px-4 md:px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ${window._currentEmployees.map((emp, idx) => `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-2 sm:px-4 md:px-6 py-3">${emp.name}</td>
                            <td class="px-2 sm:px-4 md:px-6 py-3">${emp.position}</td>
                            <td class="px-2 sm:px-4 md:px-6 py-3">${emp.status}</td>
                            <td class="px-2 sm:px-4 md:px-6 py-3 space-x-2 flex flex-col sm:flex-row gap-2">
                                <button onclick="showEditEmployeeForm(${idx})" class='px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600'>Edit</button>
                                <button class='px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700'>Delete</button>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
            </div>`;

        openModal('Employees', tableHTML);
    }

    function showEditEmployeeForm(empIndex) {
        const emp = window._currentEmployees[empIndex];
        let formHTML = `
            <form id="editEmployeeForm" onsubmit="return false;">
                <div class='mb-4'>
                    <label class='block mb-1 font-semibold'>Name</label>
                    <input type='text' id='editEmpName' value="${emp.name}" class='w-full border px-3 py-2 rounded' required />
                </div>
                <div class='mb-4'>
                    <label class='block mb-1 font-semibold'>Position</label>
                    <input type='text' id='editEmpPosition' value="${emp.position}" class='w-full border px-3 py-2 rounded' required />
                </div>
                <div class='mb-4'>
                    <label class='block mb-1 font-semibold'>Status</label>
                    <select id='editEmpStatus' class='w-full border px-3 py-2 rounded'>
                        <option value='Active' ${emp.status === 'Active' ? 'selected' : ''}>Active</option>
                        <option value='Inactive' ${emp.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
                    </select>
                </div>
                <div class='flex flex-col sm:flex-row gap-2'>
                    <button type='button' onclick='saveEmployeeEdit(${empIndex})' class='px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800'>Save</button>
                    <button type='button' onclick='viewEmployees(undefined, "${currentEmployeeType}")' class='px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400'>Cancel</button>
                </div>
            </form>
        `;
        openModal('Edit Employee', formHTML);
    }

    function saveEmployeeEdit(empIndex) {
        const name = document.getElementById('editEmpName').value;
        const position = document.getElementById('editEmpPosition').value;
        const status = document.getElementById('editEmpStatus').value;
        if (currentEmployeeType === 'academic') {
            academicEmployees[empIndex] = { name, position, status };
        } else {
            nonAcademicEmployees[empIndex] = { name, position, status };
        }
        viewEmployees(undefined, currentEmployeeType);
    }

    function updateRoles() {
        const userType = document.getElementById('userTypeSelect').value;
        const roleSelect = document.getElementById('roleSelect');
        roleSelect.innerHTML = '';

        if (userType === 'student') {
            roleSelect.innerHTML += `<option value="student">Student</option>
                                     <option value="student_assistant">Student Assistant</option>`;
        } else if (userType === 'employee') {
            roleSelect.innerHTML += `<option value="registrar">Registrar</option>
                                     <option value="treasury">Treasury</option>`;
        }
    }

    window.selectDepartmentType = selectDepartmentType;
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.viewPrograms = viewPrograms;
    window.viewEmployees = viewEmployees;
    window.editAcademicDepartment = editAcademicDepartment;
    window.saveAcademicDeptEdit = saveAcademicDeptEdit;
    window.editNonAcademicDepartment = editNonAcademicDepartment;
    window.saveNonAcademicDeptEdit = saveNonAcademicDeptEdit;
    window.showEditEmployeeForm = showEditEmployeeForm;
    window.saveEmployeeEdit = saveEmployeeEdit;
    window.editProgram = editProgram;
    window.saveProgramEdit = saveProgramEdit;
});
</script>

<?php include('includes/footer.php'); ?>
