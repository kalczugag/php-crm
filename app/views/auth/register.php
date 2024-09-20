<div class="flex flex-col items-center space-y-4 pt-20">
    <h1 class="text-3xl font-bold"><?= htmlspecialchars($title) ?></h1>
    <form action="/register" method="post" class="flex flex-col space-y-6 min-w-64">
            <div class="flex flex-col space-y-2">
                <input name="email" id="email" placeholder="Email" class="p-2 border rounded">
                <input type="password" name="password" id="password" placeholder="Password" class="p-2 border rounded">
            </div>
            <button type="submit" class="p-2 bg-blue-500 text-white rounded">Submit</button>
    </form>
</div>