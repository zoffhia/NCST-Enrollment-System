<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="icon" href="img/ncst-edu-icon.png">
    <script src="js/tailwind-css.js"></script>
    <script src="js/flowbite.min.js"></script>
    <link rel="stylesheet" href="/ncst/css/custom_animation.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-white/65 bg-[url('img/pattern2.jpg')] bg-blend-overlay bg-cover bg-center bg-repeat">
  <div class="relative animation-fade-bottom bg-blue-950 text-white w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl p-6 sm:p-8 md:p-10 lg:p-12 rounded-lg shadow-lg">

  <div class="flex justify-center mb-4">
      <img src="img/ncst-edu-icon.png" class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24">
    </div>
    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-2 text-center">Change Password</h2>
    <p class="text-sm sm:text-base mb-6 text-center text-gray-300">Enter your new password below.</p>

    <!-- Form -->
    <form id="changePasswordForm">
      <label class="block mb-2 text-sm font-semibold">New Password</label>
      <input type="password" name="newPassword" required placeholder="New Password" class="w-full px-4 py-2 rounded bg-blue-900 border border-blue-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4"/>

      <label class="block mb-2 text-sm font-semibold">Confirm Password</label>
      <input type="password" name="confirmPassword" required placeholder="Confirm Password" class="w-full px-4 py-2 rounded bg-blue-900 border border-blue-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-6"/>

      <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 rounded transition">
        Save New Password
      </button>
    </form>
  </div>

  <script src="js/sweetalert2@11.js"></script>
  <script>
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const newPassword = this.newPassword.value;
      const confirmPassword = this.confirmPassword.value;

      if (newPassword !== confirmPassword) {
        Swal.fire({
          icon: 'error',
          title: 'Passwords Do Not Match',
          text: 'Please make sure both fields match.',
          confirmButtonText: 'Try Again',
          confirmButtonColor: '#dc2626',
          background: '#172554',
          color: '#ffffff'
        });
        return;
      }

      Swal.fire({
        icon: 'success',
        title: 'Password Changed!',
        text: 'Your password has been successfully updated.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#1e3a8a',
        background: '#172554',
        color: '#ffffff'
      });

      this.reset();
    });
  </script>
</body>
</html>