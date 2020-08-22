<?php 


function display_partner(){
    global $pdo;
    try{
    $sql ="SELECT p.partner_name, p.partner_logo, p.partner_link, m.file_name FROM partners p join media m on p.partner_logo = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $partners){
        echo <<<partners
        <li class="partners__item">
        <a href="{$partners->partner_link}" target ="_blank">
        <img src="uploads/{$partners->file_name}" alt="{$partners->partner_name}" class="partners__img">
        </a>  
       </li>
partners;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}







?>