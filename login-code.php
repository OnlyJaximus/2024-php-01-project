<?php

include('config/function.php');

if (isset($_POST['loginBtn'])) {
    $emailInput = validate($_POST['email']);
    $passwordInput = validate($_POST['password']);

    $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $password = filter_var($passwordInput, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($email !== '' || $password !== '') { // radi


        // $query = "SELECT * FROM users WHERE email= '$email' AND password = '$password' LIMIT 1";

        $query = "SELECT * FROM users WHERE email= '$email' LIMIT 1";

        $results =  mysqli_query($conn, $query);


        if ($results) {

            if (mysqli_num_rows($results) == 1) {

                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);

                $hashedPassword = $row['password'];

                if (!password_verify($password, $hashedPassword)) {
                    redirect('login.php', 'Invalid password!');
                }


                if ($row['role'] == 'admin') {

                    if ($row['is_ban'] == 1) {
                        redirect('login.php', 'Your account has been banned. Please contact admin!');
                    }

                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUserRole'] = $row['role'];
                    $_SESSION['loggedInUser'] = [
                        'name' => $row['name'],
                        'email' => $row['email']
                    ];
                    redirect('admin/index.php', 'Looged In Successfully!');
                } else {

                    if ($row['is_ban'] == 1) {
                        redirect('login.php', 'Your account has been banned. Please contact admin!');
                    }
                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUserRole'] = $row['role'];
                    $_SESSION['loggedInUser'] = [
                        'name' => $row['name'],
                        'email' => $row['email']
                    ];
                    redirect('index.php', 'Looged In Successfully!');
                }
            } else {
                redirect('login.php', 'Invalid Email Id');
            }
        } else {
            redirect('login.php', 'Something Went Wrong!');
        }
    } else {
        redirect('login.php', 'All Fields are madetory');
    }
}
