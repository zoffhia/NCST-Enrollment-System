<?php 
    include('config.php');
    include(__DIR__ . '/../functions/saving_session.php');

    checkAdminSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCST Enrollment System</title>
    <link rel="icon" href="/ncst/img/ncst-edu-icon.png">
    <script src="/ncst/js/tailwind-css.js"></script>
    <script src="/ncst/js/flowbite.min.js"></script>
    <link rel="stylesheet" href="/ncst/css/custom_animation.css">
    <link rel="stylesheet" href="/ncst/css/sweetalert2.min.css">
    <script src="/ncst/js/sweetalert2.min.js"></script>
    <script src="/ncst/js/logout_vue.js"></script>
</head>
<body class="bg-gray-200">

<nav class="fixed top-0 z-50 w-full bg-blue-950 shadow-lg">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="absolute right-0 top-0 h-full w-24 mask-l-from-50% mask-l-to-90% bg-[url('/ncst/img/border-h1.png')] bg-repeat bg-center opacity-60"></div>

            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-100 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="/ncst/img/NCST-logo.png" class="h-12" alt="NCST Logo" />
                    <span class="text-white font-semibold
                 text-xs xs:text-sm sm:text-base md:text-lg lg:text-xl
                 leading-tight">
                        National College of Science & Technology
                    </span>
                </a>
                </div>

                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                        <button type="button" class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                        </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</nav>
      
<aside id="logo-sidebar" class="flex flex-col fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-blue-950 border-r border-gray-700 transition-transform -translate-x-full sm:translate-x-0">
    <div class="h-full overflow-y-auto bg-blue-950 flex flex-col">  
        <!-- Profile -->
        <div class="flex flex-col items-center py-4 border-b border-gray-700">
            <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="100" height="100" viewBox="0 0 32 32" fill="currentColor">
                    <path d="M16 2C8.268 2 2 8.268 2 16s6.268 14 14 14s14-6.268 14-14S23.732 2 16 2m0 22.5c-3.866 0-7-2.429-7-6.071A2.43 2.43 0 0 1 11.429 16h9.142A2.43 2.43 0 0 1 23 18.429c0 3.642-3.134 6.071-7 6.071m0-10A3.75 3.75 0 1 1 16 7a3.75 3.75 0 0 1 0 7.5"/>
                </svg>
            </div>

            <h2 class="text-lg font-semibold text-white"><?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Admin User'; ?></h2>
            <p class="text-sm text-gray-300"><?php echo isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : 'admin@ncst.edu.ph'; ?></p>
            <hr>
        </div>
      
        <!-- Menu -->
        <ul class="space-y-2 font-medium mt-4 flex-1">
            <li>
                <a href="/ncst/portals/admin_portal.php" class="flex items-center justify-start gap-2 text-white p-3 rounded-lg hover:bg-blue-800">
                    <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                        <path fill="currentColor" fill-rule="evenodd" d="M42.667 85.332h426.666v341.333H42.667zm192 256h42.666v21.333h-42.666zm106.666-64h-42.666v85.333h42.666zm21.334-42.667h42.666v128h-42.666zm64-106.666H85.333v42.666h341.334zm-192 160c0 41.237-33.43 74.666-74.667 74.666s-74.667-33.429-74.667-74.666c0-41.238 33.43-74.667 74.667-74.667s74.667 33.429 74.667 74.667m-51.394-47.988A53.3 53.3 0 0 0 160 234.665v53.334l51.862 12.44a53.336 53.336 0 0 0-28.589-60.428" clip-rule="evenodd"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/ncst/user_mngmnt.php" class="flex items-center justify-start gap-2 text-white p-3 rounded-lg hover:bg-blue-800">
                <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 2048 2048">
                    <path fill="currentColor" d="M1148 1152q-83-62-179-95t-201-33q-88 0-170 23t-153 64t-129 100t-100 130t-65 153t-23 170H0q0-120 35-231t101-205t156-167t204-115q-56-35-100-82t-76-104t-47-119t-17-129q0-106 40-199t110-162T569 41T768 0t199 40t162 110t110 163t41 199q0 66-16 129t-48 119t-76 103t-101 83q60 23 113 54v152zM384 512q0 80 30 149t82 122t122 83t150 30q79 0 149-30t122-82t83-122t30-150q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149m1664 768v768H1024v-768h256v-256h512v256zm-640 0h256v-128h-256zm512 384h-128v128h-128v-128h-256v128h-128v-128h-128v256h768zm0-256h-768v128h768z"/>
                </svg>
                <span>User Management</span>
                </a>
            </li>

            <li>
                <a href="/ncst/department_view.php" class="flex items-center justify-start gap-2 text-white p-3 rounded-lg hover:bg-blue-800">
                <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M4 3.5A1.5 1.5 0 0 1 5.5 2h6A1.5 1.5 0 0 1 13 3.5V8h1.5A1.5 1.5 0 0 1 16 9.5v1.234q-.28.14-.51.348a2.75 2.75 0 1 0-4.54 3A2.6 2.6 0 0 0 9 16.6c0 .462.09.946.296 1.4H4.5a.5.5 0 0 1-.5-.5zm3.5 2.25a.75.75 0 1 0-1.5 0a.75.75 0 0 0 1.5 0M6.75 8a.75.75 0 1 0 0 1.5a.75.75 0 0 0 0-1.5m.75 3.75a.75.75 0 1 0-1.5 0a.75.75 0 0 0 1.5 0M10.25 5a.75.75 0 1 0 0 1.5a.75.75 0 0 0 0-1.5M11 8.75a.75.75 0 1 0-1.5 0a.75.75 0 0 0 1.5 0m3.75 3.5a1.75 1.75 0 1 1-3.5 0a1.75 1.75 0 0 1 3.5 0m3.5.5a1.25 1.25 0 1 1-2.5 0a1.25 1.25 0 0 1 2.5 0M16 16.6c0 1.183-.8 2.4-3 2.4s-3-1.216-3-2.4a1.6 1.6 0 0 1 1.6-1.6h2.8a1.6 1.6 0 0 1 1.6 1.6m.704 1.4h.046c1.65 0 2.25-.912 2.25-1.8a1.2 1.2 0 0 0-1.2-1.2h-1.35c.345.441.55.997.55 1.6a3.4 3.4 0 0 1-.296 1.4"/>
                </svg>
                <span>Department & Employees</span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center justify-start gap-2 text-white p-3 rounded-lg hover:bg-blue-800">
                <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M14 8V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-2"/><path d="M9 12h12l-3-3m0 6l3-3"/></g></svg>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

        <div class="mask-t-from-25% bg-[url('/ncst/img/pattern1.jpg')] bg-cover bg-repeat bg-center h-24 w-full flex-grow-0 m-0 p-0 opacity-25"></div>
        <div class="mask-t-from-100% bg-[url('/ncst/img/pattern1.jpg')] bg-cover bg-repeat bg-center h-24 w-full flex-grow-0 m-0 p-0 opacity-50 -scale-x-100"></div>          
        <div class="mask-t-from-100% bg-[url('/ncst/img/pattern1.jpg')] bg-cover bg-repeat bg-center h-24 w-full flex-grow-0 m-0 p-0 opacity-60"></div>
    </div>
</aside>