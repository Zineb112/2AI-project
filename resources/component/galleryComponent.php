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


// submit a gallery to database admin area
function submit_gallery(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $title = trim($_POST['title']);
        $category = trim($_POST['category']);
        $link = trim($_POST['link']);
        $type = trim($_POST['type']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `gallery` (`id`, `title`, `category`, `link`, `type`, `cover`) VALUES (NULL, ?, ?, ?, ?,?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$title, $category, $link, $type, $cover_id]);
        if($result){
            set_message('success','gallery created successfully');
            
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