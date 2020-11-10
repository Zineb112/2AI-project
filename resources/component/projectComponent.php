<?php

function display_gallery(){
    global $pdo;
    try{
    $sql ="SELECT p.*, m.file_location FROM project p join media m on p.cover = m.id ORDER BY p.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $project){

        echo <<<gallery
        $reg = date("F jS, Y, g:i a", strtotime($project->published_at));
    <div class="project-item {$project->type}">
    <div class="projects-box">
            <div class="projects-thumbnail">
                <a href="">
                    <img class="project_img_home" src="iuploads/{$project->file_location}" alt="{$project->title}">
                </a>
            </div>
            <div class="portfolio-info">
                <a class="overlay" href=""></a>
                <div class="portfolio-info-inner">
                    <h5><a href="">{$project->title}</a></h5>
                    <p class="portfolio-cates">
                        <a >{$project->type}</a>
                    </p> 
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

function display_gallery_home(){
    global $pdo;
    try{
    $sql ="SELECT g.id, g.title, g.category, g.cover, g.link, g.type, m.file_location FROM gallery g join media m on g.cover = m.id ORDER BY g.id DESC LIMIT 5";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $gallery){

        echo <<<gallery


<div class="project-item projects-style-2">
<div class="projects-box">
    <div class="projects-thumbnail">
        <a href="">
            <img src="uploads/{$gallery->file_location}" class="" alt="{$gallery->title}">                         
            <span class="overlay"></span>
        </a>
    </div>
    <div class="portfolio-info ">
        <div class="portfolio-info-inner">
            <a class="btn-link" href=""><i class="flaticon-right-arrow-1"></i></a>
            <h5><a href="">{$gallery->title}</a></h5>
            <p class="portfolio-cates">
                <a href="#">{$gallery->type}</a>
            </p> 
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

// Gallery Management. display images/videos to be edited or deleted in admin area
function display_gallery_admin()
{
global $pdo;
try{
    $sql = "SELECT g.*, m.file_name FROM gallery g join media m on g.cover = m.id ORDER BY g.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $gallery){
        echo <<<gallery
        <tr>
        <td class="text-center"><img src="../uploads/thumbnails/{$gallery->file_name}" class="br-a" alt="gallery thumbnail"></td>
        <td class="text-center"> {$gallery->title} </td>
        <td class="text-center"> {$gallery->category} </td>
        <td class="text-center"> {$gallery->type} </td>
        <td class="text-center"> <a href="{$gallery->link}" target="_blank">{$gallery->link}</a></td>

        <td class="text-center">
            <a href="index.php?edit_gallery={$gallery->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_gallery&delete_gallery={$gallery->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
gallery;
}
} catch (PDOException $e) {
echo 'query failed' . $e->getMessage();
}
}

// Delete a gallery items
function delete_gallery()
{
    global $pdo;
    if (isset($_GET['delete_gallery'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM gallery g join media m on g.cover = m.id WHERE g.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the Gallery's image data.
                $stmtimg->execute([$_GET['delete_gallery']]);
                //fetch the gallery cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the gallery
                    $sql = "DELETE g, m FROM gallery g join media m on g.cover = m.id WHERE g.id = ?";
                } else {
                    //this is the default image, The query to delete just the gallery
                    $sql = "DELETE FROM gallery WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The gallery item.
                $stmt->execute([$_GET['delete_gallery']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'gallery deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update gallery item information

function update_gallery()
{
    global $pdo;
    if (isset($_POST['submit'])) {
        try {
          if(empty($_FILES['cover']['name'])){
            $cover_id = $_POST['cover_id'];
          }else{
            //**------  function for handling image upload-------*/
            upload_image('cover', $cover_id);
          }
            

            $sql = "UPDATE `gallery` SET `title` = ?,`category` = ?, `cover` = ?, `type` = ?, `link` = ?   WHERE `gallery`.`id` = ?";
            $update_gallery = $pdo->prepare($sql);
            $update_gallery->execute([$_POST['title'], $_POST['category'], $cover_id ,$_POST['type'], $_POST['link'], $_POST['gallery_id']]);
            if ($update_gallery) {
                set_message('success', 'Gallery item updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}
   
?>