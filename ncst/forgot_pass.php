<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password Page</title>
    <link rel="icon" href="img/ncst-edu-icon.png">
    <script src="js/tailwind-css.js"></script>
    <script src="js/flowbite.min.js"></script>
    <link rel="stylesheet" href="css/custom_animation.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-white/65 bg-[url('img/pattern2.jpg')] bg-blend-overlay bg-cover bg-center bg-repeat">
  <div class="relative animation-fade-bottom bg-blue-950 text-white w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl p-6 sm:p-8 md:p-10 lg:p-12 rounded-lg shadow-lg">

    <a href="/ncst/logins/student_login.php" class="absolute top-5 left-5 text-white bg-blue-700 hover:bg-blue-800 px-5 py-2.5 rounded-lg text-lg transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 12 12"><path fill="currentColor" d="M10.5 6a.75.75 0 0 0-.75-.75H3.81l1.97-1.97a.75.75 0 0 0-1.06-1.06L1.47 5.47a.75.75 0 0 0 0 1.06l3.25 3.25a.75.75 0 0 0 1.06-1.06L3.81 6.75h5.94A.75.75 0 0 0 10.5 6"/></svg>
    </a>

    <div class="flex justify-center mb-4">
        <img src="img/ncst-edu-icon.png" class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24">
    </div>
    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-2 text-center">Forgot Password</h2>
    <p class="text-sm sm:text-base mb-6 text-center text-gray-300">Enter your email to receive a reset link.</p>

    <!--Form-->
    <form id="forgotForm">
        <label class="block mb-2 text-sm font-semibold">Email Address</label>
        <input type="email" name="email" required placeholder="you@example.com" class="w-full px-4 py-2 rounded bg-blue-900 border border-blue-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4"/>

        <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 rounded transition">
            Send Reset Link
        </button>
    </form>
  </div>

  <script src="js/sweetalert2@11.js"></script>
  <script>
    document.getElementById('forgotForm').addEventListener('submit', function(e) {
      e.preventDefault();

      Swal.fire({
        icon: 'success',
        title: 'Link Sent!',
        text: 'A password reset link has been sent to your email.',
        confirmButtonText: 'Okay',
        confirmButtonColor: '#1e3a8a', 
        background: '#172554',
        color: '#ffffff'
      });
    });
  </script>
</body>
</html>