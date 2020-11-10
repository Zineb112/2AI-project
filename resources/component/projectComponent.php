<?php

function display_gallery(){
    global $pdo;
    try{
    $sql ="SELECT p.*, m.file_location FROM project p join media m on p.cover = m.id ORDER BY p.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $project){


        echo <<<gallery
    <div class="project-item {$project->type}">
    <div class="projects-box">
            <div class="projects-thumbnail">
                <a href="project.php?id={$project->id}&post={$project->slug}">
                    <img class="project_img_home" src="uploads/{$project->file_location}" alt="{$project->title}">
                </a>
            </div>
            <div class="portfolio-info">
                <a class="overlay" href="project.php?id={$project->id}&post={$project->slug}"></a>
                <div class="portfolio-info-inner">
                    <h5><a href="project.php?id={$project->id}&post={$project->slug}">{$project->title}</a></h5>
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
    $sql ="SELECT p.*, m.file_location FROM project p join media m on p.cover = m.id ORDER BY p.id DESC LIMIT 5";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $project){

        echo <<<gallery


<div class="project-item projects-style-2">
<div class="projects-box">
    <div class="projects-thumbnail">
        <a href="project.php?id={$project->id}&post={$project->slug}">
            <img src="uploads/{$project->file_location}" class="" alt="{$project->title}">                         
            <a class="overlay" href="project.php?id={$project->id}&post={$project->slug}"></a>
        </a>
    </div>
    <div class="portfolio-info ">
        <div class="portfolio-info-inner">
            <a class="btn-link" href=""><i class="flaticon-right-arrow-1"></i></a>
            <h5><a href="project.php?id={$project->id}&post={$project->slug}">{$project->title}</a></h5>
            <p class="portfolio-cates">
                <a>{$project->type}</a>
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
        $slug =create_url_slug($title);
        $type = trim($_POST['type']);
        $content = trim($_POST['content']);
        $client = trim($_POST['client']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `project` (`id`, `title`, `slug`, `content`, `type`, `cover`, `client`, `published_at`) VALUES (NULL, ?, ?, ?, ?,?, ?, CURRENT_TIMESTAMP)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$title, $slug, $content, $type, $cover_id, $client]);
        if($result){
            set_message('success','project created successfully');
            
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
    $sql = "SELECT p.*, m.file_name FROM project p join media m on p.cover = m.id ORDER BY p.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $gallery){
        echo <<<gallery
        <tr>
        <td class="text-center"><img src="../uploads/thumbnails/{$gallery->file_name}" class="br-a" alt="gallery thumbnail"></td>
        <td class="text-center"> {$gallery->title} </td>
        <td class="text-center"> {$gallery->type} </td>
        <td class="text-center"> {$gallery->client} </td>
        <td class="text-center"> {$gallery->published_at} </td>

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
            $sqlimg = "SELECT m.id, m.file_name FROM project p join media m on p.cover = m.id WHERE p.id = ?";
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
                    $sql = "DELETE p, m FROM project p join media m on p.cover = m.id WHERE p.id = ?";
                } else {
                    //this is the default image, The query to delete just the gallery
                    $sql = "DELETE FROM project WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The gallery item.
                $stmt->execute([$_GET['delete_gallery']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'project deleted successfully');
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
            $title = trim($_POST['title']);
            $slug =create_url_slug($title);
            $type = trim($_POST['type']);
            $content = trim($_POST['content']);
            $client = trim($_POST['client']);
            $cover_id = $_POST['cover_id'];
          }else{
            //**------  function for handling image upload-------*/
            upload_image('cover', $cover_id);
          }
            

            $sql = "UPDATE `project` SET `title` = ?,`slug` = ?, `type` = ?, `content` = ?, `client` = ? , `cover` = ?, `published_at` = CURRENT_TIMESTAMP   WHERE `project`.`id` = ?";
            $update_gallery = $pdo->prepare($sql);
            $update_gallery->execute([$title, $slug, $type, $content, $client,$cover_id,  $_POST['project_id']]);
            if ($update_gallery) {
                set_message('success', 'project item updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}



function  display_single_project()
{
    global $pdo;
    if (isset($_GET['id'])){
        try {  
              $sql = "SELECT p.*, m.file_name FROM project p left join media m on p.cover = m.id WHERE p.id = ?";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([$_GET['id']]);
              $projects = $stmt->fetchAll();
              if ($projects){
                  foreach($projects as $project){
                    $reg = date("F jS, Y, g:i a", strtotime($project->published_at));
                      echo <<<project


                      <div class="row">
                      <div class="col-md-12 mb-5">
                      <img class="single-project-cover" src="uploads/{$project->file_name}" alt="{$project->title}">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                      <h2>{$project->title}</h2>
                      </div>
                      <div class="col-md-8">
                      <p>
                      {$project->content}
                      </p>
                      </div>
                      <div class="offset-lg-1 col-lg-3 col-md-4">
                            <div class="row">
                                <div class="col-md-12 col-6">
                                    <div class="project-detail mb-3">
                                        <span>PUBLIÉ:</span>
                                        <strong>$reg</strong>
                                    </div>
                                </div>
                                <div class="col-md-12 col-6">
                                    <div class="project-detail mb-3">
                                        <span>CATÉGORIE:</span>
                                        <strong>{$project->type}</strong>
                                    </div>
                                </div>
                                <div class="col-md-12 col-6">
                                    <div class="project-detail mb-3">
                                        <span>CLIENT:</span>
                                        <strong>{$project->client}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>

project;
                  }
              }
          } catch (PDOException $e) {
              echo 'query failed' . $e->getMessage();
          }
    }
}



function display_project_three(){
    global $pdo;
    try{
    $sql ="SELECT p.*, m.file_location FROM project p join media m on p.cover = m.id ORDER BY p.id DESC LIMIT 3";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $project){

        echo <<<gallery



<div class="col-lg-4 col-md-6 no-padding">
<div class="project-item design">
    <div class="projects-box">
        <div class="projects-thumbnail">
            <a href="project.php?id={$project->id}&post={$project->slug}">
                <img src="uploads/{$project->file_location}" alt="{$project->title}"></a>
            </div>
            <div class="portfolio-info">
                <a class="overlay" href="project.php?id={$project->id}&post={$project->slug}"></a>
                <div class="portfolio-info-inner">
                    <h5>
                        <a href="project.php?id={$project->id}&post={$project->slug}">{$project->title}</a>
                    </h5>
                    <p class="portfolio-cates">
                        <a>{$project->type}</a>
                    </p>
                </div>
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