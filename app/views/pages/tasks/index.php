<div class="flex flex-col">
    <div class="flex flex-col space-y-4">
        <div class="flex flex-row items-center justify between space-x-4 p-4 rounded">
            <div id="tasks-date" class="flex flex-col text-2xl">
            </div>
            <h1 class="text-2xl">
                <?= htmlspecialchars($title) ?>
            </h1>
        </div>
        <div class="w-full bg-white shadow-md rounded">
            <form action="post">
                <div class="border-b">
                    <input type="text" placeholder="Add Task" class="w-full p-3 outline-none placeholder:text-blue-600">
                </div>
                <div class="flex justify-between p-2">
                    <button class="border p-1 px-4 rounded hover:bg-gray-200 active:bg-gray-300">
                        Add
                    </button>
                </div>
            </form>
        </div>
        <div class="overflow-x-auto bg-white w-full shadow-md rounded">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border p-2 bg-gray-200 text-start">Name</th>
                        <th class="border p-2 bg-gray-200 text-center">Due date</th>
                        <th class="border p-2 bg-gray-200 text-center">Importance</th>
                        <th class="border p-2 bg-gray-200 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border p-2 text-start">x</td>
                        <td class="border p-2 center">d</td>
                        <td class="border p-2 text-center">d</td>
                        <td class="space-x-2 border p-2 text-center">
                            <button class="border p-1 px-4 rounded hover:bg-gray-200 active:bg-gray-300">
                                Edit
                            </button>
                            <button class="border p-1 px-4 rounded hover:bg-gray-200 active:bg-gray-300">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>