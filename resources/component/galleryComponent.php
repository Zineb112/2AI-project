<?php

function display_gallery(){
    global $pdo;
    try{
    $sql ="SELECT g.id, g.title, g.category, g.cover, g.link, g.type, m.file_location FROM gallery g join media m on g.cover = m.id ORDER BY g.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $gallery){

        echo <<<gallery
        <div class="portfolio-block-one mix {$gallery->type}" data-aos="flip-down" data-aos-duration="1000">
        <div class="image-box">
            <figure class="image"><img src="iuploads/{$gallery->file_location}" alt="{$gallery->title}"></figure>
            <div class="content-box">
                <div class="inner">
                    <div class="title">{$gallery->title}</div>
                    <h3><a href="{$gallery->link}" target="_blank">{$gallery->category}</a></h3>
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

function display_last_gallery(){
    global $pdo;
    try{
    $sql ="SELECT g.id, g.title, g.category, g.cover, g.link, g.type, m.file_location FROM gallery g join media m on g.cover = m.id ORDER BY g.id DESC LIMIT 7";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $gallery){

        echo <<<gallery
        <div><a href="{$gallery->link}" target="_blank"><img src="iuploads/{$gallery->file_location}" style="width: 240px; height:424px;" alt="{$gallery->title}"></a></div>
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

    if(isset($_POST['gallerypagination'])){

    
        $sql ="SELECT * FROM gallery";
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
                <th>Title</th>
                <th>Category</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
table;

    //determine the sql limit
    $this_page_first_result = ($page - 1)*$result_per_page;
        $sql = "SELECT g.*, m.file_name FROM gallery g join media m on g.cover = m.id ORDER BY g.id DESC LIMIT " . $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $gal= $stmt->fetchAll();
        foreach ($gal as $gallery){
        echo <<<gallery
        <tr>
        <td class="text-center text-muted">{$gallery->id}</td>
        <td class="text-center"><img src="../uploads/thumbnails/{$gallery->file_name}" class="br-a" alt="gallery thumbnail"></td>
        <td class="text-center"> {$gallery->title} </td>
        <td class="text-center"> {$gallery->category} </td>
        <td class="text-center"> {$gallery->type} </td>

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