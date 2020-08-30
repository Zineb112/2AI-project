<?php 

function display_newsC2_page(){
    global $pdo;
    try{
    $sql ="SELECT b.*, m.file_location FROM blog_c2 b join media m on b.cover = m.id ORDER BY b.published_at DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $news){
        $reg = date("F jS, Y, g:i a", strtotime($news->published_at));
        echo <<<news
        <div class="blog-one__singleInnov" data-aos="flip-down" data-aos-duration="1000">
        <div class="blog-one__imageInnov">
            <img src="uploads/{$news->file_location}" alt="">
            <a href="news-post.php?pid={$news->id}&post={$news->slug}"><i class="fas fa-plus"></i></a>
        </div>
        <div class="blog-one__contentInnov blogshadow">
            <div class="blog-one__metaInnov">
                <a href="#"><i class="fas fa-calendar-alt"></i>{$reg}</a>
            </div>
            <h3><a href="newspostC2.php?pid={$news->id}&post={$news->slug}">{$news->title}</a></h3>
            <a href="newspostC2.php?pid={$news->id}&post={$news->slug}" class="thm-btn blog-one__btnInnov"><span>Lire la suite</span></a>
        </div>
        </div>


news;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}














?>