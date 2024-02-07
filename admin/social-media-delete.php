<?php
require('../config/function.php');


$paraResult =  checkParamId('id');

if (is_numeric($paraResult)) {

    $socialMediaId = validate($paraResult);

    $socialMedia = getById('socail_medias',  $socialMediaId);

    if ($socialMedia['status'] == 200) {

        $userDeleteRes = deleteQuery('socail_medias',   $socialMediaId);

        if ($userDeleteRes) {
            redirect('social-media.php', 'Social Media Deleted Successfully!!');
        } else {
            redirect('social-media.php', 'Something Went Wrong!');
        }
    } else {
        redirect('social-media.php', $socialMedia['nessage']);
    }
} else {
    redirect('social-media.php', $paramResult);
}
