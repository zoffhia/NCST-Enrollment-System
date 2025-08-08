<?php 
// Include the student login function at the very beginning
include(__DIR__ . '/../functions/student_login_function.php');
include(__DIR__ . '/../includes/login_header.php');
?>

<div class="py-9 relative z-10">
    <!--LOGIN CARD-->
    <div class="animation-fade-bottom flex flex-col lg:flex-row bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden mx-auto w-full max-w-6xl">
    <div class="relative flex flex-col justify-center items-center w-full lg:w-1/2 bg-blue-950 gap-4 p-4 sm:p-6 overflow-hidden">
        <div class="absolute inset-0 pointer-events-none mask-b-from-20% mask-b-to-80% bg-[url('/ncst/img/pattern1.jpg')] bg-cover bg-center opacity-30 z-0"></div>    
        <div class="relative z-10 flex flex-col items-center text-center mb-4">
            <div class="w-16 h-16 mb-2">
                 <img src="/ncst/img/ncst-edu-icon.png" class="w-full h-full">
            </div>

            <h1 class="text-white text-xl sm:text-2xl font-bold">NCST PORTAL</h1>
            <p class="text-white text-sm sm:text-base opacity-80">Select your role to login</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 gap-2 w-full max-w-md mx-auto">
            <!-- Student -->
            <a href="student_login.php" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-4 rounded text-xs sm:text-sm flex flex-col items-center gap-1 border border-transparent hover:border-white transition duration-300 ease-in-out">
                <svg class="w-6 h-6 sm:w-7 sm:h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="currentColor" d="M16 8c0 2.21-1.79 4-4 4s-4-1.79-4-4l.11-.94L5 5.5L12 2l7 3.5v5h-1V6l-2.11 1.06zm-4 6c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/>
                </svg>
                <span>Student</span>
            </a>

            <!-- Employee -->
            <a href="employee_login.php" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-4 rounded text-xs sm:text-sm flex flex-col items-center gap-1 border border-transparent hover:border-white transition duration-300 ease-in-out">
                <svg class="w-6 h-6 sm:w-7 sm:h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 3c2.21 0 4 1.79 4 4s-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4m4 10.54c0 1.06-.28 3.53-2.19 6.29L13 15l.94-1.88c-.62-.07-1.27-.12-1.94-.12s-1.32.05-1.94.12L11 15l-.81 4.83C8.28 17.07 8 14.6 8 13.54c-2.39.7-4 1.96-4 3.46v4h16v-4c0-1.5-1.6-2.76-4-3.46"/>
                </svg>
                <span>Employee</span>
            </a>
        </div>
    </div>

            <div class="w-full p-8 lg:w-1/2">
                <h2 id="title" class="text-2xl sm:text-3xl font-bold text-gray-700 text-center">STUDENT LOGIN</h2>
                <p class="text-base sm:text-xl text-gray-600 text-center mb-4 sm:mb-5">Welcome back!</p>

                <!--Form-->
                <div id="studentLoginApp">
                    <form @submit="handleLogin">
                        <div> 
                            <div class="mt-4">
                                <label for="studentNo" class="block text-sm sm:text-base text-gray-700 font-bold mb-1 sm:mb-2">Student ID No.</label>
                                <input v-model="studentNo" name="studentNo" id="studentNo" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-1.5 sm:py-2 px-3 sm:px-4 block w-full text-sm sm:text-base" type="text" placeholder="Enter your Student ID" required>
                            </div>

                            <div class="mt-4">
                                <label for="password" class="block text-sm sm:text-base text-gray-700 font-bold mb-1 sm:mb-2">Password</label>
                                <input v-model="password" name="password" id="password" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-1.5 sm:py-2 px-3 sm:px-4 block w-full text-sm sm:text-base" type="password" placeholder="Type Password Here" required/>
                            </div>
                        </div>

                        <!--Terms and Conditions Checkbox-->
                        <div class="mt-2 flex items-center justify-center">
                            <input v-model="terms" id="formTerms" type="checkbox" name="terms" value="true" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                            <label for="formTerms" class="ms-2 text-xs sm:text-sm font-medium text-gray-900 dark:text-gray-500">I agree with the <a href="#" onclick="openModal()" class="text-blue-600 dark:text-blue-500 hover:underline">terms and conditions</a>.</label>
                        </div>
                        <div class="mt-8">
                            <button :disabled="loading" class="bg-blue-700 text-white font-bold py-2 sm:py-3 px-4 w-full rounded hover:bg-blue-950 hover:text-white hover:font-semibold text-sm sm:text-base disabled:opacity-50">
                                <span v-if="loading">Logging in...</span>
                                <span v-else>Login</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!--Forgot Pass Btn-->
                <div class="mt-4 flex items-center justify-center gap-2 sm:gap-4">
                    <span class="flex-1 border-b"></span>
                        <a href="/ncst/forgot_pass.php" class="text-[10px] sm:text-xs hover:underline text-gray-800 uppercase whitespace-nowrap">Forgot Password?</a>
                    <span class="flex-1 border-b"></span>
                </div>

            </div>
        </div>


        <div id="termsModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-white/30 backdrop-blur-sm bg-opacity-50 px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl max-h-[90vh] overflow-y-auto p-6 relative">
                
            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 dark:hover:text-white text-2xl font-bold">
                &times; <!-- (x) icon-->
            </button>

            <h2 class="text-xl sm:text-2xl font-bold mb-4 text-gray-900 dark:text-white">Terms and Conditions</h2>

            <!-- Terms and Conditions Details -->
            <div class="text-sm sm:text-base text-gray-700 dark:text-gray-300">
                <p class="leading-relaxed text-justify">
                    Users agree that no action shall be taken to impose unreasonable or disproportionately large load on the infrastructure 
                    of the site or NCST's systems or networks, or any systems or networks connected to the site or to NCST in general.
                    You may not attempt to gain unauthorized access to any portion or feature of the site, or any other systems or networks connected
                    to the site or to any NCST server, or to any services offered on or through the site, by hacking, password "mining" or
                    any other illegitimate means. <br> <br>
                    Users may not use anyone else's login credentials, password, or account. NCST cannot and will not be liable for any loss
                    or damage arising from your failure to comply with these obligatiosns. Additionally, by using this site, you acknowledge and 
                    agree that Internet transmissions are never completely private or secure. You understand that any message or information you send
                    to the site may be read or intercepted by others. NCST provides the use of this site on an "as-is" basis wihtout 
                    warranting any aspect of its Services. <br> <br>
                    Therefore, users are on noticw that they access and use the site at their own risk. Using NCST's site and remote
                    servers constitute full agreement and understanding of this policy, NCST reserves the right to modify this policy without 
                    permission or consent of its users or recipients. <br> <br>
                    By checking the box, you agree to all the policies stated above and acknowledge that you have read and understood them.
                </p>

                <!--Another Terms and Conditions Checkbox inside modal-->
                <div class="mt-3 flex items-center justify-center">
                    <input id="modalTerms" type="checkbox" name="terms" value="true" onclick="checkTerms()" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                    <label for="modalTerms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">I agree with the terms and conditions</label>
                </div>
            </div>
        </div>
    </div>
<!--End of login card-->
</div>

<script src="/ncst/js/custom_script.js"></script>
<script src="/ncst/js/vue.global.js"></script>
<script src="/ncst/js/sweetalert2.min.js"></script>
<script src="/ncst/js/login_vue.js"></script>

<?php include('../includes/footer.php'); ?>
