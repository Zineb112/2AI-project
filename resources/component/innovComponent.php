<?php 


function display_innovNews(){
    global $pdo;
    try{
    $sql ="SELECT i.title, i.link, i.cover, m.file_name FROM innov_news i join media m on i.cover = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $innovNews){
        echo <<<innov

        <div class="Inews__singleInnov" data-aos="flip-up" data-aos-duration="1500">
        <div class="Inews__imageInnov">
            <img src="uploads/{$innovNews->file_name}" alt="{$innovNews->title}">
            <a href="{$innovNews->link}"><i class="fas fa-play"></i></a>
        </div>
        <div class="Inews__contentInnov">
            <h3><a href="{$innovNews->link}">{$innovNews->title}</a></h3>
            <a href="{$innovNews->link}" class="thm-btn Inews__btnInnov"><span>Lire la vidéo</span></a>
        </div>
    </div>
innov;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}














?>