<?php 

function display_guide(){
    global $pdo;
    try{
    $sql ="SELECT g.full_name, g.link, g.role, g.title, g.cover,, m.file_location FROM guide g join media m on g.cover = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $guide){
        echo <<<guide

        <div class="guideInv__card" data-aos="flip-down" data-aos-duration="1500">
        <div class="guideInv__top">
            <img src="uploads/{$guide->file_location}" alt="{$guide->title}">
            <a href="{$guide->link}"><i class="fas fa-play"></i></a>
        </div>
        <div class="guideInv__bottom">
            <h3 class="guideInv__name">{$guide->full_name}</h3>
            <h3 class="guideInv__role">{$guide->role}g</h3>
            <h3 class="guideInv__episode">{$guide->title}</h3>
        </div>
    </div>
guide;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}




?>