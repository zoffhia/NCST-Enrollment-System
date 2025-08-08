const { createApp } = Vue;

createApp({
    data() {
        return {
            showModal: false,
            users: [],
            loading: false,
            studentsNoAccount: [], // <-- Add this
            userForm: {
                userType: '',
                role: '',
                firstName: '',
                midName: '',
                lastName: '',
                suffix: '',
                birthDate: '',
                email: '',
                password: '',
                // Dynamic fields
                studentNo: '',
                course: '',
                yearLevel: '',
                empId: '',
                departmentName: ''
            },
            roleOptions: {
                student: ['student', 'student assistant'],
                employee: ['registrar', 'treasury', 'clinic nurse', 'department head', 'admin']
            },
            message: '',
            messageType: ''
        }
    },
  
    mounted() {
        this.loadUsers();
    },
  
    computed: {
        availableRoles() {
            return this.userForm.userType ? this.roleOptions[this.userForm.userType] : [];
        },
    
        showStudentFields() {
            return this.userForm.role === 'student' || this.userForm.role === 'student assistant';
        },
    
        showEmployeeFields() {
            return ['registrar', 'treasury', 'clinic nurse'].includes(this.userForm.role);
        },
    
        showDepartmentHeadFields() {
            return this.userForm.role === 'department head';
        },
    
        showAdminFields() {
            return this.userForm.role === 'admin';
        }
    },
  
    methods: {
        async fetchStudentsNoAccount() {
            this.loading = true;
            try {
                const formData = new FormData();
                formData.append('action', 'get_students_no_account');
                const response = await fetch('/ncst/functions/user_count_functions.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await response.json();
                if (data.status === 'success') {
                    this.studentsNoAccount = data.students;
                } else {
                    this.studentsNoAccount = [];
                }
            } catch (error) {
                this.studentsNoAccount = [];
            } finally {
                this.loading = false;
            }
        },
        updateRoles() {
            this.userForm.role = '';
            if (this.userForm.userType === 'student') {
                this.fetchStudentsNoAccount();
            }
        },
        async createStudentAccount(student) {
            this.loading = true;
            try {
                const formData = new FormData();
                formData.append('action', 'create_student_account');
                formData.append('studentNo', student.student_no);
                formData.append('firstName', student.first_name);
                formData.append('lastName', student.last_name);
                formData.append('course', student.course);
                formData.append('yearLevel', student.year_level);
                formData.append('defaultPassword', 'student123'); // Default password

                const response = await fetch('/ncst/functions/user_count_functions.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await response.json();
                if (data.status === 'success') {
                    this.message = 'Account created for ' + student.first_name + '!';
                    this.messageType = 'success';
                    await this.fetchStudentsNoAccount();
                    await this.loadUsers();
                } else {
                    this.message = 'Error: ' + data.message;
                    this.messageType = 'error';
                }
            } catch (error) {
                this.message = 'An error occurred.';
                this.messageType = 'error';
            } finally {
                this.loading = false;
            }
        },
        async loadUsers() {
            this.loading = true;
      
            try {
                const formData = new FormData();
                formData.append('action', 'get_all_users');
        
                const response = await fetch('/ncst/functions/user_count_functions.php', {
                    method: 'POST',
                    body: formData
                });
        
                const data = await response.json();
        
                if (data.status === 'success') {
                    this.users = data.users;
                } else {
                    // Handle error silently or show user-friendly message
                }
        
            } catch (error) {
                // Handle error silently or show user-friendly message
            } finally {
                this.loading = false;
            }
        },
    
        formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toLocaleDateString();
        },
    
        capitalizeRole(role) {
            if (!role) return '';
            return role.split('_').map(word => 
            word.charAt(0).toUpperCase() + word.slice(1)
            ).join(' ');
        },
    
        openModal() {
            this.showModal = true;
            this.resetForm();
        },
    
        closeModal() {
            this.showModal = false;
            this.resetForm();
        },
    
        resetForm() {
            this.userForm = {
                userType: '',
                role: '',
                firstName: '',
                midName: '',
                lastName: '',
                suffix: '',
                birthDate: '',
                email: '',
                password: '',
                studentNo: '',
                course: '',
                yearLevel: '',
                empId: '',
                departmentName: ''
            };
            this.message = '';
            this.messageType = '';
        },
    
        updateRoles() {
            this.userForm.role = '';
        },
    
        async addUser() {
            if (!this.validateForm()) {
                return;
            }
      
            this.loading = true;
      
            try {
                const formData = new FormData();
                formData.append('action', 'add_user');
                formData.append('userType', this.userForm.userType);
                formData.append('role', this.userForm.role);
                formData.append('firstName', this.userForm.firstName);
                formData.append('midName', this.userForm.midName);
                formData.append('lastName', this.userForm.lastName);
                formData.append('suffix', this.userForm.suffix);
                formData.append('birthDate', this.userForm.birthDate);
                formData.append('email', this.userForm.email);
                formData.append('password', this.userForm.password);
        
                // Add dynamic fields based on role
                if (this.showStudentFields) {
                    formData.append('studentNo', this.userForm.studentNo);
                    formData.append('course', this.userForm.course);
                    formData.append('yearLevel', this.userForm.yearLevel);
                } else if (this.showEmployeeFields || this.showDepartmentHeadFields || this.showAdminFields) {
                    formData.append('empId', this.userForm.empId);
                    if (this.showDepartmentHeadFields) {
                        formData.append('departmentName', this.userForm.departmentName);
                    }
                }
        
                const response = await fetch('/ncst/functions/user_count_functions.php', {
                    method: 'POST',
                    body: formData
                });
        
                const data = await response.json();
        
                if (data.status === 'success') {
                    this.message = data.message;
                    this.messageType = 'success';
                    // Reload users after successful addition
                    await this.loadUsers();
                    setTimeout(() => {
                        this.closeModal();
                    }, 2000);
                } else {
                    this.message = 'Error: ' + data.message;
                    this.messageType = 'error';
                }
        
            } catch (error) {
                this.message = 'An error occurred while adding the user.';
                this.messageType = 'error';
            } finally {
                this.loading = false;
            }
        },
    
        validateForm() {
            if (!this.userForm.userType) {
                this.message = 'Please select a user type.';
                this.messageType = 'error';
                return false;
            }
      
            if (!this.userForm.role) {
                this.message = 'Please select a role.';
                this.messageType = 'error';
                return false;
            }
      
            if (!this.userForm.firstName || !this.userForm.lastName || !this.userForm.email || !this.userForm.password) {
                this.message = 'Please fill in all required fields.';
                this.messageType = 'error';
                return false;
            }
      
            if (this.showStudentFields && (!this.userForm.studentNo || !this.userForm.course || !this.userForm.yearLevel)) {
                this.message = 'Please fill in all student fields.';
                this.messageType = 'error';
                return false;
            }
      
            if ((this.showEmployeeFields || this.showDepartmentHeadFields || this.showAdminFields) && !this.userForm.empId) {
                this.message = 'Please fill in the employee ID.';
                this.messageType = 'error';
                return false;
            }
      
            if (this.showDepartmentHeadFields && !this.userForm.departmentName) {
                this.message = 'Please fill in the department name.';
                this.messageType = 'error';
                return false;
            }
      
            return true;
        },
    
        toggleStatus() {
            const btn = document.getElementById("statusBtn");
            const isActive = btn.textContent === "Activate";
            btn.textContent = isActive ? "Deactivate" : "Activate";
            btn.className = isActive 
                ? "bg-gray-500 text-white px-3 py-1 rounded"
                : "bg-green-500 text-white px-3 py-1 rounded";
        }
    }
}).mount('#userManagementApp');