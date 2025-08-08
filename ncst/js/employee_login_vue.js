const { createApp } = Vue;

createApp({
    data() {
        return {
            email: '',
            password: '',
            terms: false,
            loading: false
        }
    },
    methods: {
        async handleLogin() {
            event.preventDefault();

            try {
                const formData = new FormData();
                formData.append('action', 'login');
                formData.append('email', this.email);
                formData.append('password', this.password);

                const response = await fetch('/ncst/functions/employee_login_function.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        text: result.message,
                        confirmButtonColor: '#1d4ed8',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.replace(result.redirect);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: result.message,
                        confirmButtonColor: '#1d4ed8'
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Connection Error',
                    text: 'Unable to connect to server. Please try again.',
                    confirmButtonColor: '#1d4ed8'
                });
            } finally {
                this.loading = false;
            }
        },
        checkTerms() {
            this.terms = true;
        }
    }
}).mount('#employeeLoginApp'); 