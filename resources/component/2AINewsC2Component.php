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
//Team Management. display team  to be edited or deleted in admin area

function display_2aiNews_admin()
{
    global $pdo;
    try{
        $sql = "SELECT a.*, m.file_name FROM ai_news a join media m on a.cover = m.id "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $ai_news){
        echo <<<ainews
        <tr>
        <td class="text-center text-muted">{$ai_news->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$ai_news->file_name}" class="br-a" alt="2ai News thumbnail"></td>
        <td class=""> {$ai_news->full_name} </td>
        <td class=""> {$ai_news->link} </td>
        <td class=""> {$ai_news->role} </td>
        <td class=""> {$ai_news->title}</td>
        
        <td class="text-center">
            <a href="index.php?edit_2AINewsC2={$ai_news->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_team&delete_team={$ai_news->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
ainews;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}


// Delete a team
function delete_2ai_news(){
global $pdo;
if (isset($_GET['delete_2ai_news'])) {
    //Exeption Handling
    try {
        //The SQL statement.
        $sqlimg = "SELECT m.id, m.file_name FROM ai_news a join media m on a.cover = m.id WHERE a.id = ?";
            //Prepare our SELECT SQL statement.
            $stmtimg = $pdo->prepare($sqlimg);
            //Execute the statement GET the team's image data.
            $stmtimg->execute([$_GET['delete_2ai_news']]);
            //fetch the 2ai News cover data.
            $img = $stmtimg->fetch();
            //Check if it's the default image, we don't want to delete the default image.
            if ($img->id !== '1') {
                //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                //this is not the default image, The query to delete both the image and the 2ai News
                $sql = "DELETE a, m FROM ai_news a join media m on a.cover = m.id WHERE a.id = ?";
            } else {
                //this is the default image, The query to delete just the 2ai News
                $sql = "DELETE FROM ai_news WHERE id = ?";
            }
                        //Prepare our DELETE SQL statement.
            $stmt = $pdo->prepare($sql);
            //Execute the statement DELETE The 2ai News.
            $stmt->execute([$_GET['delete_2ai_news']]);
            //display toastr notification, event deleted successfully
            set_message('success','2ai News deleted successfully');
}catch (PDOException $e) {
echo 'query failed' . $e->getMessage();
}
}
}

