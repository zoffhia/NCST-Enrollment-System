const LogoutHandler = {
    userType: null,
    logoutUrl: null,
    
    init() {
        this.determineUserType();
        this.setupLogoutHandlers();
    },
    
    determineUserType() {
        const currentPath = window.location.pathname;
        
        if (currentPath.includes('admin') || currentPath.includes('user_mngmnt')) {
            this.userType = 'admin';
            this.logoutUrl = '/ncst/functions/saving_session.php';
        } else if (currentPath.includes('employee') || currentPath.includes('dept')) {
            this.userType = 'employee';
            this.logoutUrl = '/ncst/functions/saving_session.php';
        } else if (currentPath.includes('student') || currentPath.includes('enrollment')) {
            this.userType = 'student';
            this.logoutUrl = '/ncst/functions/saving_session.php';
        } else {
            this.userType = 'admin';
            this.logoutUrl = '/ncst/functions/saving_session.php';
        }
    },
    
    setupLogoutHandlers() {
        const logoutLinks = document.querySelectorAll('a[href="#"]');
        logoutLinks.forEach(link => {
            const span = link.querySelector('span');
            if (span && span.textContent === 'Logout') {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.confirmLogout();
                });
            }
        });
    },
    
    confirmLogout() {
        Swal.fire({
            title: 'Confirm Logout',
            text: 'Are you sure you want to logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                this.performLogout();
            }
        });
    },
    
    performLogout() {
        Swal.fire({
            title: 'Logging out...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const formData = new FormData();
        formData.append('action', 'logout');
        formData.append('user_type', this.userType);

        fetch(this.logoutUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    title: 'Success!',
                    text: data.message,
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = data.redirect;
                });
            } else {
                throw new Error('Logout failed');
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred during logout. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    }
};

function initLogoutHandler() {
    LogoutHandler.init();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLogoutHandler);
} else {
    initLogoutHandler();
}

window.LogoutHandler = LogoutHandler; 