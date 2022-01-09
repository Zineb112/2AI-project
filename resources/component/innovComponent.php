<?php 

function display_innov_page(){
    global $pdo;
    if(isset($_POST['displayInnov'])){

    
        $sql ="SELECT * FROM innov_news";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //for pagination using ajax, how much to show
        $result_per_page = 6;
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
        $sql ="SELECT i.id, i.title, i.link, i.cover, m.file_name FROM innov_news i join media m on i.cover = m.id ORDER BY i.id DESC LIMIT ". $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $inv = $stmt->fetchAll();
        
        foreach ($inv as $innovNews){
            echo <<<innov
            <div class="Inews__singleInnov" data-aos="flip-up" data-aos-duration="1500">
            <div class="Inews__imageInnov">
                <img src="uploads/{$innovNews->file_name}" alt="{$innovNews->title}">
                <a href="{$innovNews->link}" target="_blank"><i class="fas fa-play"></i></a>
            </div>
            <div class="Inews__contentInnov">
                <h3><a href="{$innovNews->link}" target="_blank">{$innovNews->title}</a></h3>
                <a href="{$innovNews->link}" target="_blank" class="thm-btn Inews__btnInnov"><span>Lire la vidéo</span></a>
            </div>
        </div>
    innov;
        
    }

    echo '<section class="paginationInv"><div class="pagination-container post-pagination">';
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







function display_innovNews(){
    global $pdo;
    try{
    $sql ="SELECT i.id, i.title, i.link, i.cover, m.file_name FROM innov_news i join media m on i.cover = m.id ORDER BY i.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $innovNews){
        echo <<<innov

        <div class="Inews__singleInnov" data-aos="flip-up" data-aos-duration="1500">
        <div class="Inews__imageInnov">
            <img src="uploads/{$innovNews->file_name}" alt="{$innovNews->title}">
            <a href="{$innovNews->link}" target="_blank"><i class="fas fa-play"></i></a>
        </div>
        <div class="Inews__contentInnov">
            <h3><a href="{$innovNews->link}" target="_blank">{$innovNews->title}</a></h3>
            <a href="{$innovNews->link}" target="_blank" class="thm-btn Inews__btnInnov"><span>Lire la vidéo</span></a>
        </div>
    </div>
innov;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}

// function for displaying the last 4 innvo news into the homeC2

function display_last_innovNews(){
    global $pdo;
    try{
    $sql ="SELECT i.id, i.title, i.link, i.cover, m.file_name FROM innov_news i join media m on i.cover = m.id ORDER BY i.id DESC LIMIT 4";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $innovNews){
        echo <<<innov
        <div class="Inews__singleInnov" data-aos="flip-down" data-aos-duration="1500">
        <div class="Inews__imageInnov">
            <img src="uploads/{$innovNews->file_name}" alt="{$innovNews->title}">
            <a href="{$innovNews->link}" target="_blank"><i class="fas fa-play"></i></a>
        </div>
        <div class="Inews__contentInnov">
            <h3><a href="{$innovNews->link}" target="_blank">{$innovNews->title}</a></h3>
            <a href="{$innovNews->link}" target="_blank" class="thm-btn Inews__btnInnov"><span>Lire la vidéo</span></a>
        </div>
    </div>
innov;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}

// submit an innovation news to database admin area
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

    if(isset($_POST['innovpagination'])){

    
        $sql ="SELECT * FROM innov_news";
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
                <th>Titre</th>
                <th>Lien</th>
            </tr>
        </thead>
        <tbody>
table;

    //determine the sql limit
    $this_page_first_result = ($page - 1)*$result_per_page;

        $sql = "SELECT i.*, m.file_name FROM innov_news i join media m on i.cover = m.id ORDER BY i.id DESC LIMIT " . $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $inv= $stmt->fetchAll();
        foreach ($inv as $innov){
        echo <<<innov
        <tr>
        <td class="text-center text-muted">{$innov->id}</td>
        <td class="text-center"><img src="../uploads/thumbnails/{$innov->file_name}" class="br-a" alt="innov news thumbnail"></td>
        <td class="text-center"> {$innov->title} </td>
        <td class="text-center"> {$innov->link} </td>

        <td class="text-center">
            <a href="index.php?edit_innov-news={$innov->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="deletebtn" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_innov-news&delete_innovNews={$innov->id}" data-toggle="modal" data-target="#exampleModal">
            <i class="pe-7s-trash"  style="font-size: 1rem;"></i>
        </button>
        </td>
    </tr>
innov;
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


// Delete an innovation news
function delete_innovNews()
{
    global $pdo;
    if (isset($_GET['delete_innovNews'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM innov_news i join media m on i.cover = m.id WHERE i.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the innov news's image data.
                $stmtimg->execute([$_GET['delete_innovNews']]);
                //fetch the Partner cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the innov news
                    $sql = "DELETE i, m FROM innov_news i join media m on i.cover = m.id WHERE i.id = ?";
                } else {
                    //this is the default image, The query to delete just the innov news
                    $sql = "DELETE FROM innov_news WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The innov news.
                $stmt->execute([$_GET['delete_innovNews']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'Innovation news deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}



// Update an innovation news information

function update_innovNews()
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
            

            $sql = "UPDATE `innov_news` SET `title` = ?,`link` = ?, `cover` = ? WHERE `innov_news`.`id` = ?";
            $update_team = $pdo->prepare($sql);
            $update_team->execute([$_POST['title'], $_POST['link'], $cover_id , $_POST['innov_id']]);
            if ($update_team) {
                set_message('success', 'Innovation news updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}


?>