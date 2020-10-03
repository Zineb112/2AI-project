<?php 

function display_guide_page(){
    global $pdo;
    if(isset($_POST['displayGuide'])){

    
        $sql ="SELECT * FROM guide";
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

        //determine the sql limit
        $this_page_first_result = ($page - 1)*$result_per_page;
        //now finally showing the posts
        $sql ="SELECT g.id, g.full_name, g.link, g.role, g.title, g.cover, m.file_location FROM guide g join media m on g.cover = m.id ORDER BY g.id DESC LIMIT ". $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $gui = $stmt->fetchAll();
        
        foreach ($gui as $guide){
            echo <<<guide
            <div class="guideInv__card" data-aos="flip-down" data-aos-duration="1500">
            <div class="guideInv__top">
                <img src="uploads/{$guide->file_location}" alt="{$guide->title}">
                <a href="{$guide->link}" target="_blank"><i class="fas fa-play"></i></a>
            </div>
            <div class="guideInv__bottom">
                <h3 class="guideInv__name">{$guide->full_name}</h3>
                <h3 class="guideInv__role">{$guide->role}g</h3>
                <h3 class="guideInv__episode">{$guide->title}</h3>
            </div>
        </div>
    guide;
        
    }

    echo '<section class="pagination2AI"><div class="pagination-container post-pagination">';
    //for the pagination links
    //display links to the page
    for($i=max(1,$page-2); $i<=min($page+4, $number_of_pages); $i++){
        if($i == $page){
            echo '<a class="pagination_link pagination__icon pagination__icon--active active" id="'. $i .'">'.$i .'</a>';
        } else {
            echo '<a class="pagination_link pagination__icon pagination__icon--active" id="'. $i .'">'.$i .'</a>';
        }
    }

    // $check = $this_page_first_result + $result_per_page;
    // $next = $page + 1;
    // // if($number_of_results > $check){
    // //     echo '<div class="post-pagination"><a class="pagination_link pagination__icon" id="'. $next .'">></a>'.'</div>';

    // // }
    // // else {
    // //     echo " ";
    // // }
    // echo '</div>';
}


}



// function for displaying the last 3 guide into the homeC2

function display_last_guide(){
    global $pdo;
    try{
    $sql ="SELECT g.id, g.full_name, g.link, g.role, g.title, g.cover, m.file_location FROM guide g join media m on g.cover = m.id ORDER BY g.id DESC LIMIT 3";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $innovNews){
        echo <<<innov

        <div class="guideI__perso" data-aos="flip-up" data-aos-duration="1000">
        <div class="guideI__perso--img">
        <img src="uploads/{$innovNews->file_location}" alt="{$innovNews->title}">
        <a href="{$innovNews->link}" target="_blank"><i class="fas fa-play"></i></a>
        </div>  
        <h3 class="guideI__perso--name">{$innovNews->full_name}</h3>
        <h3 class="guideI__perso--role">{$innovNews->role}</h3>
        <h3 class="guideI__perso--title">{$innovNews->title}</h3>
    </div>
innov;
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
            set_message('success','Inventors guide created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}



//Inventor's guide Management. display Inventor's guide to be edited or deleted in admin area

function display_guide_admin()
{
    global $pdo;

    if(isset($_POST['guidepagination'])){
    $sql ="SELECT * FROM guide";
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
        <th>Cover</th>
        <th>Nom complet</th>
        <th>Rôle</th>
        <th>Lien</th>
        </tr>
    </thead>
    <tbody>
table;

//determine the sql limit
$this_page_first_result = ($page - 1)*$result_per_page;
//now finally showing the posts


        $sql = "SELECT g.*, m.file_name FROM guide g join media m on g.cover = m.id ORDER BY g.id DESC LIMIT " . $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $gui= $stmt->fetchAll();
        foreach ($gui as $guide){
        echo <<<guide
        <tr>
        <td class="text-center text-muted">{$guide->id}</td>
        <td class="text-center"><img src="../uploads/thumbnails/{$guide->file_name}" class="br-a" alt="guide thumbnail"></td>
        <td class="text-center"> {$guide->full_name} </td>
        <td class="text-center"> {$guide->role} </td>
        <td class="text-center"> {$guide->link} </td>

        <td class="text-center">
            <a href="index.php?edit_guide={$guide->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_guide&delete_guide={$guide->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
guide;
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

// Delete an inventor's guide
function delete_guide()
{
    global $pdo;
    if (isset($_GET['delete_guide'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM guide g join media m on g.cover = m.id WHERE g.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the team's image data.
                $stmtimg->execute([$_GET['delete_guide']]);
                //fetch the team  cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the team
                    $sql = "DELETE g, m FROM guide g join media m on g.cover = m.id WHERE g.id = ?";
                } else {
                    //this is the default image, The query to delete just the team
                    $sql = "DELETE FROM guide WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The team.
                $stmt->execute([$_GET['delete_guide']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'inventor guide deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update an inventor's guide information

function update_guide()
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
            

            $sql = "UPDATE `guide` SET `full_name` = ?,`role` = ?, `cover` = ?, `link` = ?, `title` = ?  WHERE `guide`.`id` = ?";
            $update_team = $pdo->prepare($sql);
            $update_team->execute([$_POST['full_name'], $_POST['role'], $cover_id ,$_POST['link'], $_POST['title'], $_POST['guide_id']]);
            if ($update_team) {
                set_message('success', 'inventor guide updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}
?>