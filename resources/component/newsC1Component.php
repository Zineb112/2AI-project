<?php 

function display_newsC1_page(){
    global $pdo;
    try{
    $sql ="SELECT b.slug, b.title, b.published_at, b.content, m.file_location FROM blog_c1 t join media m on b.cover = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $news){
        $reg = date("F jS, Y, g:i a", strtotime($news->published_at));
        echo <<<news
        <div class="blog-one__single" data-aos="flip-down" data-aos-duration="1000">
        <div class="blog-one__image">
            <img src="uploads/{$news->file_location}" alt="">
            <a href="news-post.php?bid={$news->id}$news={$news->slug}"><i class="fas fa-plus"></i></a>
        </div><!-- /.blog-one__image -->
        <div class="blog-one__content">
            <div class="blog-one__meta">
                <a href="#"><i class="fas fa-calendar-alt"></i>{$reg}</a>
            </div><!-- /.blog-one__meta -->
            <h3><a href="news-post.html">{$news->title}</a></h3>
            <a href="news-post.php?bid={$news->id}$news={$news->slug}" class="thm-btn blog-one__btn"><span>View more</span></a>
            <!-- /.thm-btn blog-one__btn -->
        </div><!-- /.blog-one__content -->
</div>
news;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


// Create a news to database admin area
function submit_newsc1(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $title = trim($_POST['title']);
        $slug =create_url_slug($title);
        $content = trim($_POST['content']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `blog_c1` (`id`, `title`, `slug`, `cover`, `content`, `published_at`) VALUES (NULL, ?, ?, ?, ?,CURRENT_TIMESTAMP)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$title, $slug, $cover_id, $content ]);
        if($result){
            set_message('success','News created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}

?>