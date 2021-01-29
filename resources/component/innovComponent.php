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


// function for displaying the last 3 innvo news into the homeC2

function display_last_innovNews(){
    global $pdo;
    try{
    $sql ="SELECT i.*, m.file_name FROM innov_news i join media m on i.cover = m.id ORDER BY i.published_at DESC LIMIT 3";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $innovNews){
        echo <<<innov

    <div
    class="swiper-slide"
    data-tilt="data-tilt"
    data-tilt-max="5"
    data-tilt-speed="500"
    data-tilt-perspective="1500">
    <div class="slide-inner bg-image" data-background="uploads/{$innovNews->file_name}">
        <div class="container">
            <!-- end tagline -->
            <h1>{$innovNews->title}</h1>
            <div class="slide-btn">
                <a href="innovPage.php?id={$innovNews->id}&post={$innovNews->slug}">
                    <div class="lines">
                        <span></span>
                        <span></span>
                    </div>
                    <!-- end lines -->
                    <svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px"
                        y="0px"
                        viewbox="0 0 104 104"
                        enable-background="new 0 0 104 104"
                        xml:space="preserve">
                        <circle
                            class="video-play-circle"
                            fill="none"
                            stroke="#fff"
                            stroke-width="2"
                            stroke-miterlimit="1"
                            cx="52"
                            cy="52"
                            r="50"/>
                    </svg>
                    <b>Plus d'infos</b>
                </a>
            </div>
            <!-- end slide-btn -->
        </div>
        <!-- end container -->
    </div>
    <!-- end slide-inner -->
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
        $slug =create_url_slug($title);
        $content = trim($_POST['content']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `innov_news` (`id`, `title`, `content`,`slug`, `cover`, `published_at`) VALUES (NULL, ?, ?, ?, ?,CURRENT_TIMESTAMP)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$title, $content, $slug, $cover_id]);
        if($result){
            set_message('success','Innovation news created successfully');
            redirect('index.php?manage_innov-news&success');
            
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
$sql = "SELECT i.*, m.file_name FROM innov_news i join media m on i.cover = m.id ORDER BY i.published_at DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $innov){
        $reg = date("F jS, Y, g:i a", strtotime($innov->published_at));
        echo <<<news
        <tr>
        <td class="text-center"><img src="../uploads/thumbnails/{$innov->file_name}" class="br-a" alt="team thumbnail"></td>
        <td class="text-center"> {$innov->title} </td>
        <td class="text-center"> {$reg} </td>

        <td class="text-center">
            <a href="index.php?edit_innov-news={$innov->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_innov-news&delete_innovNews={$innov->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
news;
}
} catch (PDOException $e) {
echo 'query failed' . $e->getMessage();
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
            $title = trim($_POST['title']);
            $slug =create_url_slug($title);
            $cover_id = $_POST['cover_id'];
          }else{
            //**------  function for handling image upload-------*/
            upload_image('cover', $cover_id);
          }
            

            $sql = "UPDATE `innov_news` SET `slug` = ?, `title` = ?,`content` = ?, `published_at` = CURRENT_TIMESTAMP, `cover` = ? WHERE `innov_news`.`id` = ?";
            $update_innov = $pdo->prepare($sql);
            $update_innov->execute([$slug ,$title, $_POST['content'], $cover_id , $_POST['innov_id']]);
            if ($update_innov) {
                set_message('success', 'Innovation news updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}


function  display_innov_post()
{
    global $pdo;
    if (isset($_GET['id'])){
        try {  
              $sql = "SELECT i.*, m.file_name FROM innov_news i left join media m on i.cover = m.id WHERE i.id = ?";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([$_GET['id']]);
              $news = $stmt->fetchAll();
              if ($news){
                  foreach($news as $new){
                    $reg = date("F jS, Y", strtotime($new->published_at));
                      echo <<<news

                                <div class="post single-post wow fadeIn">
                                <figure class="post-image">
                                    <img src="uploads/{$new->file_name}" alt="{$new->title}">
                                </figure>
                                <!-- end news-image -->
                                <div class="post-content">
                                <div class="inner"> <small class="post-date">$reg</small>
                                    <h3 class="post-title"><a href="innovPage.php?id={$new->id}&post={$new->slug}">{$new->title}</a></h3>
                                    
                                  <p>{$new->content}</p>
                                    </div>
                                    <!-- end inner -->
                                </div>
                                <!-- end post-content -->
                            </div>
news;
                  }
              }
          } catch (PDOException $e) {
              echo 'query failed' . $e->getMessage();
          }
    }
}



?>