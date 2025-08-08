const { createApp } = Vue;

createApp({
    data() {
        return {
            studentNo: '',
            password: '',
            loading: false,
            message: '',
            messageType: ''
        }
    },
  
    methods: {
        async login() {
            if (!this.studentNo || !this.password) {
                this.message = 'Please fill in all fields';
                this.messageType = 'error';
                return;
            }
      
            this.loading = true;
      
            try {
                const formData = new FormData();
                formData.append('action', 'login');
                formData.append('studentNo', this.studentNo);
                formData.append('password', this.password);
        
                const response = await fetch('/ncst/functions/student_login_function.php', {
                    method: 'POST',
                    body: formData
                });
        
                const result = await response.json();
        
                if (result.status === 'success') {
                    this.message = result.message;
                    this.messageType = 'success';
                    setTimeout(() => {
                        window.location.href = '/ncst/portals/student_portal.php';
                    }, 2000);
                } else {
                    this.message = result.message;
                    this.messageType = 'error';
                }
        
            } catch (error) {
                this.message = 'An error occurred during login';
                this.messageType = 'error';
            } finally {
                this.loading = false;
            }
        }
    }
}).mount('#studentLoginApp'); 