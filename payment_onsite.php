<?php include('includes/stud_header.php');?>

<div class="px-4 md:px-6 py-6 md:ml-64 mt-20">
  <div class="max-w-lg mx-auto bg-white p-6 rounded shadow-lg">
    <h2 class="text-xl font-bold mb-4 text-center">Onsite Queue</h2>

    <!-- Queue Form -->
    <form id="queueForm" class="space-y-4">
      <div>
        <label for="studentId" class="block text-sm font-medium text-gray-700">
          Student ID Number
        </label>
        <input 
          type="text" 
          id="studentId" 
          name="studentId" 
          placeholder="Enter your Student ID"
          class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300 focus:border-blue-500"
          required
        >
      </div>
      
      <button 
        type="submit" 
        class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
      >
        Get Queue Number
      </button>
    </form>

    <!-- Queue Number Display -->
    <div id="queueDisplay" class="mt-6 hidden text-center">
      <p class="text-lg text-gray-600">Your Queue Number:</p>
      <p class="text-4xl font-bold text-blue-600 mt-2" id="queueNumber">—</p>
    </div>
  </div>
</div>

<script>
document.getElementById("queueForm").addEventListener("submit", function(e) {
  e.preventDefault();

  // Simulated queue number generation
  let queueNum = Math.floor(Math.random() * 100) + 1;

  document.getElementById("queueNumber").textContent = queueNum;
  document.getElementById("queueDisplay").classList.remove("hidden");
});
</script>


<?php include('includes/footer.php');?>