<?php 
    include(__DIR__ . '/../functions/saving_session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="/ncst/js/tailwind-css.js"></script>
    <script src="/ncst/js/flowbite.min.js"></script>
    <link rel="stylesheet" href="/ncst/css/custom_animation.css">
    <link rel="stylesheet" href="/ncst/css/sweetalert2.min.css">
</head>
<body class="relative bg-blue-950/65 bg-[url('/ncst/img/ncst_field.jpg')] bg-blend-overlay bg-cover bg-center bg-no-repeat min-h-screen after:absolute after:inset-0 after:backdrop-blur-sm after:content-[''] after:z-0">
    <div class="py-9 min-h-screen flex items-center justify-center relative z-10" id="adminLoginApp">
        <!-- LOGIN CARD -->
        <div class="animation-fade-bottom bg-gray-200 rounded-2xl shadow-2xl border border-gray-200 overflow-hidden w-full max-w-md p-8 sm:p-10 relative">
            <!-- Logo + Portal Text -->
            <div class="flex flex-col items-center text-center mb-6">
            <div class="w-16 h-16 mb-2">
                <img src="/ncst/img/ncst-edu-icon.png" class="w-full h-full">
            </div>
            <h1 class="text-blue-950 text-2xl sm:text-3xl font-bold">NCST PORTAL</h1>
            </div>

            <!--Admin Login Form-->
            <form @submit.prevent="handleLogin" class="space-y-4">
                <div>
                <label class="block text-sm sm:text-base text-gray-700 font-bold mb-1">Email Address</label>
                <input v-model="email" type="email" name="email" required
                    class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded px-4 py-2 w-full text-sm sm:text-base"
                    placeholder="Type Email Address Here">
                </div>

                <div>
                <label class="block text-sm sm:text-base text-gray-700 font-bold mb-1">Password</label>
                <div class="relative">
                    <input v-model="password" :type="showPassword ? 'text' : 'password'" name="password" required
                    class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded px-4 py-2 w-full text-sm sm:text-base pr-10"
                    placeholder="Type Password Here">
                    <button type="button" @click="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <svg v-if="showPassword" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                    </svg>
                    <svg v-else class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    </button>
                </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-center">
                <input id="formTerms" v-model="terms" type="checkbox" name="terms" value="true"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-blue-500" required>
                <label for="formTerms" class="ms-2 text-xs sm:text-sm text-gray-900">I agree with the
                    <a href="#" onclick="openModal()" class="text-blue-600 hover:underline">terms and conditions</a>.
                </label>
                </div>

                <div>
                <button type="submit" :disabled="loading"
                    class="bg-blue-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-blue-950 hover:text-white text-sm sm:text-base disabled:opacity-50 disabled:cursor-not-allowed">
                    <span v-if="loading">Logging in...</span>
                    <span v-else>Login</span>
                </button>
                </div>
            </form>
            </div>
        </div>

        <!-- TERMS MODAL -->
        <div id="termsModal"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-white/30 backdrop-blur-sm bg-opacity-50 px-4 sm:px-6 lg:px-8">
            <div
            class="bg-white rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto p-6 relative dark:bg-gray-800">
            <button onclick="closeModal()"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl font-bold dark:text-white">
                &times;
            </button>
            <h2 class="text-xl sm:text-2xl font-bold mb-4 text-gray-900 dark:text-white">Terms and Conditions</h2>
            <div class="text-sm sm:text-base text-gray-700 dark:text-gray-300 text-justify leading-relaxed">
                <p>
                Users agree that no action shall be taken to impose unreasonable or disproportionately large load on the infrastructure 
                of the site or NCST's systems or networks, or any systems or networks connected to the site or to NCST in general.
                You may not attempt to gain unauthorized access to any portion or feature of the site, or any other systems or networks connected
                to the site or to any NCST server, or to any services offered on or through the site, by hacking, password "mining" or
                any other illegitimate means. <br><br>
                Users may not use anyone else's login credentials, password, or account. NCST cannot and will not be liable for any loss
                or damage arising from your failure to comply with these obligations. Additionally, by using this site, you acknowledge and 
                agree that Internet transmissions are never completely private or secure. You understand that any message or information you send
                to the site may be read or intercepted by others. NCST provides the use of this site on an "as-is" basis without 
                warranting any aspect of its Services. <br><br>
                Therefore, users are on notice that they access and use the site at their own risk. Using NCST's site and remote
                servers constitute full agreement and understanding of this policy. NCST reserves the right to modify this policy without 
                permission or consent of its users or recipients. <br><br>
                By checking the box, you agree to all the policies stated above and acknowledge that you have read and understood them.
                </p>

                <div class="mt-3 flex items-center justify-center">
                <input id="modalTerms" type="checkbox" name="terms" value="true" onclick="checkTerms()"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    required>
                <label for="modalTerms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">I agree with the terms and conditions</label>
                </div>
            </div>
            </div>
        </div>
        </div>


    <script src="/ncst/js/vue.global.js"></script>
    <script src="/ncst/js/sweetalert2.min.js"></script>
    <script src="/ncst/js/login_vue.js"></script>
    <script src="/ncst/js/custom_script.js"></script>
</body>
</html>


