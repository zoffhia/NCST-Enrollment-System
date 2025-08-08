<?php include('config.php');?>

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
</head>
<body class="relative bg-blue-950/65 bg-[url('/ncst/img/ncst_field.jpg')] bg-blend-overlay bg-cover bg-center bg-no-repeat min-h-screen after:absolute after:inset-0 after:backdrop-blur-sm after:content-[''] after:z-0">

<!--Navigation bar-->
<nav class="relative bg-blue-950 border-gray-700 shadow-xl mb-5 z-10">

  <div class="absolute top-0 left-0 h-full w-24 bg-[url('/ncst/img/border-h1.png')] bg-no-repeat bg-cover bg-left opacity-40 mask-r-from-60% pointer-events-none z-0"></div>
  <div class="absolute top-0 right-0 h-full w-24 bg-[url('/ncst/img/border-h1.png')] bg-no-repeat bg-cover bg-right opacity-40 mask-l-from-60% pointer-events-none z-0"></div>

  <div class="relative z-10 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="/ncst/img/NCST-logo.png" class="h-12" alt="NCST Logo" />
      <span class="text-white font-semibold
                 text-xs xs:text-sm sm:text-base md:text-lg lg:text-xl
                 leading-tight">
        National College of Science & Technology
      </span>
    </a>

    <!-- Mobile menu toggle -->
    <button data-collapse-toggle="navbar-dropdown" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center rounded-lg md:hidden text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-white"
      aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

    <!-- Navbar links -->
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0">
        <!--Home Page-->
        <li>
          <a href="/ncst/index.php"
            class="block py-2 px-3 text-white rounded-sm hover:font-bold hover:text-yellow-400 transition-colors duration-200 relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-current after:transition-all after:duration-300 hover:after:w-full">
                Home
          </a>
        </li>
        <li>
          <a href="/ncst/admission.php" 
            class="block py-2 px-3 text-white rounded-sm hover:text-bold hover:text-yellow-400 md:w-auto transition-colors duration-200
            relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-current after:transition-all after:duration-300 hover:after:w-full">
            Admission
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--End of navigation bar-->

    