<?php
if (isset($_SESSION['auth'])) {

    if ($_SESSION['loggedInUserRole']) {

        $role = validate($_SESSION['loggedInUserRole']);
        $email = validate($_SESSION['loggedInUser']['email']);

        $query = "SELECT * FROM users WHERE email = '$email' AND role = '$role' LIMIT 1";
        $results = mysqli_query($conn, $query);

        if ($results) {
            if (mysqli_num_rows($results) == 0) {
                logoutSession();
                redirect("../login.php", "Access Denied");
            } else {
                $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
                if ($row['role'] != 'admin') {
                    logoutSession();
                    redirect("../login.php", "Access Denied");
                }
                if ($row['is_ban'] == 1) {
                    logoutSession();
                    redirect("../login.php", "Your Account has been banned. Please contact admin.");
                }
            }
        } else {
            logoutSession();
            redirect("../login.php", "Something Went Wrong");
        }
    }
} else {
    logoutSession();
    redirect("../login.php", "Login to continue...");
}
