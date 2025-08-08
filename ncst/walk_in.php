<?php include('includes/registrar_header.php'); ?>

<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-4xl p-6 space-y-6 shadow-lg">
        <!-- Step 1 -->
        <div id="step1" class="space-y-4">
        <h2 class="text-xl font-bold">Enter Student ID</h2>
        <input id="studentNo" type="text" placeholder="e.g., 2024-0001"
            class="w-full px-4 py-2 border border-gray-300 rounded-md" />
        <button onclick="nextStep()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 w-full sm:w-auto">
            Proceed
        </button>
    </div>

    <!-- Step 2 -->
    <div id="step2" class="space-y-4 hidden mt-10">
        <h2 class="text-xl font-bold">Student Type Detected</h2>
        <p id="studentTypeResult" class="text-gray-600">Old Student</p>

        <!--Credit Subjects for old students/transferees/shiftees-->
        <div id="creditSubjects" class="space-y-2">
            <p class="text-sm text-gray-500">Credit subjects for transferees, old students, or shiftees.</p>
            <button onclick="showStep('step4')" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 w-full sm:w-auto">
            Proceed to Schedule Confirmation
            </button>
    </div>

    <!--Available Scheds for New Students-->
    <div id="availableSchedules" class="space-y-6 hidden mt-10">
        <p class="text-sm text-gray-500">Select one of the available schedules for new students.</p>

        <div class="grid grid-cols-1 gap-6">

          <?php
          $schedules = [
            [
                'section' => 'BSIT - 31A2',
                'subjects' => [
                    ['IT101', 'Mon/Wed', '8:00–9:30 AM', 'Lecture'],
                    ['IT102', 'Tue/Thu', '10:00–11:30 AM', 'Lecture'],
                    ['IT103L', 'Fri', '1:00–4:00 PM', 'Laboratory'],
                    ['GE101', 'Mon/Wed', '9:30–11:00 AM', 'Lecture'],
                    ['PE101', 'Sat', '7:00–9:00 AM', 'Lecture']
                ]
            ],
            [
                'section' => 'BSIT - 31M3',
                'subjects' => [
                    ['BA101', 'Mon/Wed', '8:00–9:30 AM', 'Lecture'],
                    ['BA102', 'Tue/Thu', '9:30–11:00 AM', 'Lecture'],
                    ['BA103L', 'Fri', '2:00–5:00 PM', 'Laboratory'],
                    ['GE102', 'Mon/Wed', '1:00–2:30 PM', 'Lecture'],
                    ['NSTP1', 'Sat', '8:00–11:00 AM', 'Lecture']
                ]
            ],
            [
                'section' => 'BSIT - 31E2',
                'subjects' => [
                    ['NCM101', 'Mon/Wed', '7:30–9:00 AM', 'Lecture'],
                    ['BIO101', 'Tue/Thu', '9:00–10:30 AM', 'Lecture'],
                    ['BIO101L', 'Fri', '1:00–4:00 PM', 'Laboratory'],
                    ['GE103', 'Mon/Wed', '10:00–11:30 AM', 'Lecture'],
                    ['HE101', 'Sat', '8:00–10:00 AM', 'Lecture']
                ]
            ]
          ];

          foreach ($schedules as $sched) {
            echo '<div class="bg-gray-100 rounded-lg shadow p-4 space-y-4">';
            echo '<h3 class="text-lg font-bold text-blue-700">' . $sched['section'] . '</h3>';
            echo '<div class="overflow-x-auto">';
            echo '<table class="w-full text-sm text-left border border-gray-300">';
            echo '<thead class="bg-blue-100 text-gray-800">';
            echo '<tr><th class="px-2 py-1 border">Subject Code</th><th class="px-2 py-1 border">Day</th><th class="px-2 py-1 border">Time</th><th class="px-2 py-1 border">Type</th></tr>';
            echo '</thead><tbody>';
            foreach ($sched['subjects'] as $subj) {
              echo '<tr>';
              foreach ($subj as $item) {
                echo '<td class="border px-2 py-1">' . $item . '</td>';
              }
              echo '</tr>';
            }
            echo '</tbody></table></div>';
            echo '<button onclick="showStep(\'step4\')" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 mt-2">';
            echo 'Select ' . $sched['section'] . '</button>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Step 3: Confirmation -->
    <div id="step4" class="space-y-4 hidden">
        <h2 class="text-xl font-bold">Schedule Confirmed</h2>
        <p class="text-gray-600">Reference No: <span class="font-semibold">REF-20250721</span></p>
        <p class="text-gray-600">Queue No: <span class="font-semibold">Q-15</span></p>
        <button onclick="resetForm()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 w-full sm:w-auto">
            New Entry
        </button>
    </div>

    </div>
</div>

<script>
    function nextStep() {
        const id = document.getElementById('studentNo').value.trim();
        if (!id) return alert("Please enter a student ID.");
        document.getElementById('step1').classList.add('hidden');
        document.getElementById('step2').classList.remove('hidden');

        const studentType = detectType(id);
        document.getElementById('studentTypeResult').textContent = studentType;

        if (studentType === 'New Student') {
        document.getElementById('creditSubjects').classList.add('hidden');
        document.getElementById('availableSchedules').classList.remove('hidden');
        } else {
        document.getElementById('creditSubjects').classList.remove('hidden');
        document.getElementById('availableSchedules').classList.add('hidden');
        }
    }
    function detectType(id) {
        //return 'New Student'; // Kunwari new student
        return 'Old Student'; //Shiftee or Transferee
    }

    function showStep(stepId) {
        document.querySelectorAll('[id^="step"]').forEach(div => div.classList.add('hidden'));
        document.getElementById(stepId).classList.remove('hidden');
    }

    function resetForm() {
        document.getElementById('studentNo').value = '';
        showStep('step1');
    }
</script>

<?php include('includes/footer.php'); ?>
