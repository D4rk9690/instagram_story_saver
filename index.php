<!DOCTYPE html>
<html>
<head>
    <title>Scrapify</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #121212;
            color: #fff;
        }

        #account-setup {
            background-color: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        h2 {
            margin: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 8px 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .main-header {
            background-color: dodgerblue;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .main-header h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
        }

        /* Media Query for Mobile Responsive Design */
        @media (max-width: 768px) {
            .main-header {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin-top: 10px;
            }

            nav ul li {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
<header class="main-header">
    <h1>Scrapify</h1>
    <nav>
        <ul>
        </ul>
    </nav>
</header>
<div id="account-setup">
    <?php
    if (file_exists('settings.json')) {
        $settings = json_decode(file_get_contents('settings.json'), true);
        if (isset($settings['ID']) && isset($settings['USERNAME'])) {
            echo '<h2>Already connected to an account. </br> ID <span style="color: dodgerblue">' . $settings['ID'] . '</span> </br> Username <span style="color: dodgerblue">' . $settings['USERNAME'] . '</span></h2>';
            echo '<a href="process.html?userID=' . $settings['ID'] . '&username=' . $settings['USERNAME'] . '"><button>Process</button></a>';

        } else {
            echo '<h2>Add an Instagram Account</h2>';
            echo '<form action="add_account.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="userID">User ID:</label>
                    <input type="text" id="userID" name="userID" required>
                    <button type="submit">Add Account</button>
                </form>';
        }
    } else {
        echo '<h2>Add an Instagram Account</h2>';
        echo '<form action="add_account.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="userID">User ID:</label>
                <input type="text" id="userID" name="userID" required>
                <button type="submit">Add Account</button>
            </form>';
    }
    ?>
</div>
</body>
</html>
