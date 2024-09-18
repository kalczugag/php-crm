<div>
    <h1><?= htmlspecialchars($title) ?></h1>

    <?php if (!empty($users)): ?>
        <ul>
            <?php foreach ($users as $user): ?>
                <li><?= htmlspecialchars($user->name) ?></li>
            <?php endforeach; ?>
        </ul>


    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>
</div>