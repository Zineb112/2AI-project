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

// submit 2AI News to database admin area
function submit_ai_news(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $name = trim($_POST['full_name']);
        $link= trim($_POST['link']);
        $role = trim($_POST['role']);
        $title = trim($_POST['title']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `ai_news` (`id`, `full_name`,`link`, `cover`, `role`, `title`) VALUES (NULL, ?, ?, ?, ?,?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $link, $cover_id, $role,  $title ,]);
        if($result){
            set_message('success','2ai News created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}