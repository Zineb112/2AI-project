<?php 

function display_newsC2_page(){
    global $pdo;
    try{
    $sql ="SELECT b.*, m.file_location FROM blog_c2 b join media m on b.cover = m.id ORDER BY b.published_at DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $news){
        $reg = date("F jS, Y, g:i a", strtotime($news->published_at));
        echo <<<news
        <div class="blog-one__singleInnov" data-aos="flip-down" data-aos-duration="1000">
        <div class="blog-one__imageInnov">
            <img src="uploads/{$news->file_location}" alt="">
            <a href="news-post.php?pid={$news->id}&post={$news->slug}"><i class="fas fa-plus"></i></a>
        </div>
        <div class="blog-one__contentInnov blogshadow">
            <div class="blog-one__metaInnov">
                <a href="#"><i class="fas fa-calendar-alt"></i>{$reg}</a>
            </div>
            <h3><a href="newspostC2.php?pid={$news->id}&post={$news->slug}">{$news->title}</a></h3>
            <a href="newspostC2.php?pid={$news->id}&post={$news->slug}" class="thm-btn blog-one__btnInnov"><span>Lire la suite</span></a>
        </div>
        </div>


news;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}



function display_newsC2_home(){
    global $pdo;
    try{
    $sql ="SELECT b.*, m.file_location FROM blog_c2 b join media m on b.cover = m.id ORDER BY b.published_at DESC LIMIT 2";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $news){
        $reg = date("F jS, Y, g:i a", strtotime($news->published_at));
        echo <<<news
        <div class="blog-one__singleInnov" data-aos="flip-left" data-aos-duration="1000">
        <div class="blog-one__imageInnov">
            <img src="uploads/{$news->file_location}" alt="">
            <a href="newspostC2.php?pid={$news->id}&post={$news->slug}"><i class="fas fa-plus"></i></a>
        </div>
        <div class="blog-one__contentInnov">
            <div class="blog-one__metaInnov">
                <a href="#"><i class="fas fa-calendar-alt"></i>{$reg}</a>
            </div>
            <h3><a href="newspostC2.php?pid={$news->id}&post={$news->slug}">{$news->title}</a></h3>
            <a href="newsC2post.php?pid={$news->id}&post={$news->slug}" class="thm-btn blog-one__btnInnov"><span>Lire la suite</span></a>
        </div>
        </div>


news;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


function display_three_newsC2(){
    global $pdo;
    try{
    $sql ="SELECT b.*, m.file_location FROM blog_c2 b join media m on b.cover = m.id ORDER BY b.published_at DESC LIMIT 3";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $news){
        $reg = date("F jS, Y, g:i a", strtotime($news->published_at));
        echo <<<news
        <div class="blog-one__singleInnov" data-aos="flip-left" data-aos-duration="1000">
        <div class="blog-one__imageInnov">
            <img src="uploads/{$news->file_location}" alt="">
            <a href="newspostC2.php?pid={$news->id}&post={$news->slug}"><i class="fas fa-plus"></i></a>
        </div>
        <div class="blog-one__contentInnov borderblog">
            <div class="blog-one__metaInnov">
                <a href="#"><i class="fas fa-calendar-alt"></i>{$reg}</a>
            </div>
            <h3><a href="newspostC2.php?pid={$news->id}&post={$news->slug}">{$news->title}</a></h3>
            <a href="newsC2post.php?pid={$news->id}&post={$news->slug}" class="thm-btn blog-one__btnInnov"><span>Lire la suite</span></a>
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
function submit_newsC2(){
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
        $sql = "INSERT INTO `blog_c2` (`id`, `title`, `slug`, `cover`, `content`, `published_at`) VALUES (NULL, ?, ?, ?, ?,CURRENT_TIMESTAMP)";
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

function display_newsC2_admin()
{
    global $pdo;
    try{
        $sql = "SELECT b.*, m.file_name FROM blog_c2 b join media m on b.cover = m.id ORDER BY b.published_at DESC"; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $post){
            $reg = date("F jS, Y, g:i a", strtotime($post->published_at));
        echo <<<news
        <tr>
        <td class="text-center text-muted">{$post->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$post->file_name}" class="br-a" alt="team thumbnail"></td>
        <td class=""> {$post->title} </td>
        <td class=""> {$reg} </td>

        <td class="text-center">
            <a href="index.php?edit_newsC2={$post->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_newsC2&delete_newsC2={$post->id}" data-toggle="modal" data-target="#exampleModal">
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
function delete_newsC2()
{
    global $pdo;
    if (isset($_GET['delete_newsC2'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT b.id, m.file_name FROM blog_c2 b join media m on b.cover = m.id WHERE b.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the post's image data.
                $stmtimg->execute([$_GET['delete_newsC2']]);
                //fetch the post  cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the post
                    $sql = "DELETE b, m FROM blog_c2 b join media m on b.cover = m.id WHERE b.id = ?";
                } else {
                    //this is the default image, The query to delete just the post
                    $sql = "DELETE FROM blog_c2 WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The team.
                $stmt->execute([$_GET['delete_newsC2']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'Post deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update a post information

function update_newsC2()
{
    global $pdo;
    if (isset($_POST['submit'])) {
        try {
          if(empty($_FILES['cover']['name'])){
            $cover_id = $_POST['cover_id'];
            $title = trim($_POST['title']);
            $slug =create_url_slug($title);
          }else{
            //**------  function for handling image upload-------*/
            upload_image('cover', $cover_id);
          }
            

            $sql = "UPDATE `blog_c2` SET `slug` = ?,`title` = ?, `content` = ?, `published_at` = CURRENT_TIMESTAMP, `cover` = ? WHERE `blog_c2`.`id` = ?";
            $update_newsC2 = $pdo->prepare($sql);
            $update_newsC2->execute([$slug , $title, $_POST['content'], $cover_id, $_POST['newsC2_id']]);
            if ($update_newsC2) {
                set_message('success', 'Post information updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}

















?>