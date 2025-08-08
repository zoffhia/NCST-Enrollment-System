<?php include('includes/stud_header.php');?>

<div class="px-4 md:px-6 py-6 md:ml-64 mt-20">
  <div class="max-w-5xl mx-auto bg-white rounded shadow-lg p-6">
    
    <!-- Title -->
    <h2 class="text-xl md:text-2xl font-bold mb-6">College Dragonpay Facility</h2>

    <!-- Form -->
    <form class="space-y-6">

      <!-- Student ID Validation -->
      <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
        <label class="font-medium mb-2 md:mb-0">Please Enter Student ID No</label>
        <input type="text" class="border rounded p-2 flex-1" placeholder="Enter Student ID">
        <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mt-3 md:mt-0">
          Validate Student ID No.
        </button>
      </div>

      <!-- Student Details -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block font-medium mb-1">Student ID No</label>
          <input type="text" class="border rounded p-2 w-full bg-gray-100" readonly>
        </div>
        <div>
          <label class="block font-medium mb-1">First Name</label>
          <input type="text" class="border rounded p-2 w-full bg-gray-100" readonly>
        </div>
        <div>
          <label class="block font-medium mb-1">Last Name</label>
          <input type="text" class="border rounded p-2 w-full bg-gray-100" readonly>
        </div>
      </div>

      <!-- Payment Details -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block font-medium mb-1">Amount</label>
          <input type="number" class="border rounded p-2 w-full" value="0">
        </div>
        <div>
          <label class="block font-medium mb-1">Email Address</label>
          <input type="email" class="border rounded p-2 w-full">
        </div>
        <div>
          <label class="block font-medium mb-1">Mobile No</label>
          <input type="tel" class="border rounded p-2 w-full">
        </div>
      </div>

      <!-- Remarks -->
      <div>
        <label class="block font-medium mb-1">Remarks (Example: Payment Tuition Fee)</label>
        <input type="text" class="border rounded p-2 w-full">
      </div>

      <!-- Buttons -->
      <div class="flex space-x-3">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Next</button>
        <button type="button" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded">Cancel</button>
      </div>

    </form>
  </div>
</div>


<?php include('includes/footer.php');?>

