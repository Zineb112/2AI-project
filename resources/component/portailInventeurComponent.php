<?php

function display_portail(){
    global $pdo;
    try{
    $sql ="SELECT p.id, p.full_name, p.link, p.cover,p.role, p.title, m.file_location FROM portail p join media m on p.cover = m.id  ORDER BY p.id DESC LIMIT 7 ";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $portail){
        echo <<<portail
       <div class="portailN__inv" data-aos="flip-down" data-aos-duration="1000">
            <div class="portailN__inv--top">
                <img src="uploads/{$portail->file_location}" alt="{$portail->full_name}">
                <a href="{$portail->link}" target="_blank"><i class="fas fa-play"></i></a>
            </div>
            <div class="portailN__inv--bottom">
                <h3 class="portailN__name">{$portail->full_name}</h3>
                <h3 class="portailN__role">{$portail->role}</h3>
                <h3 class="portailN__titleI">{$portail->title}</h3>
                <a href="{$portail->link}" target="_blank" class="portailN__play">Lire la vidéo</a>
            </div>
        </div>

portail;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}




// function for displaying the last 3 Carnet de l’inventeur into the homeC2
function display_portail_home(){
    global $pdo;
    try{
    $sql ="SELECT p.id, p.full_name, p.link, p.cover,p.role, p.title, m.file_location FROM portail p join media m on p.cover = m.id  ORDER BY p.id DESC LIMIT 3 ";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $portail){
        echo <<<portail
       <div class="portailN__inv" data-aos="flip-down" data-aos-duration="1000">
            <div class="portailN__inv--top">
                <img src="uploads/{$portail->file_location}" alt="{$portail->full_name}">
                <a href="{$portail->link}" target="_blank"><i class="fas fa-play"></i></a>
            </div>
            <div class="portailN__inv--bottom">
                <h3 class="portailN__name">{$portail->full_name}</h3>
                <h3 class="portailN__role">{$portail->role}</h3>
                <h3 class="portailN__titleI">{$portail->title}</h3>
                <a href="{$portail->link}" target="_blank" class="portailN__play">Lire la vidéo</a>
            </div>
        </div>


portail;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


// submit a portail to database admin area
function submit_portail(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
            $name = trim($_POST['full_name']);
            $role = trim($_POST['role']);
            $link = trim($_POST['link']);
            $title = trim($_POST['title']);
            $file = $_FILES['cover']['name'];
            $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `portail` (`id`, `full_name`, `link`, `cover`,  `role`, `title`) VALUES (NULL, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $link, $cover_id, $role, $title ]);
        if($result){
            set_message('success','portail created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}


// Portail Management. display portail to be edited or deleted in admin area

function display_portail_admin()
{
    global $pdo;

    if(isset($_POST['portailpagination'])){

    
        $sql ="SELECT * FROM portail";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //for pagination using ajax, how much to show
        $result_per_page = 4;
        //To find how many posts in the database
        $number_of_results = $stmt->rowCount();
        //now the var will be on decimal so we round off using ceil fn
        $number_of_pages = ceil($number_of_results/$result_per_page);
        //determineing which page the visitor is currently on
        if(isset($_POST['page'])){
            $page = $_POST['page'];
        } else {
            $page = 1;
        }

        echo <<<table
        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
        <thead>
            <tr class="text-center">
            <th>#</th>
                <th>Thumbnail</th>
                <th>Full name</th>
                <th>Link</th>
                <th>Role</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
table;

    //determine the sql limit
    $this_page_first_result = ($page - 1)*$result_per_page;
        $sql = "SELECT p.*, m.file_name FROM portail p join media m on p.cover = m.id  ORDER BY p.id DESC LIMIT " . $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $port= $stmt->fetchAll();
        foreach ($port as $portail){
        echo <<<portail
        <tr>
        <td class="text-center text-muted">{$portail->id}</td>
        <td class="text-center"><img src="../uploads/thumbnails/{$portail->file_name}" class="br-a" alt="portail thumbnail"></td>
        <td class="text-center"> {$portail->full_name} </td>
        <td class="text-center"> {$portail->link} </td>
        <td class="text-center"> {$portail->role} </td>
        <td class="text-center"> {$portail->title} </td>
        <td class="text-center">
            <a href="index.php?edit_portail={$portail->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_portail&delete_portail={$portail->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
    portail;
    }

    echo <<<tableclose
    </tbody>
</table>
<nav class="" aria-label="Page navigation example">
    <ul class="pagination" style="margin: 1rem 0;justify-content: center;">
tableclose;
//for the pagination links
//display links to the page
for($i=max(1,$page-2); $i<=min($page+4, $number_of_pages); $i++){
if($i == $page){
echo '<li class="page-item active"><a href="javascript:void(0);" class="pagination_link page-link" id="' . $i . '">' .$i. '</a></li>';
} else {
echo '<li class="page-item"><a href="javascript:void(0);" class="pagination_link page-link" id="' . $i . '">' .$i. '</a></li>';
}
}

$check = $this_page_first_result + $result_per_page;
$next = $page + 1;
if($number_of_results > $check){
echo '<li class="page-item"><a href="javascript:void(0);" class="pagination_link page-link" aria-label="Next" id="'. $next .'" ><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>';

}else {
echo " ";
}
echo  '</ul></nav>';
}

}


// Delete a portail
function delete_portail()
{
    global $pdo;
    if (isset($_GET['delete_portail'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM portail p join media m on p.cover = m.id WHERE p.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the portail's image data.
                $stmtimg->execute([$_GET['delete_portail']]);
                //fetch the portail cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the portail
                    $sql = "DELETE p, m FROM portail p join media m on p.cover = m.id WHERE p.id = ?";
                } else {
                    //this is the default image, The query to delete just the portail
                    $sql = "DELETE FROM portail WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The portail.
                $stmt->execute([$_GET['delete_portail']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'portail deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update a  information

function update_portail()
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
            

          $sql = "UPDATE `portail` SET `full_name` = ?, `cover` = ?,`link` = ?, `role` = ?, `title`  = ? WHERE `portail`.`id` = ?";
            $update_portail = $pdo->prepare($sql);
            $update_portail->execute([$_POST['full_name'], $cover_id, $_POST['link'], $_POST['role'], $_POST['title'], $_POST['portail_id']]);
            if ($update_portail) {
                set_message('success', 'portail updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}





?>