<?php
function display_2AINewsC2(){
    global $pdo;
    try{
    $sql ="SELECT a.id, a.full_name, a.link, a.cover,a.role, a.title,  m.file_location FROM ai_news a join media m on a.cover = m.id  ORDER BY a.id DESC " ;
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $ai_news){
        echo <<<ai_news
        <div class="AinewsP__card" data-aos="flip-up" data-aos-duration="1500">
            <div class="AinewsP__top">
            <img src="uploads/{$ai_news->file_location}" alt="{$ai_news->full_name}" >
                <a href="$ai_news->link" target="_blank"><i class="fas fa-play"></i></a>
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

// function for displaying the last 1 2AI News into the homeC2
function display_last_2AINewsC2(){
    global $pdo;
    try{
    $sql ="SELECT a.id, a.full_name, a.link, a.cover,a.role, a.title,  m.file_name FROM ai_news a join media m on a.cover = m.id  ORDER BY a.id DESC LIMIT 1 " ;
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $ai_news){
        echo <<<ai_news
        <div class="aiNews__block">
            <div class="aiNews__img">
            <img src="uploads/{$ai_news->file_name}" alt="{$ai_news->full_name}">
            <a href="$ai_news->link" target="_blank"><i class="fas fa-play"></i></a>
            </div>
            <div class="aiNews__infos">
            <h3 class="aiNews__name">{$ai_news->full_name}</h3>
            <h3 class="aiNews__role">{$ai_news->role}</h3>
            <h3 class="aiNews__titlee">{$ai_news->title}</h3>
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
//Team Management. display 2aiNews to be edited or deleted in admin area

function display_2aiNews_admin()
{
    global $pdo;

    if(isset($_POST['postpagination'])){

    
        $sql ="SELECT * FROM ai_news";
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
                <th>Nom complet</th>
                <th>Rôle</th>
                <th>Titre</th>
                <th>Lien</th>
            </tr>
        </thead>
        <tbody>
table;

    //determine the sql limit
    $this_page_first_result = ($page - 1)*$result_per_page;
    //now finally showing the posts
        $sql = "SELECT a.*, m.file_name FROM ai_news a join media m on a.cover = m.id  ORDER BY a.id DESC LIMIT " . $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $aiNews= $stmt->fetchAll();
        foreach ($aiNews as $ai_news){
        echo <<<ainews
        <tr class="text-center">
        <td class="text-center text-muted">{$ai_news->id}</td>
        <td class="text-center"><img src="../uploads/thumbnails/{$ai_news->file_name}" class="br-a" alt="2ai News thumbnail"></td>
        <td class="text-center"> {$ai_news->full_name} </td>
        <td class="text-center"> {$ai_news->role} </td>
        <td class="text-center"> {$ai_news->title}</td>
        <td class="text-center"><a href="{$ai_news->link}" target="_blank"> {$ai_news->link}</a></td>
        
        <td class="text-center">
            <a href="index.php?edit_2AINewsC2={$ai_news->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="deletebtn" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_2AINewsC2&delete_2ai_news={$ai_news->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
ainews;
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

// Update a 2ai News information

function update_ai_news()
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
            
            $sql = "UPDATE `ai_news` SET `full_name` = ?,`link` = ?, `cover` = ?, `role` = ?, `title` = ? WHERE `ai_news`.`id` = ?";
            $update_ai_news = $pdo->prepare($sql);
            $update_ai_news->execute([$_POST['full_name'], $_POST['link'], $cover_id , $_POST['role'], $_POST['title'], $_POST['ai_news_id']]);
            if ($update_ai_news) {
                set_message('success', '2ai News  updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}
?>

