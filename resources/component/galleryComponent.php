<?php

function display_gallery(){
    global $pdo;
    try{
    $sql ="SELECT g.title, g.category, g.cover, g.link, g.type, m.file_location FROM gallery g join media m on g.cover = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $gallery){

        echo <<<gallery
        <div class="portfolio-block-one mix {$gallery->type}" data-aos="flip-down" data-aos-duration="1000">
        <div class="image-box">
            <figure class="image"><img src="iuploads/{$gallery->file_location}" alt="{$gallery->title}"></figure>
            <div class="content-box">
                <div class="inner">
                    <div class="title">{$gallery->title}</div>
                    <h3><a href="portfolio-details.html">{$gallery->category}</a></h3>
                </div>
            </div>
        </div>
    </div>
      



gallery;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' .$e->getMessage();
    }
}
   

?>