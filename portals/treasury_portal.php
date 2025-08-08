<?php include('../includes/treasury_header.php'); ?>

<div class="px-4 md:px-6 py-6 md:ml-64 mt-20">

  <!-- Payment Module Card -->
  <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow-lg">

    <h2 class="text-2xl font-bold mb-6">Payment Module</h2>

    <!-- Payment Method -->
    <div class="mb-6">
      <label class="block mb-2 font-medium">Select Payment Method:</label>
      <select id="paymentMethod" class="border rounded p-2 w-full">
        <option value="onsite">On-site Payment</option>
        <option value="online">Online Payment</option>
      </select>
    </div>

    <!-- On-site Payment Form -->
    <div id="onsiteSection" class="space-y-4">
      <div>
        <label class="block mb-2 font-medium">Student ID:</label>
        <input type="text" id="studentIdInput" class="border rounded p-2 w-full" placeholder="Enter Student ID">
      </div>

      <div>
        <label class="block mb-2 font-medium">Payment Type:</label>
        <select id="paymentType" class="border rounded p-2 w-full">
          <option value="tuition">Tuition</option>
          <option value="other">Other Fees</option>
          <option value="balance">Balance</option>
        </select>
      </div>

      <button id="searchStudent" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Search</button>

      <!-- Display Student Payment Details -->
      <div id="paymentDetails" class="hidden mt-6 border-t pt-4">
        <h3 class="text-xl font-semibold mb-2">Payment Details</h3>
        <p><strong>Name:</strong> <span id="studentName"></span></p>
        <p><strong>Payment Type:</strong> <span id="paymentTypeDisplay"></span></p>
        <p><strong>Amount Due:</strong> ₱<span id="amountDue"></span></p>
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mt-4">Process Payment</button>
      </div>
    </div>

    <!-- Online Payment Table -->
    <div id="onlineSection" class="hidden mt-6">
      <h3 class="text-xl font-semibold mb-4">Pending Online Payments</h3>
      <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
          <tr>
            <th class="border p-2">Student ID</th>
            <th class="border p-2">Name</th>
            <th class="border p-2">Payment Type</th>
            <th class="border p-2">Amount</th>
            <th class="border p-2">Action</th>
          </tr>
        </thead>
        <tbody id="onlinePaymentsTable">
          <!-- Filled by JS -->
        </tbody>
      </table>
    </div>

  </div>
</div>

<script>
// Gawin niyo na lang na Vue
// Dummy data na pwedeng i-search (For onsite payment to)
const studentData = { 
  "2024-0001": { name: "Juan Dela Cruz", tuition: 25000, other: 5000, balance: 3000 },
  "2024-0002": { name: "Maria Santos", tuition: 27000, other: 3000, balance: 0 }
};

const onlinePayments = [
  { id: "2024-0001", name: "Juan Dela Cruz", type: "Tuition", amount: 25000 },
  { id: "2024-0002", name: "Maria Santos", type: "Other Fees", amount: 3000 }
];

// Switch sections
document.getElementById("paymentMethod").addEventListener("change", function() {
  const method = this.value;
  document.getElementById("onsiteSection").classList.toggle("hidden", method !== "onsite");
  document.getElementById("onlineSection").classList.toggle("hidden", method !== "online");
});

// Search Student (On-site)
document.getElementById("searchStudent").addEventListener("click", function() {
  const id = document.getElementById("studentIdInput").value.trim();
  const type = document.getElementById("paymentType").value;

  if (studentData[id]) {
    document.getElementById("studentName").textContent = studentData[id].name;
    document.getElementById("paymentTypeDisplay").textContent = type.charAt(0).toUpperCase() + type.slice(1);
    document.getElementById("amountDue").textContent = studentData[id][type];
    document.getElementById("paymentDetails").classList.remove("hidden");
  } else {
    alert("Student not found.");
    document.getElementById("paymentDetails").classList.add("hidden");
  }
});

// Load Online Payments
function loadOnlinePayments() {
  const tbody = document.getElementById("onlinePaymentsTable");
  tbody.innerHTML = "";
  onlinePayments.forEach((payment, index) => {
    const row = `
      <tr>
        <td class="border p-2">${payment.id}</td>
        <td class="border p-2">${payment.name}</td>
        <td class="border p-2">${payment.type}</td>
        <td class="border p-2">₱${payment.amount}</td>
        <td class="border p-2 text-center">
          <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded" onclick="confirmPayment(${index})">Confirm</button>
          <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"">Reject</button>
        </td>
      </tr>
    `;
    tbody.innerHTML += row;
  });
}

function confirmPayment(index) {
  alert(`Receipt generated for ${onlinePayments[index].name} (${onlinePayments[index].type})`);
  onlinePayments.splice(index, 1);
  loadOnlinePayments();
}

loadOnlinePayments();
</script>



<?php include('../includes/footer.php'); ?>