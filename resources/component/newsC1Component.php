<?php 




function display_newsC1_page(){
    global $pdo;
    if(isset($_POST['displayNewsC1'])){

    
        $sql ="SELECT * FROM blog_c1";
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
        $sql ="SELECT b.*, m.file_location FROM blog_c1 b join media m on b.cover = m.id ORDER BY b.published_at DESC LIMIT ". $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll();
        
        foreach ($posts as $news){
            $reg = date("F jS, Y, g:i a", strtotime($news->published_at));

            echo <<<news
    <div class="col-lg-4 col-md-6 col-sm-12">
    <article class="post-box blog-item">
        <div class="post-inner">
            <div class="entry-media">                                   
                <a href="post.php?id={$news->id}&post={$news->slug}"><img class="blog-border" src="uploads/{$news->file_location}" alt="{$news->title}"></a>
            </div>                         
            <div class="inner-post">
                <div class="entry-header">
                    <div class="entry-meta">
                        <span class="posted-on"><a>{$reg}</a></span>
                    </div><!-- .entry-meta -->
                    
                    <h3 class="entry-title"><a href="post.php?id={$news->id}&post={$news->slug}">{$news->title}</a></h3>
                </div><!-- .entry-header -->
                
                <div class="btn-readmore">
                    <a href="post.php?id={$news->id}&post={$news->slug}"><i class="flaticon-right-arrow-1"></i>PLUS</a>
                </div>
            </div>
        </div>
    </article>
</div>




news;
        
    }

    echo '<div class="paggination-style ot-button text-center post-pagination"><ul class="page-pagination none-style">';
    //for the pagination links
    //display links to the page
    for($i=max(1,$page-2); $i<=min($page+4, $number_of_pages); $i++){
        if($i == $page){
            echo '<li><span aria-current="page" class="page-numbers current"><a  id="'. $i .'">'.$i .'</a></span></li>';
        } else {
            echo '<li><a class="pagination_link page-numbers" id="'. $i .'">'.$i .'</a></li>';
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






function display_newsC1_home(){
    global $pdo;
    try{
    $sql ="SELECT b.*, m.file_location FROM blog_c1 b join media m on b.cover = m.id ORDER BY b.published_at DESC LIMIT 3";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $news){
        $reg = date("F jS, Y, g:i a", strtotime($news->published_at));
        echo <<<news
<div class="col-lg-4 col-md-6 col-sm-12">
<article class="post-box blog-item">
    <div class="post-inner">
        <div class="entry-media">                                   
            <a href="post.php?id={$news->id}&post={$news->slug}"><img class="blog-border" src="uploads/{$news->file_location}" alt="{$news->title}"></a>
        </div>                         
        <div class="inner-post">
            <div class="entry-header">
                <div class="entry-meta">
                    <span class="posted-on"><a>{$reg}</a></span>
                </div><!-- .entry-meta -->
                
                <h3 class="entry-title"><a href="post.php?id={$news->id}&post={$news->slug}">{$news->title}</a></h3>
            </div><!-- .entry-header -->
            
            <div class="btn-readmore">
                <a href="post.php?id={$news->id}&post={$news->slug}"><i class="flaticon-right-arrow-1"></i>PLUS</a>
            </div>
        </div>
    </div>
</article>
</div>



news;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}

function display_two_post(){
    global $pdo;
    try{
    $sql ="SELECT b.*, m.file_location FROM blog_c1 b join media m on b.cover = m.id ORDER BY b.published_at DESC LIMIT 2";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $news){
        $reg = date("F jS, Y, g:i a", strtotime($news->published_at));
        echo <<<news

<div class="col-md-6">
<div class="post-box blog-item relate-box">
    <div class="post-inner">
        <div class="entry-media">                                  
            <a href="post.php?id={$news->id}&post={$news->slug}"><img class="blog-border" src="uploads/{$news->file_location}" alt="{$news->title}"></a>
        </div>                         
        <div class="inner-post">
            <div class="entry-header">
                <div class="entry-meta">
                    <span class="posted-on"><a href="">$reg</a></span>
                </div><!-- .entry-meta -->
                
                <h4 class="entry-title"><a href="post.php?id={$news->id}&post={$news->slug}">{$news->title}</a></h4>
            </div><!-- .entry-header -->
            
            <div class="btn-readmore">
                <a href="post.php?id={$news->id}&post={$news->slug}"><i class="flaticon-right-arrow-1"></i>PLUS</a>
            </div>
        </div>
    </div>
</div>
</div>
news;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}



// Create a news to database admin area
function submit_newsc1(){
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
        $sql = "INSERT INTO `blog_c1` (`id`, `title`, `slug`, `cover`, `content`, `published_at`) VALUES (NULL, ?, ?, ?, ?,CURRENT_TIMESTAMP)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$title, $slug, $cover_id, $content ]);
        if($result){
            set_message('success','News created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}


//Posts Management. display pots to be edited or deleted in admin area
function display_newsC1_admin()
{
global $pdo;
try{
$sql = "SELECT b.*, m.file_name FROM blog_c1 b join media m on b.cover = m.id ORDER BY b.published_at DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $post){
        $reg = date("F jS, Y, g:i a", strtotime($post->published_at));
        echo <<<news
        <tr>
        <td class="text-center"><img src="../uploads/thumbnails/{$post->file_name}" class="br-a" alt="team thumbnail"></td>
        <td class="text-center"> {$post->title} </td>
        <td class="text-center"> {$reg} </td>

        <td class="text-center">
            <a href="index.php?edit_newsC1={$post->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_newsC1&delete_newsC1={$post->id}" data-toggle="modal" data-target="#exampleModal">
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


// Delete a post
function delete_newsC1()
{
    global $pdo;
    if (isset($_GET['delete_newsC1'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT b.id, m.file_name FROM blog_c1 b join media m on b.cover = m.id WHERE b.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the post's image data.
                $stmtimg->execute([$_GET['delete_newsC1']]);
                //fetch the post  cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the post
                    $sql = "DELETE b, m FROM blog_c1 b join media m on b.cover = m.id WHERE b.id = ?";
                } else {
                    //this is the default image, The query to delete just the post
                    $sql = "DELETE FROM blog_c1 WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The team.
                $stmt->execute([$_GET['delete_newsC1']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'Post deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update a post information

function update_newsC1()
{
    global $pdo;
    if (isset($_POST['submit'])) {
        try {
          if(empty($_FILES['cover']['name'])){
            $cover_id = $_POST['cover_id'];
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $slug =create_url_slug($title);
          }else{
            //**------  function for handling image upload-------*/
            upload_image('cover', $cover_id);
          }
            

            $sql = "UPDATE `blog_c1` SET `slug` = ?,`title` = ?, `content` = ?, `published_at` = CURRENT_TIMESTAMP, `cover` = ? WHERE `blog_c1`.`id` = ?";
            $update_newsC1 = $pdo->prepare($sql);
            $update_newsC1->execute([$slug , $title, $_POST['content'], $cover_id, $_POST['newsC1_id']]);
            if ($update_newsC1) {
                set_message('success', 'Post information updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}

function  display_single_post()
{
    global $pdo;
    if (isset($_GET['id'])){
        try {  
              $sql = "SELECT b.*, m.file_name FROM blog_c1 b left join media m on b.cover = m.id WHERE b.id = ?";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([$_GET['id']]);
              $news = $stmt->fetchAll();
              if ($news){
                  foreach($news as $new){
                    $reg = date("F jS, Y, g:i a", strtotime($new->published_at));
                      echo <<<news
                                <div class="entry-media">
                                <img class="blog-border" class="cover_post" src="uploads/{$new->file_name}" alt="{$new->title}">
                            </div>
                            <div class="inner-post">
                                <div class="entry-header">
                                    <div class="entry-meta">
                                    <span class="posted-on"><a href="">$reg</a></span>
                                    </div>
                                    <h3 class="entry-title"><a href="">{$new->title}</a></h3>
                                </div>
                                <div class="entry-summary">
                                <p>{$new->content}</p>
                                </div>
news;
                  }
              }
          } catch (PDOException $e) {
              echo 'query failed' . $e->getMessage();
          }
    }
}


function display_last_three_post(){
    global $pdo;
    try{
    $sql ="SELECT b.*, m.file_location FROM blog_c1 b join media m on b.cover = m.id ORDER BY b.published_at DESC LIMIT 3";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $news){
        $reg = date("F jS, Y, g:i a", strtotime($news->published_at));
        echo <<<news

<li class="clearfix"> 
<div class="thumb">
<a href="post.php?id={$news->id}&post={$news->slug}"><img class="recent_posts_three" src="uploads/{$news->file_location}" alt="{$news->title}"></a>
</div>
<div class="entry-header">
    <h6><a href="post.php?id={$news->id}&post={$news->slug}">{$news->title}</a></h6>
    <span class="post-on"><span class="entry-date">$reg</span></span>
</div>
</li>


news;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}



?>