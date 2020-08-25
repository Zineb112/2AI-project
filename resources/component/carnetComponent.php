<?php 


function display_carnet(){
    global $pdo;
    try{
    $sql ="SELECT c.title, c.date, c.file, m.file_name FROM carnet c join media m on c.file = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $carnet){
        echo <<<partners
        <li class="partners__item">
        <a href="#" target ="_blank">
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