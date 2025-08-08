<?php include('../includes/stud_header.php'); ?>

<div class="p-6 sm:ml-64 bg-gray-100 min-h-screen mt-15">
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="mt-15 inline-flex items-center p-2 mt-2 ms-3 text-sm text-white bg-blue-800 rounded-lg sm:hidden hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300">
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16"><path fill="currentColor" d="M7.62 7.18L2.79 3.03c-.7-.6-1.79-.1-1.79.82v8.29c0 .93 1.09 1.42 1.79.82l4.83-4.14c.5-.43.5-1.21 0-1.64"/></svg>
    <span class="sr-only">Open sidebar</span>
</button>

    <div class="bg-white rounded-lg shadow-md p-4 mt-15">
        <h1 class="text-lg font-semibold text-center text-blue-950 mb-4">Subjects</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm text-left">
                <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="px-4 py-2 border text-center">Year</th>
                        <th class="px-4 py-2 border text-center">Semester</th>
                        <th class="px-4 py-2 border text-center">Code</th>
                        <th class="px-4 py-2 border text-center">Description</th>
                        <th class="px-4 py-2 border text-center">Units</th>
                        <th class="px-4 py-2 border text-center">Status</th>
                        <th class="px-4 py-2 border text-center">PreReq</th>
                        <th class="px-4 py-2 border text-center">Status</th> 
                        <th class="px-4 py-2 border text-center">Can Enroll</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800"> <!--Di ko alam kung gagamit kayo ng loop para sa content nito-->
                    <tr class="bg-white">
                        <td class="px-4 py-2 border text-center">1</td>
                        <td class="px-4 py-2 border text-center">1</td>
                        <td class="px-4 py-2 border text-center">GE 003C</td>
                        <td class="px-4 py-2 border text-center">Mathematics in the Modern World</td>
                        <td class="px-4 py-2 border text-center">3.00</td>
                        <td class="px-4 py-2 border text-center">Passed</td>
                        <td class="px-4 py-2 border text-center">—</td>
                        <td class="px-4 py-2 border text-center">—</td>
                        <td class="px-4 py-2 border text-center">No</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-4 py-2 border text-center">1</td>
                        <td class="px-4 py-2 border text-center">1</td>
                        <td class="px-4 py-2 border text-center">GE 005</td>
                        <td class="px-4 py-2 border text-center">Science, Technology & Society</td>
                        <td class="px-4 py-2 border text-center">3.00</td>
                        <td class="px-4 py-2 border text-center">Passed</td>
                        <td class="px-4 py-2 border text-center">—</td>
                        <td class="px-4 py-2 border text-center">—</td>
                        <td class="px-4 py-2 border text-center">No</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>