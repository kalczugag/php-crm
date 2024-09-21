<div class="flex flex-col justify-between space-y-6 py-4 w-[200px] bg-[#1e1f20] text-white">
    <div class="flex flex-col space-y-6">    
        <a href="/" class="px-4">
            <h1 class="text-3xl font-bold">Todo</h1>
        </a>
        <ul class="space-y-2">
            <li>
                <a href="/tasks?date=today" class="block p-2 px-4 hover:bg-gray-600">
                    Today Tasks
                </a>
            </li>
            <li>
                <a href="/tasks" class="block p-2 px-4 hover:bg-gray-600">
                    All Tasks
                </a>
            </li>
            <li>
                <a href="/tasks?status=starred" class="block p-2 px-4 hover:bg-gray-600">
                    Starred
                </a>
            </li>
            <li>
                <a href="/tasks?status=planned" class="block p-2 px-4 hover:bg-gray-600">
                    Planned
                </a>
            </li>
        </ul>
    </div>
    <a href="/logout" class="block p-2 px-4 hover:bg-gray-600">Logout</a>
</div>
