<?php include('includes/reg_header.php');?>

<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="mt-25 inline-flex items-center p-2 mt-2 ms-3 text-sm text-white bg-blue-800 rounded-lg sm:hidden hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300 mt-15">
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16"><path fill="currentColor" d="M7.62 7.18L2.79 3.03c-.7-.6-1.79-.1-1.79.82v8.29c0 .93 1.09 1.42 1.79.82l4.83-4.14c.5-.43.5-1.21 0-1.64"/></svg>
    <span class="sr-only">Open sidebar</span>
</button>

<div class="min-h-screen flex items-center justify-center sm:ml-64 p-4">
  <div class="max-w-md w-full mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-8 z-10">
    <h2 class="text-2xl font-semibold text-blue-900 text-center mb-6">Admission Status Checker</h2>

    <form method="POST" class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input
          type="email"
          id="email"
          name="email"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your registered email"
        />
      </div>

      <div class="flex justify-center">
        <button
          type="submit"
          class="bg-blue-950 text-white border border-transparent font-medium px-6 py-2 rounded transition-all duration-300 hover:bg-yellow-400 hover:text-black hover:border-2 hover:border-yellow-600"
        >
          Check Status
        </button>
      </div>
    </form>
  </div>
</div>
<?php include('includes/footer.php'); ?>

