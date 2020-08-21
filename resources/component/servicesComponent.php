<?php 

//*** department or services */

//Display services in the adding users Form
function display_service_in_form()
{
    global $pdo;
    $sql = "SELECT id, service_name FROM service";
    $services = $pdo->query($sql)->fetchAll();

    foreach ($services as $service) {
        echo <<<service
        <option value="{$service->id}">{$service->service_name}</option>;
service;

    }

}

?>