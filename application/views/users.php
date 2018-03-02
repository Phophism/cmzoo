<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>Name</th>
        </tr>
        <?php
        //setlect all

            foreach ($users_list as $user) {
                echo '
                    <tr>
                        <td>' . $user->id . '</td>
                        <td>' . $user->username . '</td>
                        <td>' . $user->password . '</td>
                        <td>' . $user->name . '</td>
                    </tr>
                ';
            }
        ?>
        
    </table>
    <i class="fas fa-camera-retro"></i>
    <i class="far fa-copy"></i>
</body>
</html>