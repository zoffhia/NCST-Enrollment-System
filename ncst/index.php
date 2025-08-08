<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NCST Website</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

  <style>
   [data-animate] {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.8s ease-in-out;
    }

    [data-animate].visible {
      opacity: 1;
      transform: none;
    }
    html {
       scroll-behavior: smooth;
    }

    .modal-enter {
      @apply opacity-0 scale-90;
    }
    .modal-enter-active {
      @apply opacity-100 scale-100 transition duration-300;
    }
    .modal-leave {
      @apply opacity-100 scale-100;
    }
    .modal-leave-active {
      @apply opacity-0 scale-90 transition duration-200;
    }
  </style>
</head>

<body class="bg-gray-100">


<nav class="bg-blue-900 border-gray-200 fixed top-0 w-full z-50 shadow-md">
  <div class="max-w-screen-xl flex items-center justify-between mx-auto px-4 py-2">
    
    <a href="#" class="flex items-center space-x-3">
      <img src="img/NCST-Edu.png" class="h-12" alt="NCST Logo" />
    </a>

    
    <button data-collapse-toggle="navbar-default" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300"
      aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    
    </button>

<div class="hidden w-full md:block md:w-auto absolute top-16 left-0 z-40 bg-blue-900 md:static md:bg-transparent" id="navbar-default">

      <ul class="ml-auto font-medium flex flex-col md:flex-row md:space-x-8 p-4 md:p-0 mt-4 md:mt-0 bg-blue-900 md:bg-transparent rounded-lg">

        <li class="relative group">
          <a href="#home" class="block py-2 px-3 text-white transition duration-300 hover:text-yellow-400">
            HOME
            <span class="absolute left-1/2 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
          </a>
        </li>

        <li class="relative group">
          <a href="#about" class="block py-2 px-3 text-white transition duration-300 hover:text-yellow-400">
            ABOUT US
            <span class="absolute left-1/2 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
          </a>
        </li>

        <li class="relative group">
          <a href="#campus" class="block py-2 px-3 text-white transition duration-300 hover:text-yellow-400">
            CAMPUS LIFE
            <span class="absolute left-1/2 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
          </a>
        </li>

        <li class="relative group">
          <a href="#admission" class="block py-2 px-3 text-white transition duration-300 hover:text-yellow-400">
            ADMISSIONS
            <span class="absolute left-1/2 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
          </a>
        </li>

        <li class="relative group">
          <a href="#login" class="block py-2 px-3 text-white transition duration-300 hover:text-yellow-400">
            LOGIN
            <span class="absolute left-1/2 bottom-0 w-0 h-0.5 bg-yellow-400 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="relative w-full h-screen" id="home">
    <img src="img/ncst_main.jpg" alt="NCST background" class="absolute inset-0 w-full h-full object-cover z-0" />
    <div class="absolute inset-0 bg-black bg-opacity-40 z-10"></div>
    <div class="relative z-20 flex flex-col md:flex-row items-center justify-center h-full px-6 md:px-18 gap-12">
      <div class="text-white text-left max-w-xl">
        <p class="tracking-widest text-gray-200 text-lg md:text-xl mb-2">WELCOME TO</p>
        <p class="text-3xl md:text-5xl font-bold leading-snug">
          NATIONAL COLLEGE OF <br />
          SCIENCE & TECHNOLOGY
        </p>
      </div>
      <div class="mt-8 md:mt-0">
        <img class="w-40 sm:w-56 md:w-72 lg:w-80 h-auto" src="img/NCST-logo.png" alt="NCST Logo" />
      </div>
    </div>
  </div>

<div class="bg-gradient-to-br from-[#e6ecf9] to-[#f5f8ff] text-[#1c3f94]">

 <section class="py-20 px-6 md:px-16 lg:px-32 max-w-7xl mx-auto relative" id="about">
    <div class="mb-12 text-center">
      <h2 class="text-4xl md:text-5xl font-sans font-bold text-4xl mb-2 tracking-wide">ABOUT US</h2>
      <p class="text-lg font-medium text-gray-600">Brief History of NCST</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 place-items-center" data-animate>

      <div class="bg-white rounded-xl shadow-xl p-6 transition-transform hover:scale-105 w-full h-60 flex flex-col justify-between">
        <h3 class="text-2xl font-bold text-[#1c3f94]">Founding Year</h3>
        <p class="text-gray-700 leading-relaxed">
          NCST was born in the historic and progressive City of Dasmariñas in <strong class="text-[#f59e0b]">1998</strong>.
        </p>
      </div>


      <div class="bg-white rounded-xl shadow-xl p-6 transition-transform hover:scale-105 w-full h-60 flex flex-col justify-between">
        <h3 class="text-2xl font-bold text-[#1c3f94]">Founder</h3>
        <p class="text-gray-700 leading-relaxed">
          Founded by <strong class="text-[#1c3f94]">EMERSON BAUTISTA ATANACIO</strong>, a <span class="font-semibold">23-year-old visionary entrepreneur</span>.
        </p>
      </div>

      <div class="bg-white rounded-xl shadow-xl p-6 transition-transform hover:scale-105 w-full h-60 flex flex-col justify-between">
        <h3 class="text-2xl font-bold text-[#1c3f94]">Enrollment Growth</h3>
        <p class="text-gray-700 leading-relaxed">
          From <strong class="text-[#f59e0b]">550 students</strong> in 1998, NCST's enrollment grew tenfold across all regular programs.
        </p>
      </div>

      
      <div class="bg-white rounded-xl shadow-xl p-6 transition-transform hover:scale-105 w-full h-60 flex flex-col justify-between">
        <h3 class="text-2xl font-bold text-[#1c3f94]">Mission</h3>
        <p class="text-gray-700 leading-relaxed">
          Committed to industry responsive graduates through programs like the <strong class="text-[#f59e0b]">Certificate in Manufacturing Technology</strong>.
        </p>
      </div>

      
      <div class="bg-white rounded-xl shadow-xl p-6 transition-transform hover:scale-105 w-full h-60 flex flex-col justify-between">
        <h3 class="text-2xl font-bold text-[#1c3f94]">IIRT Launch</h3>
        <p class="text-gray-700 leading-relaxed">
          In <strong>2015</strong>, NCST launched the <strong class="text-[#f59e0b]">IIRT - Institute of Industry and Research Technology</strong>.
        </p>
      </div>

     
      <div class="bg-white rounded-xl shadow-xl p-6 transition-transform hover:scale-105 w-full h-60 flex flex-col justify-between">
        <h3 class="text-2xl font-bold text-[#1c3f94]">Dual Training System</h3>
        <p class="text-gray-700 leading-relaxed">
          Students are trained both in <strong>school</strong> and the <strong>industry</strong>, following the dual training modality.
        </p>
      </div>

     
    </div>
  </section>

  <script>
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    });

    document.querySelectorAll('[data-animate]').forEach(el => {
      observer.observe(el);
    });
  </script>
</div>

<style>
  .parallax {
    background-image: url('img/vision&mission.jpg'); 
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<!--CAMPUS SECTION-->
 <section class="parallax px-4 py-16" id="campus">
    <div class="p-4 md:p-10 text-black">
      <h2 class="text-white text-3xl md:text-4xl font-bold text-center mb-12 tracking-wide">
        VISION & MISSION
      </h2>

      <div class="grid md:grid-cols-2 gap-10 max-w-6xl mx-auto">
    
        <div onclick="openModal('visionModal')" class="cursor-pointer bg-[#ffe56a] p-10 rounded-xl shadow-lg transition transform hover:-translate-y-1 hover:shadow-2xl duration-300">
          <h3 class="text-2xl font-bold text-[#1c3f94] text-center">VISION</h3>
          <div class="border-t border-black w-80 mx-auto mt-2 mb-6"></div>
          <p class="text-justify leading-relaxed tracking-wider text-black line-clamp-4">
            The National College of Science and Technology envisions to become one of the nation’s leading technological educational institutions...
          </p>
        </div>
       
        <div onclick="openModal('missionModal')" class="cursor-pointer bg-[#0048ae] p-10 rounded-xl shadow-lg transition transform hover:-translate-y-1 hover:shadow-2xl duration-300">
          <h3 class="text-2xl font-bold text-white text-center">MISSION</h3>
          <div class="border-t border-white w-80 mx-auto mt-2 mb-6"></div>
          <p class="text-justify leading-relaxed tracking-wider text-white line-clamp-4">
            NCST undertakes the responsibility of providing the country with quality graduates who are trained with industry responsive knowledge and skills...
          </p>
        </div>

      </div>
    </div>
  </section>

  <div id="visionModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
    <div class="modal-content bg-white w-full max-w-2xl p-8 rounded-xl shadow-xl relative text-black transform scale-90 opacity-0 transition duration-300">
      <button onclick="closeModal('visionModal')" class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-2xl font-bold">&times;</button>
      <h3 class="text-3xl font-bold text-[#1c3f94] mb-4">VISION</h3>
      <p class="text-gray-800 text-justify leading-relaxed tracking-wide">
        The National College of Science and Technology envisions to become one of the nation’s leading technological educational institutions with campuses in various areas of the Philippines. NCST, in response to the commercial and industrial sector’s need of highly professional and skilled manpower, provides advanced technology and industry-based education and sets standards of proficiency and competency compatible with the demands of industry, instilling enduring positive work values, competitiveness, and quality among its graduates.
      </p>
    </div>
  </div>

  <div id="missionModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
    <div class="modal-content bg-white w-full max-w-2xl p-8 rounded-xl shadow-xl relative text-black transform scale-90 opacity-0 transition duration-300">
      <button onclick="closeModal('missionModal')" class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-2xl font-bold">&times;</button>
      <h3 class="text-3xl font-bold text-[#0048ae] mb-4">MISSION</h3>
      <p class="text-gray-800 text-justify leading-relaxed tracking-wide">
        NCST undertakes the responsibility of providing the country with quality graduates who are trained with industry responsive knowledge and skills and founded with underpinning values of love, justice, mutual respect and peace. The school commits itself to the promotion of academic excellence, research and community extension through relevant programs and projects and participative decision-making.
      </p>
    </div>
  </div>

  <script>
    function openModal(id) {
      const modal = document.getElementById(id);
      const content = modal.querySelector('.modal-content');
      modal.classList.remove('hidden');
      setTimeout(() => {
        content.classList.remove('opacity-0', 'scale-90');
        content.classList.add('opacity-100', 'scale-100');
      }, 10);
    }

    function closeModal(id) {
      const modal = document.getElementById(id);
      const content = modal.querySelector('.modal-content');
      content.classList.remove('opacity-100', 'scale-100');
      content.classList.add('opacity-0', 'scale-90');
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 200);
    }
  </script>

<!-- HOUSE OF HEROES & BANNER -->
<section id="house" class="w-full bg-[#1c3f94] py-20">


  <div class="flex items-center justify-center text-center">
    <h1 class="text-white text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg font-sans">
      HOUSE OF HEROES
    </h1>
  </div>

  <div id="gallery" class="relative w-full mt-12" data-carousel="slide">
    <div class="relative h-[24rem] overflow-hidden rounded-xl shadow-lg">

      <div class="duration-700 ease-in-out hidden" data-carousel-item>
        <img src="img/Makadiyos-banner.png" class="block w-full h-full object-cover" alt="Image 2" />
      </div>

      <div class="duration-700 ease-in-out hidden" data-carousel-item>
        <img src="img/Makabayan-banner.png" class="block w-full h-full object-cover" alt="Image 3" />
      </div>

      <div class="duration-700 ease-in-out hidden" data-carousel-item>
        <img src="img/Makatao-banner.png" class="block w-full h-full object-cover" alt="Image 4" />
      </div>

      <div class="duration-700 ease-in-out hidden" data-carousel-item>
        <img src="img/Makakalikasan-banner.png" class="block w-full h-full object-cover" alt="Image 5" />
      </div>
    </div>

   
    <button type="button" data-carousel-prev class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
        <svg class="w-4 h-4 text-white" viewBox="0 0 6 10" fill="none">
          <path d="M5 1L1 5L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </span>
    </button>
    <button type="button" data-carousel-next class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
        <svg class="w-4 h-4 text-white" viewBox="0 0 6 10" fill="none">
          <path d="M1 1L5 5L1 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </span>
    </button>
  </div>

<div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 px-4 md:px-12">
  <div class="bg-white shadow-xl rounded-xl p-6 text-gray-800 transform transition duration-300 hover:-translate-y-1">
    <div class="flex flex-col items-center justify-center mb-2">
      <div class="flex items-center gap-3">
        <img src="img/hoh_makadiyos.png" alt="Makadiyos Logo" class="w-8 h-8 object-contain" />
        <h2 class="text-xl font-bold">MAKADIYOS</h2>
      </div>
    </div>
    <p class="text-sm leading-relaxed text-center">Inspires godly courage and commitment through faith, love, and spiritual excellence aligned with a lasting relationship with God.</p>
  </div>

  <div class="bg-red-600 shadow-xl rounded-xl p-6 text-white transform transition duration-300 hover:-translate-y-1">
    <div class="flex flex-col items-center justify-center mb-2">
      <div class="flex items-center gap-3">
        <img src="img/hoh_makatao.png" alt="Makatao Logo" class="w-8 h-8 object-contain" />
        <h2 class="text-xl font-bold">MAKATAO</h2>
      </div> 
    </div>
    <p class="text-sm leading-relaxed text-center">Kindles nationalistic spirit and dedication to contribute one's best skills and knowledge to the advancement of science and the nation.</p>
  </div>

  <div class="bg-blue-600 shadow-xl rounded-xl p-6 text-white transform transition duration-300 hover:-translate-y-1">
    <div class="flex flex-col items-center justify-center mb-2">
      <div class="flex items-center gap-3">
        <img src="img/hoh_makabayan.png" alt="Makabayan Logo" class="w-8 h-8 object-contain" />
        <h2 class="text-xl font-bold">MAKABAYAN</h2>
      </div>
    </div>
    <p class="text-sm leading-relaxed text-center">Uplifts the welfare of students through a caring environment and quality facilities to support perseverance and belonging at NCST.</p>
  </div>

  <div class="bg-yellow-400 shadow-xl rounded-xl p-6 text-gray-900 transform transition duration-300 hover:-translate-y-1">
    <div class="flex flex-col items-center justify-center mb-2">
      <div class="flex items-center gap-3">
        <img src="img/hoh_makakalikasan.png" alt="Makakalikasan Logo" class="w-8 h-8 object-contain" />
        <h2 class="text-xl font-bold">MAKAKALIKASAN</h2>
      </div>
    </div>
    <p class="text-sm leading-relaxed text-center">Empowers environmental conservation efforts through awareness and active participation in eco-driven initiatives.</p>
  </div>
</div>

</section>

  
  <!--ADMISSION-->

<div class="font-sans text-[#1a1a1a]" id="admission">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="bg-white/80 w-full max-w-6xl p-6 md:p-10 rounded-md shadow-xl">
            <h1 class="text-center text-2xl md:text-3xl font-bold text-blue-900 mb-4">
                NCST Educational System
            </h1>
        <div class="flex flex-col md:flex-row justify-between items-start gap-6">
    
            <div class="w-full md:w-1/2 space-y-4 text-center my-auto">
                <h2 class="text-yellow-500 font-bold text-lg">
                    COLLEGE ENROLLMENT <br /> ARE NOW OPEN!
                </h2>
            <div>
                <p class="font-bold">MONDAY - FRIDAY</p>
                <p>8:00 AM – 5:00 PM</p>
            </div>
            <div>
                <p class="font-bold">SATURDAY</p>
                <p>8:00 AM – 5:00 PM</p>
            </div>
            </div>

            <div class="hidden md:block w-px bg-black h-60 mx-4 my-auto"></div>

            <div class="w-full md:w-1/2 space-y-2 text-center my-auto">
            <p>
                Enrollment for the 1st Semester, A.Y. 2025–2026<br />
                is now ONGOING for the following programs:
            </p>

            <div class="mt-4">
                <p class="font-bold">ARCHITECTURE DEPARTMENT</p>
                <p class="ml-4">BS in Architecture</p>
            </div>

            <div class="mt-4">
                <p class="font-bold">CRIMINAL JUSTICE DEPARTMENT</p>
                <p class="ml-4">BS in Criminology (BSCRIM)</p>
                <p class="ml-4">BS in Public Administration (BSPA)</p>
            </div>

            <div class="mt-4">
                <p class="font-bold">COMPUTER STUDIES DEPARTMENT</p>
                <p class="ml-4">BS in Information Technology (BSIT)</p>
                <p class="ml-4">BS in Computer Science (BSCS)</p>
                <p class="ml-4">Associate in Computer Technology (ACT)</p>
            </div>
            </div>
        </div>

        
        <div class="mt-8 grid grid-cols-2 md:grid-cols-4 text-center font-bold text-sm">
            <div class="bg-white py-2">MAKADIYOS</div>
            <div class="bg-blue-800 text-white py-2">MAKABAYAN</div>
            <div class="bg-red-600 text-white py-2">MAKATAO</div>
            <div class="bg-yellow-400 py-2">MAKAKALIKASAN</div>
        </div>
        </div>
    </div>


    <div class="p-6 bg-gray-100" id="login">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!--Admissions-->
            <div class="relative bg-white rounded-xl shadow-lg overflow-hidden text-center transform transition duration-300 hover:-translate-y-1 hover:scale-105 hover:shadow-xl">

                <div class="bg-blue-900 h-24 relative">
                    <div class="absolute inset-x-0 -bottom-6 flex justify-center">
                        <div class="w-24 h-24 flex items-center justify-center">
                            <img src="img/registration.png" class="w-24 h-24 object-contain"/>
                        </div>
                    </div>

                </div>

                <div class="pt-10 px-4 pb-6">
                    <h3 class="text-xl font-semibold">ADMISSIONS</h3>
                    <p class="text-sm text-gray-600">Access Your Student Portal</p>
                    <div class="flex justify-center space-x-4 mt-4">
                        <a href="admission.php" class="px-4 py-2 rounded-full bg-blue-900 text-white text-sm hover:bg-blue-700 transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current text-white">
                                <path d="M23.987 12a2.4 2.4 0 0 0-.814-1.8L11.994.361a1.44 1.44 0 0 0-1.9 2.162l8.637 7.6a.25.25 0 0 1-.165.437H1.452a1.44 1.44 0 0 0 0 2.88h17.111a.251.251 0 0 1 .165.438l-8.637 7.6a1.44 1.44 0 1 0 1.9 2.161L23.172 13.8a2.4 2.4 0 0 0 .815-1.8"/>
                            </svg>
                            Go To Admissions
                        </a>
                    </div>
                </div>
            </div>

            <!-- Student Portal Card -->
            <div class="relative bg-white rounded-xl shadow-lg overflow-hidden text-center transform transition duration-300 hover:-translate-y-1 hover:scale-105 hover:shadow-xl">
                <div class="bg-blue-800 h-24 relative">
                    <div class="absolute inset-x-0 -bottom-6 flex justify-center">
                        <div class="w-24 h-24 flex items-center justify-center">
                            <img src="img/graduate.png" class="w-24 h-24 object-contain"/>
                        </div>
                    </div>

                </div>

                <div class="pt-10 px-4 pb-6">
                    <h3 class="text-xl font-semibold">STUDENT PORTAL</h3>
                    <p class="text-sm text-gray-600">Login As Student</p>
                    <div class="flex justify-center space-x-4 mt-4">
                        <a href="logins/student_login.php" class="px-4 py-2 rounded-full bg-blue-600 text-white text-sm hover:bg-blue-700 transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current text-white">
                                <path d="M23.987 12a2.4 2.4 0 0 0-.814-1.8L11.994.361a1.44 1.44 0 0 0-1.9 2.162l8.637 7.6a.25.25 0 0 1-.165.437H1.452a1.44 1.44 0 0 0 0 2.88h17.111a.251.251 0 0 1 .165.438l-8.637 7.6a1.44 1.44 0 1 0 1.9 2.161L23.172 13.8a2.4 2.4 0 0 0 .815-1.8"/>
                            </svg>
                            Go To Student Portal
                        </a>
                    </div>
                </div>
            </div>

            <!-- Employee Portal Card -->
            <div class="relative bg-white rounded-xl shadow-lg overflow-hidden text-center transform transition duration-300 hover:-translate-y-1 hover:scale-105 hover:shadow-xl">
                <div class="bg-blue-700 h-24 relative">
                    <div class="absolute inset-x-0 -bottom-6 flex justify-center">
                        <div class="w-24 h-24 flex items-center justify-center">
                            <img src="img/pass.png" class="w-24 h-24 object-contain"/>
                        </div>
                    </div>
                </div>

                <div class="pt-10 px-4 pb-6">
                    <h3 class="text-xl font-semibold">EMPLOYEE PORTAL</h3>
                    <p class="text-sm text-gray-600">Login As Employee</p>
                    <div class="flex justify-center space-x-4 mt-4">
                        <a href="logins/employee_login.php" class="px-4 py-2 rounded-full bg-blue-600 text-white text-sm hover:bg-blue-700 transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current text-white">
                                <path d="M23.987 12a2.4 2.4 0 0 0-.814-1.8L11.994.361a1.44 1.44 0 0 0-1.9 2.162l8.637 7.6a.25.25 0 0 1-.165.437H1.452a1.44 1.44 0 0 0 0 2.88h17.111a.251.251 0 0 1 .165.438l-8.637 7.6a1.44 1.44 0 1 0 1.9 2.161L23.172 13.8a2.4 2.4 0 0 0 .815-1.8"/>
                            </svg>
                            Go To Employee Portal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--FOOTER, SOCIALS & BOTTOM LINE-->

<footer class="bg-[#1c2a7c] text-white pt-16 pb-0">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10">
    <div>
      <div class="flex items-center space-x-3 mb-4">
          <img src="img/NCST-Edu.png" alt="NCST Logo" class="h-12" />
      </div>
      <p class="text-gray-300 leading-relaxed mb-6">
        The National College of Science and Technology (NCST) is one of the leading educational institutions in the vast growing locality of Dasmariñas, Cavite.
      </p>
      <div class="flex space-x-4 mt-6">
        <a href="https://www.facebook.com/NCST.OfficialPage" class="text-white hover:text-yellow-400 text-xl"><i class="ri-facebook-fill"></i></a>
        <div class="hidden md:block w-px bg-black h-5 mx-4 my-auto"></div>
        <a href="https://linkedin.com/in/ncstofficial?fbclid=IwZXh0bgNhZW0CMTAAAR3OxDI99Dsfd6Ag4TnITSRfkdngjdYF0kyQ4LTqaR1URFCGKlzvcKlo9Os_aem_-w5d6tm9VTVlNTd2ZWu8TQ" class="text-white hover:text-yellow-400 text-xl"><i class="ri-linkedin-fill"></i></a>
        <a href="https://x.com/NCSTOFFICIAL?fbclid=IwZXh0bgNhZW0CMTAAAR0nQi0_JtReFv63kZaQObp-6V_Xfk0tzNRjjDkx7mhOZ6gextXe3wvJuVM_aem_GMFx4WmkJJU4PjEvQZDEUQ" class="text-white hover:text-yellow-400 text-xl"><i class="ri-twitter-fill"></i></a>
        <a href="https://www.youtube.com/@NCSTEducationSystemChannel" class="text-white hover:text-yellow-400 text-xl"><i class="ri-youtube-fill"></i></a>
        <a href="https://tiktok.com/@ncstofficial?fbclid=IwZXh0bgNhZW0CMTAAAR1qkZoMQx7pCsOYBo2Kp1ZTfyTNiP6obC6zA8CiQWIANKsipaxpE1q92Vg_aem_F6EvAiklYw0wUXkCYNQYJQ" class="text-white hover:text-yellow-400 text-xl"><i class="ri-tiktok-fill"></i></a>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-semibold mb-2">Subscribe Now</h3>
      <p class="text-gray-300 mb-5">Don’t miss our future updates! Get Subscribed Today!</p>
      <form class="flex w-full max-w-md">
        <input type="email" placeholder="Your mail here" class="flex-grow px-4 py-3 rounded-l-full focus:outline-none text-black" />
        <button type="submit" class="bg-[#f2cb05] px-5 flex items-center justify-center rounded-r-full hover:bg-yellow-500 transition duration-300">
          <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m0 0l4 4m-4-4l4-4" />
          </svg>
        </button>
      </form>
    </div>
  </div>

  <div class="bg-[#f2cb05] text-[#1c2a7c] mt-12 py-4 text-center font-medium tracking-wide">
    Empowering Future Innovators — Built by NCST Developers
  </div>


</footer>

</body>
</html>