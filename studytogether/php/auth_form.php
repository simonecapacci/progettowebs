<form action="<?= htmlspecialchars($action) ?>" method="post">

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input
            type="text"
            class="form-control"
            id="username"
            name="username"
            placeholder="Username"
            value="<?= htmlspecialchars($usernameValue, ENT_QUOTES, 'UTF-8') ?>"
            required
        >
    </div>

    <?php if ($showEmail): ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Email"
                value="<?= htmlspecialchars($emailValue, ENT_QUOTES, 'UTF-8') ?>"
                required
            >
        </div>
    <?php endif; ?>

    <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            placeholder="Password"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary w-100">
        <?= htmlspecialchars($submitText) ?>
    </button>

</form>