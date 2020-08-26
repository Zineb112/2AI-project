<?php 

function display_guide(){
    global $pdo;
    try{
    $sql ="SELECT g.full_name, g.link, g.role, g.title, g.cover, m.file_location FROM guide g join media m on g.cover = m.id";
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


// submit a guide to database admin area
function submit_guide(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $name = trim($_POST['full_name']);
        $role = trim($_POST['role']);
        $title = trim($_POST['title']);
        $link = trim($_POST['link']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `guide` (`id`, `full_name`, `role`, `cover`, `title`, `link`) VALUES (NULL, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $role, $cover_id, $title, $link]);
        if($result){
            set_message('success','Guide episode created successfully');
            
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