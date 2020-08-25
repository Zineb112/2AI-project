<?php
function display_2AINewsC2(){
    global $pdo;
    try{
    $sql ="SELECT a.full_name, a.link, a.cover,a.role, a.title,  m.file_location FROM ai_news a join media m on a.cover = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $ai_news){
        echo <<<ai_news
        <div class="AinewsP__card" data-aos="flip-up" data-aos-duration="1500">
            <div class="AinewsP__top">
            <img src="uploads/{$ai_news->file_location}" alt="{$ai_news->full_name}" >
                <a href=""><i class="fas fa-play"></i></a>
            </div>
            <div class="AinewsP__bottom">
                <h3 class="AinewsP__name">$ai_news->full_name</h3>
                <h3 class="AinewsP__role">$ai_news->role</h3>
                <h3 class="AinewsP__episode">$ai_news->title</h3>
            </div>
        </div>

ai_news;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}
