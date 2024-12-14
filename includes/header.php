<header>
    <h1>Library Management System</h1>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="logout.php" class="btn">Logout</a>
    <?php endif; ?>
</header>