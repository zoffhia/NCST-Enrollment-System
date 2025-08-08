<?php include('includes/reg_header.php');?>

<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="mt-25 inline-flex items-center p-2 mt-2 ms-3 text-sm text-white bg-blue-800 rounded-lg sm:hidden hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300">
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16"><path fill="currentColor" d="M7.62 7.18L2.79 3.03c-.7-.6-1.79-.1-1.79.82v8.29c0 .93 1.09 1.42 1.79.82l4.83-4.14c.5-.43.5-1.21 0-1.64"/></svg>
    <span class="sr-only">Open sidebar</span>
</button>

<div class="md:pt-15 sm:ml-64 overflow-x-hidden ">
  <!--Main-->
    <div class="pt-10 pb-10 flex justify-center">
    <div id="card" class="animation-fade-bottom 
                       w-full 
                       md:flex 
                       flex-col md:flex-row 
                       rounded-lg 
                       overflow-hidden 
                       shadow-xl 
                       bg-white 
                       border-3 
                       border-blue-950 
                       sm:w-[95%] 
                       lg:w-[90%] 
                       xl:w-[85%] 
                       overflow-x-auto">
        <!-- Sidebar (For desktop/larger screen sizes) -->
        <div class="hidden md:flex md:w-1/3 bg-blue-950 text-white p-6 justify-center">
            <ol class="space-y-8 w-full" id="desktop-stepper">
                <!-- Steppers -->
                <li class="step-item flex items-start space-x-4">
                <span class="step-circle w-10 h-10 bg-green-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white shrink-0">1</span>
                    <div class="flex-1">
                        <h3 class="font-medium mt-1 break-words">Personal Information</h3>
                    </div>
                </li>

                <li class="step-item flex items-start space-x-4">
                <span class="step-circle w-10 h-10 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white shrink-0">2</span>
                    <div class="flex-1">
                        <h3 class="font-medium mt-1 break-words">Educational Background</h3>
                    </div>
                </li>

                <li class="step-item flex items-start space-x-4">
                <span class="step-circle w-10 h-10 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white shrink-0">3</span>
                    <div class="flex-1">
                        <h3 class="font-medium mt-1 break-words">Work Information</h3>
                    </div>
                </li>

                <li class="step-item flex items-start space-x-4">
                <span class="step-circle w-10 h-10 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white shrink-0">4</span>
                    <div class="flex-1">
                        <h3 class="font-medium mt-1 break-words">Course, House of Heroes & NSTP</h3>
                    </div>
                </li>

                <li class="step-item flex items-start space-x-4">
                <span class="step-circle w-10 h-10 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white shrink-0">5</span>
                    <div class="flex-1">
                        <h3 class="font-medium mt-1 break-words">Parent / Guardian Information</h3>
                    </div>
                </li>

                <li class="step-item flex items-start space-x-4">
                <span class="step-circle w-10 h-10 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white shrink-0">6</span>
                    <div class="flex-1">
                        <h3 class="font-medium mt-1 break-words">Submit</h3>
                    </div>
                </li>
            </ol>
        </div>

        <!--Form section-->
        <div id="admissionApp" class="md:w-2/3 w-full grid place-items-center p-6">
        <!--Mobile step circles-->
        <div class="flex md:hidden justify-center mb-6 space-x-4" id="mobile-stepper">
            <span class="step-circle w-8 h-8 bg-green-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white">1</span>
            <span class="step-circle w-8 h-8 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white">2</span>
            <span class="step-circle w-8 h-8 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white">3</span>
            <span class="step-circle w-8 h-8 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white">4</span>
            <span class="step-circle w-8 h-8 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white">5</span>
            <span class="step-circle w-8 h-8 bg-teal-200 text-blue-900 font-bold rounded-full flex items-center justify-center ring-2 ring-white">6</span>
        </div>

            <!--Form-->
            <form @submit.prevent="submitAdmission" id="regForm" method="post" class="w-full space-y-6 px-2 sm:px-4">

                <!--Personal info-->
                <div class="form-section" id="personal_info">
                <h2 class="text-xl font-bold mb-4">I. Personal Information</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-5">
                    <input v-model="student.firstName" type="text" name="firstName" placeholder="First Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="student.midName" type="text" name="midName" placeholder="Middle Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="student.lastName" type="text" name="lastName" placeholder="Last Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="student.suffix" type="text" name="suffix" placeholder="Suffix" class="w-full border border-gray-500 p-2 rounded"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
                    <div class="lg:col-span-3 sm:col-span-2 col-span-1">
                    <input v-model="student.address" type="text" name="address" placeholder="Complete Address (Region/Town/Barangay/Subdivision/House No.)" class="w-full border border-gray-500 p-2 rounded" required/>
                    </div>

                    <div class="lg:col-span-1 sm:col-span-4">
                    <input v-model="student.zip" type="text" name="zip" placeholder="ZIP Code" class="w-full border border-gray-500 p-2 rounded" required/>
                    </div>
                </div>

                <div class="gap-4 mb-5">
                    <input v-model="student.phone" type="tel" name="phone" placeholder="Phone Number" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 gap-4 mb-5">
                    <select v-model="student.gender" name="gender" id="gender" class="p-2 rounded text-black w-full border border-gray-500 p-2 rounded" required>
                    <option value="0" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>

                    <select v-model="student.civilStatus" name="civilStatus" id="civilStatus" class="p-2 rounded text-black w-full border border-gray-500 p-2 rounded" required>
                    <option value="0" disabled selected>Select Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    </select>

                    <select v-model="student.nationality" name="nationality" id="nationality" class="p-2 rounded text-black w-full border border-gray-500 p-2 rounded" required>
                    <option value="0" disabled selected>Select Nationality</option>
                    <option value="American">American</option>
                    <option value="Australian">Australian</option>
                    <option value="Brazilian">Brazilian</option>
                    <option value="British">British</option>
                    <option value="Canadian">Canadian</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Filipino">Filipino</option>
                    <option value="French">French</option>
                    <option value="German">German</option>
                    <option value="Indian">Indian</option>
                    <option value="Indonesian">Indonesian</option>
                    <option value="Italian">Italian</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Korean">Korean</option>
                    <option value="Malaysian">Malaysian</option>
                    <option value="Mexican">Mexican</option>
                    <option value="Russian">Russian</option>
                    <option value="Singaporean">Singaporean</option>
                    <option value="South African">South African</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Thai">Thai</option>
                    <option value="Vietnamese">Vietnamese</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-4 mb-5">
                    <input v-model="student.birthDate" type="date" name="birthDate" placeholder="Date of Birth" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="student.birthPlace" type="text" name="birthPlace" placeholder="Birth Place" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-4 mb-5">
                    <input v-model="student.email" type="email" name="email" placeholder="Email Address" class="w-full border border-gray-500 p-2 rounded" required/>
                    <select v-model="student.religion" name="religion" id="religion" class="p-2 rounded text-black w-full border border-gray-500 p-2 rounded" required>
                    <option value="0" disabled selected>Select Religion</option>
                    <option value="Agnostic">Agnostic</option>
                    <option value="Atheist">Atheist</option>
                    <option value="Born Again Christian">Born Again Christian</option>
                    <option value="Catholic">Catholic</option>
                    <option value="Christian">Christian</option>
                    <option value="Hinduism">Hinduism</option>
                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                    <option value="Islam">Islam</option>
                    <option value="Jehovas Witness">Jehovas Witness</option>
                    <option value="Judaism">Judaism</option>
                    <option value="Protestant">Protestant</option>
                    <option value="Roman Catholic">Roman Catholic</option>
                    <option value="Scientology">Scientology</option>
                    <option value="Shinto">Shinto</option>
                    <option value="Taoist">Taoist</option>
                    </select>
                
                </div>
                </div>

                <!--Educ background-->
                <div class="form-section hidden" id="education">
                <h2 class="text-xl font-bold mb-4">II. Educational Background</h2>

                <div class="mb-5">
                    <label for="primary" class="font-semibold">Primary School</label>
                    <input v-model="education.primarySchool" type="text" name="primarySchool" placeholder="Primary School" id="primarySchool" class="w-full border border-gray-500 p-2 rounded mb-2" />
                    <input v-model="education.primaryYear" type="text" name="primaryYear" placeholder="Year Graduated" class="w-full border border-gray-500 p-2 rounded" />
                </div>
                
                <div class="mb-5">
                    <label for="secondary" class="font-semibold">Secondary School</label>
                    <input v-model="education.secondarySchool" type="text" name="secondarySchool" placeholder="Secondary School" class="w-full border border-gray-500 p-2 rounded mb-2" />
                    <input v-model="education.secondaryYear" type="text" name="secondaryYear" placeholder="Year Graduated" class="w-full border border-gray-500 p-2 rounded" />
                </div>

                <div class="mb-5">
                    <label for="tertiary" class="font-semibold">Tertiary School</label>
                    <input v-model="education.tertiarySchool" type="text" name="tertiarySchool" placeholder="Tertiary School" class="w-full border border-gray-500 p-2 rounded mb-2" />
                    <input v-model="education.tertiaryYear" type="text" name="tertiaryYear" placeholder="Year Graduated" class="w-full border border-gray-500 p-2 rounded mb-2" />
                    <input v-model="education.courseGraduated" type="text" name="courseGraduated" placeholder="Course Graduated" class="w-full border border-gray-500 p-2 rounded" />
                </div>
                
                </div>

                <!--Work info-->
                <div class="form-section hidden" id="work">
                <h2 class="text-xl font-bold mb-1">III. Work Information</h2>
                <p class="text-s text-gray-500 mb-5">
                    If the following does not apply to you, put 'NA' or leave it blank
                </p>
                <input v-model="student.employer" type="text" name="employer" placeholder="Employer Name (if any)" class="w-full border border-gray-500 p-2 rounded mb-5" />
                <input v-model="student.position" type="text" name="position" placeholder="Occupation (if any)" class="w-full border border-gray-500 p-2 rounded"/>
                </div>

                <!--Desired course-->
                <div class="form-section hidden" id="course">
                <h2 class="text-xl font-bold mb-4">IV. Course, House of Heroes & NSTP</h2>
                <h4 class="font-semibold mb-4">Desired Course</h2>
                <select v-model="student.course" name="course" id="selectCourse" class="w-full border border-gray-300 p-2 rounded">
                    <option value="0" disabled selected>Select a course</option>
                    <option value="BAC">Bachelor of Arts in Communication</option>
                    <option value="ACT">Associate in Computer Technology</option>
                    <option value="AOM">Associate in Office Management</option>
                    <option value="BSA">Bachelor of Science in Architecture</option>
                    <option value="BSBA-OM">Bachelor of Science in Business Administration-Operations Management</option>
                    <option value="BSEE">Bachelor of Science in Electronics Engineering</option>
                    <option value="BSE">Bachelor of Science in Entrepreneurship</option>
                    <option value="BSHM">Bachelor of Science in Hospitality Management</option>
                    <option value="BSIE">Bachelor of Science in Industrial Engineering</option>
                    <option value="BSISM">Bachelor of Science in Industrial Security Management</option>
                    <option value="BSMA">Bachelor of Science in Management Accounting</option>
                    <option value="BSPA">Bachelor of Science in Public Administration</option>
                    <option value="BSREM">Bachelor of Science in Real Estate Management</option>
                    <option value="BSAc">Bachelor of Science in Accountancy</option>
                    <option value="BSCpE">Bachelor of Science in Computer Engineering</option>
                    <option value="BSCS">Bachelor of Science in Computer Science</option>
                    <option value="BSCrim">Bachelor of Science in Criminology</option>
                    <option value="BSCA">Bachelor of Science in Customs Administration</option>
                    <option value="BSIT">Bachelor of Science in Information Technology</option>
                    <option value="BSOA">Bachelor of Science in Office Administration</option>
                    <option value="BSPsy">Bachelor of Science in Psychology</option>
                    <option value="BSTM">Bachelor of Science in Tourism Management</option>
                    <option value="BSBA-FM">Bachelor of Science in Business Administration Major in Financial Management</option>
                    <option value="BSBA-MM">Bachelor of Science in Business Administration Major in Marketing-Management</option>
                    <option value="BSED-Eng">Bachelor of Secondary Education Major in English</option>
                    <option value="BSED-Fil">Bachelor of Secondary Education Major in Filipino</option>
                    <option value="BSED-Math">Bachelor of Secondary Education Major in Mathematics</option>
                    <option value="BSED-SS">Bachelor of Secondary Education Major in Social Studies</option>
                    <option value="PEU">Professional Educational Units</option>
                    <option value="TCP">Teacher Certificate Program</option>
                </select>

                <select v-model="student.year" name="year" id="selectYear" class="w-full border border-gray-300 p-2 rounded">
                    <option value="0" disabled selected>Select a course</option>
                    <option value="1st">1st Year</option>
                    <option value="2nd">2nd Year</option>
                    <option value="3rd">3rd Year</option>
                    <option value="4th">4th Year</option>
                </select>

                <!--HOH-->
                <h4 class="font-semibold mb-4 mt-5">House of Heroes</h2>
                <select v-model="student.houseHeroes" name="houseHeroes" id="selectHouse" class="w-full border border-gray-300 p-2 rounded">
                    <option value="0" disabled selected>Select a house</option>
                    <option value="Makabayan">House of Makabayan</option>
                    <option value="Makadiyos">House of Makadiyos</option>
                    <option value="Makatao">House of Makatao</option>
                    <option value="Makakalikasan">House of Makakalikasan</option>
                </select>

                <!--NSTP-->
                <h4 class="font-smibold mb-4 mt-5">National Service Training Program (NSTP) Components</h2>
                <select v-model="student.nstp" name="nstp" id="selectNSTP" class="w-full border border-gray-300 p-2 rounded">
                    <option value="0" disabled selected>Select a house</option>
                    <option value="LTS">Literacy Training Service (LTS)</option>
                    <option value="CWTS">Civic Welfare Training Service (CWTS)</option>
                    <option value="ROTC">Reserve Officers' Training Corps (ROTC)</option>
                </select>
                </div>

                <!--Parent/guardian info-->
                <div class="form-section hidden" id="parent">
                <h2 class="text-xl font-bold mb-4">V. Parent / Guardian</h2>
                <p class="font-semibold">Father's Information</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-5">
                    <input v-model="parent.fatherFirstName" type="text" name="fatherFirstName" placeholder="Father's First Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.fatherMidName" type="text" name="fatherMidName" placeholder="Father's Middle Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.fatherLastName" type="text" name="fatherLastName" placeholder="Father's Last Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.fatherSuffix" type="text" name="fatherSuffix" placeholder="Suffix" class="w-full border border-gray-500 p-2 rounded"/>
                </div>

                <div class="lg:col-span-2 sm:col-span-2 col-span-1 mb-5">
                    <input v-model="parent.fatherAddress" type="text" name="fatherAddress" placeholder="Complete Address" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-5">
                    <input v-model="parent.fatherPhone" type="tel" name="fatherPhone" placeholder="Father's Phone No." class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.fatherOccupation" type="text" name="fatherOccupation" placeholder="Father's Occupation" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>

                <p class="font-semibold">Mother's Information</p>
                <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 gap-4 mb-5">
                    <input v-model="parent.motherFirstName" type="text" name="motherFirstName" placeholder="Mother's First Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.motherMidName" type="text" name="motherMidName" placeholder="Mother's Middle Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.motherLastName" type="text" name="motherLastName" placeholder="Mother's Last Name" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>

                <div class="lg:col-span-2 sm:col-span-2 col-span-1 mb-5">
                    <input v-model="parent.motherAddress" type="text" name="motherAddress" placeholder="Complete Address" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-5">
                    <input v-model="parent.motherPhone" type="tel" name="motherPhone" placeholder="Mother's Phone No." class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.motherOccupation" type="text" name="motherOccupation" placeholder="Mother's Occupation" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>

                <p class="font-semibold">Guardian's Information</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-5">
                    <input v-model="parent.guardianFirstName" type="text" name="guardianFirstName" placeholder="Guardian's First Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.guardianMidName" type="text" name="guardianMidName" placeholder="Guardian's Middle Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.guardianLastName" type="text" name="guardianLastName" placeholder="Guardian's Last Name" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.guardianSuffix" type="text" name="guardianSuffix" placeholder="Suffix" class="w-full border border-gray-500 p-2 rounded"/>
                </div>

                <div class="lg:col-span-2 sm:col-span-2 col-span-1 mb-5">
                    <input v-model="parent.guardianAddress" type="text" name="guardianAddress" placeholder="Complete Address" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 gap-4 mb-5">
                    <input v-model="parent.guardianPhone" type="tel" name="guardianPhone" placeholder="Guardian's Phone No." class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.guardianOccupation" type="text" name="guardianOccupation" placeholder="Guardian's Occupation" class="w-full border border-gray-500 p-2 rounded" required/>
                    <input v-model="parent.guardianRelationship" type="text" name="guardianRelationship" placeholder="Guardian's Relationship to Student" class="w-full border border-gray-500 p-2 rounded" required/>
                </div>
                </div>

                <!--Preview and submit-->
                <div class="form-section hidden" id="submit">
                    <h2 class="text-xl font-bold mb-4">Submit</h2>
                    <p>Review your entries before submitting.</p>
                </div>

                <div class="flex justify-between items-center">
                <a href="index.php#login" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cancel</a>
                
                <div class="flex gap-2">
                    <button type="button" onclick="nextPrev(-1)" class="bg-gray-400 text-white px-4 py-2 rounded disabled:opacity-50 hover:bg-gray-500 cursor-pointer" id="prevBtn">Back</button>
                    <button type="button" onclick="nextPrev(1)" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer" id="nextBtn">Next</button>
                </div>
                </div>
            </form>
    </div>
</div>
</div>



<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    }
</script>



<script>
    let currentTab = 0;
    const sections = document.querySelectorAll(".form-section");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    
    function showTab(n) {
        sections.forEach((section, i) => {
            section.classList.toggle("hidden", i !== n);
        });
        prevBtn.disabled = n === 0;
        nextBtn.textContent = n === sections.length - 1 ? "Submit" : "Next";
    
        updateStepper(n);
    }
    
    function nextPrev(n) {
        if (n === 1 && nextBtn.textContent === "Submit") {
            if (window.__admissionApp__ && typeof window.__admissionApp__.submitAdmission === 'function') {
                window.__admissionApp__.submitAdmission();
            }
            return;
        }
        currentTab += n;
        if (currentTab < 0) currentTab = 0;
        if (currentTab >= sections.length) currentTab = sections.length - 1;
        showTab(currentTab);
    }

    function updateStepper(stepIndex) {
    const desktopCircles = document.querySelectorAll("#desktop-stepper .step-circle");
    const mobileCircles = document.querySelectorAll("#mobile-stepper .step-circle");

        [desktopCircles, mobileCircles].forEach((circles) => {
            circles.forEach((circle, index) => {
        
        circle.classList.remove("bg-green-200", "bg-teal-200", "bg-green-500", "bg-yellow-400", "bg-gray-300");

        if (index < stepIndex) {
            circle.classList.add("bg-green-500"); // completed/previous stepper
        } else if (index === stepIndex) {
            circle.classList.add("bg-yellow-400"); // current stepper
        } else {
            circle.classList.add("bg-teal-200"); // base color of steppers
         }
        });
    });
    }
    showTab(currentTab);
</script>

<script src="/ncst/js/vue.global.js"></script>
<script src="/ncst/js/sweetalert2.min.js"></script>
<script src="/ncst/js/admission_vue.js"></script>

<?php include('includes/footer.php');?>