<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - StudyTogether</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/signup.css">

</head>
<body>
    <header class="top-bar">
        <h1>STUDY GROUPS</h1>

        <nav class="top-actions">
            <button type="button">ACCEDI</button>
            <button type="button">REGISTRATI</button>
        </nav>
    </header>

    <main class="login-container">

        <div class="login-card">
            <h2>REGISTRATI</h2>

            <form class="login-box" action="home.php">
                
                <input type="text" name="username" placeholder="EMAIL / USERNAME" required>

                <input type="email" name="email" placeholder="EMAIL" required>

                <input type="password" name="password" placeholder="PASSWORD" required>

                <button type="submit">REGISTRATI</button>

            </form>

            <section class="signup-area">

                <p class="signup-row">
                    <span>Hai già un'account?</span>

                    <button type="button">ACCEDI</button>
                </p>
            </section>

        </div>
        
    </main>
</body>
</html>