<?php include('config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCST Admission</title>
    <link rel="icon" href="/ncst/img/ncst-edu-icon.png">
    <script src="/ncst/js/tailwind-css.js"></script>
    <script src="/ncst/js/flowbite.min.js"></script>
    <link rel="stylesheet" href="/ncst/css/custom_animation.css">
    <link rel="stylesheet" href="/ncst/css/sweetalert2.min.css">
</head>
<body class="relative bg-white/45 bg-[url('/ncst/img/pattern1.jpg')] bg-blend-overlay bg-cover bg-center bg-no-repeat min-h-screen">

<nav class="fixed top-0 z-50 w-full bg-blue-950 shadow-lg z-10">

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
        <!--Home-->
        <li>
          <a href="index.php"
            class="block py-2 px-3 text-white rounded-sm hover:font-bold hover:text-yellow-400 transition-colors duration-200 relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-current after:transition-all after:duration-300 hover:after:w-full"
            aria-current="page">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-blue-950 sm:translate-x-0 z-10" aria-label="Sidebar">
    <div class="h-full px-4 pb-4 overflow-y-auto bg-blue-950 text-white flex flex-col">
        <!-- Logo or Title -->
        <div class="mb-6 px-4 pt-5 text-center">
            <h2 class="text-3xl font-bold tracking-wide">Admissions Panel</h2>
            <hr>
        </div>

        <!-- Navigation -->
        <nav class="flex flex-col space-y-2 text-sm font-medium">
            <a href="/ncst/admission.php" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-900 transition">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="mr-2"><path fill="currentColor" d="M14.727 6h6l-6-6zm0 .727H14V0H4.91c-.905 0-1.637.732-1.637 1.636v20.728c0 .904.732 1.636 1.636 1.636h14.182c.904 0 1.636-.732 1.636-1.636V6.727zM7.91 17.318a.819.819 0 1 1 .001-1.638a.819.819 0 0 1 0 1.638zm0-3.273a.819.819 0 1 1 .001-1.637a.819.819 0 0 1 0 1.637zm0-3.272a.819.819 0 1 1 .001-1.638a.819.819 0 0 1 0 1.638zm9 6.409h-6.818v-1.364h6.818zm0-3.273h-6.818v-1.364h6.818zm0-3.273h-6.818V9.273h6.818z"/></svg>
                  Online Admission
            </a>
            <a href="/ncst/admission_status.php" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-900 transition">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14" class="mr-2"><path fill="currentColor" fill-rule="evenodd" d="M5.5 0a1 1 0 0 0-1 1v.5a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zM3.25 1h-.5a1.5 1.5 0 0 0-1.5 1.5v10a1.5 1.5 0 0 0 1.5 1.5h8.5a1.5 1.5 0 0 0 1.5-1.5v-10a1.5 1.5 0 0 0-1.5-1.5h-.5v.5A2.25 2.25 0 0 1 8.5 3.75h-3A2.25 2.25 0 0 1 3.25 1.5zm6.7 4.9a.75.75 0 0 1 .15 1.05l-3 4a.75.75 0 0 1-1.016.174l-1.5-1a.75.75 0 1 1 .832-1.248l.91.606L8.9 6.05a.75.75 0 0 1 1.05-.15" clip-rule="evenodd"/></svg>
                  Admission Status
              </a>
            <a href="/ncst/view_requirements.php" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-900 transition">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="mr-2"><path fill="currentColor" d="M13 9V3.5L18.5 9M6 2c-1.11 0-2 .89-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/></svg>
                  View Requirements
            </a>
        </nav>
    </div>
</aside>
<!--End of navigation bar-->
