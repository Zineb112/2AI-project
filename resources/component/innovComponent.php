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



// submit a partner to database admin area
function submit_innov(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $title = trim($_POST['title']);
        $link = trim($_POST['link']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `innov_news` (`id`, `title`, `link`, `cover`) VALUES (NULL, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$title, $link, $cover_id]);
        if($result){
            set_message('success','Innovation news created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}


// Innovation news Management. display innov news to be edited or deleted in admin area

function display_innov_admin()
{
    global $pdo;
    try{
        $sql = "SELECT i.*, m.file_name FROM innov_news i join media m on i.cover = m.id "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $innov){
        echo <<<innov
        <tr>
        <td class="text-center text-muted">{$innov->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$innov->file_name}" class="br-a" alt="partner thumbnail"></td>
        <td class=""> {$innov->title} </td>
        <td class=""> {$innov->link} </td>

        <td class="text-center">
            <a href="index.php?edit_innov={$innov->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_innov-news&delete_innovNews={$innov->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
innov;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}







?>