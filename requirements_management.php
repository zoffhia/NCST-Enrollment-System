<?php include('includes/records_header.php'); ?>

<!-- Main content wrapper -->
<div class="px-4 md:px-6 py-6 md:ml-64 mt-20" id="mainContent">
  <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow-lg">

    <h2 class="text-2xl font-semibold mb-4">Student Admissions</h2>

    <table class="min-w-full bg-white border border-gray-300">
      <thead>
        <tr>
          <th class="px-4 py-2 border">Student Name</th>
          <th class="px-4 py-2 border">Email</th>
          <th class="px-4 py-2 border">Course</th>
          <th class="px-4 py-2 border">Status</th>
          <th class="px-4 py-2 border">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>  <!--Dummy Data-->
          <td class="px-4 py-2 border">John Doe</td>
          <td class="px-4 py-2 border">johndoe@email.com</td>
          <td class="px-4 py-2 border">BSIT</td>
          <td class="px-4 py-2 border text-green-600 font-semibold">Pending</td>
          <td class="px-4 py-2 border">
            <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded">
              Generate ID
            </button>
          </td>
        </tr>
        <tr> <!--Dummy Data-->
          <td class="px-4 py-2 border">Jane Smith</td>
          <td class="px-4 py-2 border">janesmith@email.com</td>
          <td class="px-4 py-2 border">BSBA</td>
          <td class="px-4 py-2 border text-yellow-600 font-semibold">Pending</td>
          <td class="px-4 py-2 border">
            <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded">
              Generate ID
            </button>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
</div>

<!-- Modal -->
<div id="generateModal" class="fixed inset-0 flex items-center justify-center hidden z-40">
  <!-- Backdrop -->
  <div class="absolute inset-0 bg-blue-900/40 backdrop-blur-md"></div>

  <!-- Modal Content -->
  <div class="relative bg-white rounded-lg shadow-lg w-full max-w-md p-6 z-50">
    <h3 class="text-xl font-semibold mb-4">Generate Student ID</h3>

    <label class="block mb-2">
      <input type="checkbox" class="mr-2" id="chk1"> Report Card (Form 138)
    </label>
    <label class="block mb-4">
      <input type="checkbox" class="mr-2" id="chk2"> Original and Photocopy of Form 138
    </label>
    <label class="block mb-4">
      <input type="checkbox" class="mr-2" id="chk3"> Good Moral Certificate
    </label>
    <label class="block mb-4">
      <input type="checkbox" class="mr-2" id="chk2"> 2X2 ID Picture
    </label>
    <!--And so on. Add more checkboxes as needed-->

    <div class="flex justify-end gap-2">
      <button onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
        Cancel
      </button>
      <button onclick="generateID()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
        Generate ID
      </button>
    </div>
  </div>
</div>

<!--Naka Vue dapat-->
<script>
function openModal() {
  document.getElementById("generateModal").classList.remove("hidden");
}

function closeModal() {
  document.getElementById("generateModal").classList.add("hidden");
  resetCheckboxes();
}

function resetCheckboxes() {
  document.getElementById("chk1").checked = false;
  document.getElementById("chk2").checked = false;
}

function generateID() {
  const chk1 = document.getElementById("chk1").checked;
  const chk2 = document.getElementById("chk2").checked;

  if (!chk1 || !chk2) {
    Swal.fire({
      icon: 'warning',
      title: 'Incomplete Requirements',
      text: 'Please complete all requirements before generating a Student ID.'
    });
    return;
  }

  Swal.fire({
    icon: 'success',
    title: 'Student ID Generated',
    text: 'The student ID has been successfully generated!'
  });

  closeModal();
}

</script>

<?php include('includes/footer.php'); ?>