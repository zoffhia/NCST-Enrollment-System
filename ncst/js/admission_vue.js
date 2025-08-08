const { createApp } = Vue;

window.__admissionApp__ = createApp({
    data() {
        return {
            // Student information
            student: {
                firstName: '',
                midName: '',
                lastName: '',
                suffix: '',
                address: '',
                zip: '',
                phone: '',
                gender: '0',
                civilStatus: '0',
                nationality: '0',
                birthDate: '',
                birthPlace: '',
                email: '',
                religion: '0',
                employer: '',
                position: '',
                course: '0',
                houseHeroes: '0',
                nstp: '0'
            },
            
            // Educational background
            education: {
                primarySchool: '',
                primaryYear: '',
                secondarySchool: '',
                secondaryYear: '',
                tertiarySchool: '',
                tertiaryYear: '',
                courseGraduated: ''
            },
            
            // Parent/Guardian information
            parent: {
                fatherFirstName: '',
                fatherMidName: '',
                fatherLastName: '',
                fatherSuffix: '',
                fatherAddress: '',
                fatherPhone: '',
                fatherOccupation: '',
                motherFirstName: '',
                motherMidName: '',
                motherLastName: '',
                motherAddress: '',
                motherPhone: '',
                motherOccupation: '',
                guardianFirstName: '',
                guardianMidName: '',
                guardianLastName: '',
                guardianSuffix: '',
                guardianAddress: '',
                guardianPhone: '',
                guardianOccupation: '',
                guardianRelationship: ''
            },
            
            // Health form data
            healthForm: {
                allergiesResponse: '',
                allergiesDetails: '',
                headachesResponse: '',
                headachesDetails: '',
                hospitalizationResponse: '',
                hospitalizationDetails: '',
                chronicConditionsResponse: '',
                chronicConditionsDetails: '',
                medicationResponse: '',
                medicationDetails: '',
                correctiveLensesResponse: '',
                correctiveLensesDetails: '',
                disabilitiesResponse: '',
                disabilitiesDetails: '',
                vaccinationResponse: '',
                vaccinationDetails: '',
                mentalHealthResponse: '',
                mentalHealthDetails: ''
            },
            
            // Form state
            currentStep: 0,
            loading: false,
            message: '',
            messageType: '',
            healthFormID: null,
            formSubmitted: false
        }
    },
    
    computed: {
        
    },
    
    methods: {
        // Email validation
        isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },

        nextStep() {
            if (this.currentStep < 6) {
                this.currentStep++;
                this.updateStepper();
                if (typeof window.nextPrev === 'function') {
                    window.nextPrev(1);
                }
            }
        },
        
        prevStep() {
            if (this.currentStep > 0) {
                this.currentStep--;
                this.updateStepper();
                if (typeof window.nextPrev === 'function') {
                    window.nextPrev(-1);
                }
            }
        },

        updateStepper() {
            const desktopCircles = document.querySelectorAll("#desktop-stepper .step-circle");
            const mobileCircles = document.querySelectorAll("#mobile-stepper .step-circle");
            
            [desktopCircles, mobileCircles].forEach((circles) => {
                circles.forEach((circle, index) => {
                    circle.classList.remove("bg-green-200", "bg-teal-200", "bg-green-500", "bg-yellow-400", "bg-gray-300");
                    
                    if (index < this.currentStep) {
                        circle.classList.add("bg-green-500"); // completed
                    } else if (index === this.currentStep) {
                        circle.classList.add("bg-yellow-400"); // current
                    } else {
                        circle.classList.add("bg-teal-200"); // base
                    }
                });
            });
        },

        syncWithNavigation() {
            if (typeof window.currentTab !== 'undefined') {
                window.currentTab = this.currentStep;
            }
            
            // Update form sections visibility
            const sections = document.querySelectorAll(".form-section");
            sections.forEach((section, i) => {
                section.classList.toggle("hidden", i !== this.currentStep);
            });

            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");
            
            if (prevBtn) {
                prevBtn.disabled = this.currentStep === 0;
            }
            
            if (nextBtn) {
                nextBtn.textContent = this.currentStep === sections.length - 1 ? "Submit" : "Next";
            }
        },

        collectHealthFormData() {
            const healthData = {};

            const healthFields = [
                { response: 'allergiesResponse', details: 'allergiesDetails' },
                { response: 'headachesResponse', details: 'headachesDetails' },
                { response: 'hospitalizationResponse', details: 'hospitalizationDetails' },
                { response: 'chronicConditionsResponse', details: 'chronicConditionsDetails' },
                { response: 'medicationResponse', details: 'medicationDetails' },
                { response: 'correctiveLensesResponse', details: 'correctiveLensesDetails' },
                { response: 'disabilitiesResponse', details: 'disabilitiesDetails' },
                { response: 'vaccinationResponse', details: 'vaccinationDetails' },
                { response: 'mentalHealthResponse', details: 'mentalHealthDetails' }
            ];

            healthFields.forEach((field, index) => {
                const response = document.querySelector(`input[name="${field.response}"]:checked`);
                const details = document.querySelector(`textarea[name="${field.details}"]`);
                
                // Set default value if no response is selected
                healthData[field.response] = response ? response.value : 'no';
                
                // Set details (can be empty)
                healthData[field.details] = details ? details.value : '';
            });
            
            return healthData;
        },
        async saveHealthForm() {
            try {
                const healthData = this.collectHealthFormData();
                
                const formData = new FormData();
                formData.append('action', 'save_health_form');
                Object.keys(healthData).forEach(key => {
                    formData.append(key, healthData[key]);
                });
                
                const response = await fetch('/ncst/functions/admission_functions.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.status === 'success') {
                    this.healthFormID = result.healthFormID;
                    return true;
                } else {
                    this.showError(result.message);
                    return false;
                }
            } catch (error) {
                this.showError('Failed to save health form data');
                return false;
            }
        },

        async saveHealthFormWithStudentID(studentID) {
            try {
                const healthData = this.collectHealthFormData();
                healthData.studentID = studentID; // add the studentID
                
                const formData = new FormData();
                formData.append('action', 'save_health_form');
                Object.keys(healthData).forEach(key => {
                    formData.append(key, healthData[key]);
                });
                
                const response = await fetch('/ncst/functions/admission_functions.php', {
                    method: 'POST',
                    body: formData
                });
                
                const responseText = await response.text();
                
                let result;
                try {
                    result = JSON.parse(responseText);
                } catch (error) {
                    this.showError('Server error occurred. Please check the console for details.');
                    return false;
                }
                
                if (result.status === 'success') {
                    this.healthFormID = result.healthFormID;
                    return true;
                } else {
                    this.showError(result.message);
                    return false;
                }
            } catch (error) {
                this.showError('Failed to save health form data');
                return false;
            }
        },

        async submitAdmission() {
            if (!this.student.firstName || !this.student.lastName || !this.student.address || 
                !this.student.zip || !this.student.phone || !this.student.birthDate || 
                !this.student.birthPlace || !this.student.email) {
                this.showError('Please complete the essential personal information fields (First Name, Last Name, Address, ZIP, Phone, Birth Date, Birth Place, Email).');
                return;
            }
            
            if (!this.isValidEmail(this.student.email)) {
                this.showError('Please enter a valid email address.');
                return;
            }
            
            if (!this.student.course || this.student.course === '0') {
                this.showError('Please select your desired course.');
                return;
            }
            
            if (!this.student.houseHeroes || this.student.houseHeroes === '0') {
                this.showError('Please select a House of Heroes.');
                return;
            }
            
            if (!this.student.nstp || this.student.nstp === '0') {
                this.showError('Please select an NSTP component.');
                return;
            }
            
            this.loading = true;
            
            try {
                const formData = new FormData();
                formData.append('action', 'admission');
                formData.append('student', JSON.stringify(this.student));
                formData.append('education', JSON.stringify(this.education));
                formData.append('parent', JSON.stringify(this.parent));
                
                const response = await fetch('/ncst/functions/admission_functions.php', {
                    method: 'POST',
                    body: formData
                });
                
                const responseText = await response.text();
                
                let result;
                try {
                    result = JSON.parse(responseText);
                } catch (error) {
                    this.showError('Server returned invalid response. Please try again.');
                    return;
                }
                
                if (result.status === 'success') {
                    const studentID = result.studentID;

                    if (!this.healthFormID) {
                        const healthSaved = await this.saveHealthFormWithStudentID(studentID);
                        if (!healthSaved) {
                            this.loading = false;
                            return;
                        }
                    }
                    
                    this.formSubmitted = true;
                    this.showSuccess(result.message);

                    setTimeout(() => {
                        window.location.href = '/ncst/logins/student_login.php';
                    }, 3000);
                } else {
                    this.showError(result.message);
                }
                
            } catch (error) {
                this.showError('An error occurred during submission. Please try again.');
            } finally {
                this.loading = false;
            }
        },

        showSuccess(message) {
            this.message = message;
            this.messageType = 'success';

            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: message,
                    confirmButtonColor: '#1d4ed8'
                });
            } else {
                alert('Success: ' + message);
            }
        },

        showError(message) {
            this.message = message;
            this.messageType = 'error';

            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message,
                    confirmButtonColor: '#dc2626'
                });
            } else {
                alert('Error: ' + message);
            }
        },

        resetForm() {
            this.student = {
                firstName: '',
                midName: '',
                lastName: '',
                suffix: '',
                address: '',
                zip: '',
                phone: '',
                gender: '0',
                civilStatus: '0',
                nationality: '0',
                birthDate: '',
                birthPlace: '',
                email: '',
                religion: '0',
                employer: '',
                position: '',
                course: '0',
                houseHeroes: '0',
                nstp: '0'
            };
            
            this.education = {
                primarySchool: '',
                primaryYear: '',
                secondarySchool: '',
                secondaryYear: '',
                tertiarySchool: '',
                tertiaryYear: '',
                courseGraduated: ''
            };
            
            this.parent = {
                fatherFirstName: '',
                fatherMidName: '',
                fatherLastName: '',
                fatherSuffix: '',
                fatherAddress: '',
                fatherPhone: '',
                fatherOccupation: '',
                motherFirstName: '',
                motherMidName: '',
                motherLastName: '',
                motherAddress: '',
                motherPhone: '',
                motherOccupation: '',
                guardianFirstName: '',
                guardianMidName: '',
                guardianLastName: '',
                guardianSuffix: '',
                guardianAddress: '',
                guardianPhone: '',
                guardianOccupation: '',
                guardianRelationship: ''
            };
            
            this.currentStep = 0;
            this.healthFormID = null;
            this.formSubmitted = false;
            this.updateStepper();
        },

        autoSave() {
            const formData = {
                student: this.student,
                education: this.education,
                parent: this.parent,
                currentStep: this.currentStep
            };
            
            localStorage.setItem('ncst_admission_form', JSON.stringify(formData));
        },

        loadSavedData() {
            const savedData = localStorage.getItem('ncst_admission_form');
            
            if (savedData) {
                try {
                    const data = JSON.parse(savedData);
                    this.student = data.student || this.student;
                    this.education = data.education || this.education;
                    this.parent = data.parent || this.parent;
                    this.currentStep = 0;
                    this.updateStepper();
                } catch (error) {
                    
                }
            }
        },
        
        // clear saved data
        clearSavedData() {
            localStorage.removeItem('ncst_admission_form');
        },

        fixAriaHiddenIssues() {
            const formContainers = document.querySelectorAll('.pt-15.overflow-x-hidden, #admissionApp, .form-section');
            formContainers.forEach(container => {
                if (container.hasAttribute('aria-hidden')) {
                    container.removeAttribute('aria-hidden');
                }
            });

            const formElements = document.querySelectorAll('input, select, textarea, button');
            formElements.forEach(element => {
                if (element.hasAttribute('aria-hidden')) {
                    element.removeAttribute('aria-hidden');
                }
            });

            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'aria-hidden') {
                        const target = mutation.target;
                        if (target.classList.contains('pt-15') || 
                            target.id === 'admissionApp' || 
                            target.classList.contains('form-section')) {
                            target.removeAttribute('aria-hidden');
                        }
                    }
                });
            });

            const formContainer = document.querySelector('.pt-15.overflow-x-hidden');
            if (formContainer) {
                observer.observe(formContainer, {
                    attributes: true,
                    attributeFilter: ['aria-hidden']
                });
            }
        }
    },
    
    mounted() {
        this.loadSavedData();

        setInterval(() => {
            if (!this.formSubmitted) {
                this.autoSave();
            }
        }, 30000);

        if (this.formSubmitted) {
            this.clearSavedData();
        }

        this.syncWithNavigation();

        this.fixAriaHiddenIssues();

        window.nextPrev = (n) => {
            if (n === 1 && this.currentStep === 6) {
                this.submitAdmission();
                return;
            }
            
            this.currentStep += n;
            if (this.currentStep < 0) this.currentStep = 0;
            if (this.currentStep >= 7) this.currentStep = 6;
            
            this.updateStepper();
            this.syncWithNavigation();
        };

        window.showTab = (n) => {
            this.currentStep = n;
            this.updateStepper();
            this.syncWithNavigation();
        };

        window.updateStepper = (stepIndex) => {
            this.currentStep = stepIndex;
            this.updateStepper();
        };
    }
}).mount('#admissionApp'); 