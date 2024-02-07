<?php
require('../config/function.php');


$paramResult =  checkParamId('id');

if (is_numeric($paramResult)) {

    $serviceId = validate($paramResult);

    $service = getById('services', $serviceId);

    if ($service['status'] == 200) {

        $serviceDeleteRes = deleteQuery('services', $serviceId);

        if ($serviceDeleteRes) {

            $deleteImage = $service['data']['image'];

            if (file_exists($deleteImage)) {
                unlink($deleteImage);
            }
            redirect('services.php', 'Service Deleted Successfully!!');
        } else {
            redirect('services.php', 'Something Went Wrong!');
        }
    } else {
        redirect('services.php', $user['nessage']);
    }
} else {
    redirect('services.php', $paramResult);
}
