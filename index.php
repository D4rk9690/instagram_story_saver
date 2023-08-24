<!DOCTYPE html>
<html>
<head>
    <title>Instagram Account Setup</title>
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
    </style>
</head>
<body>
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
