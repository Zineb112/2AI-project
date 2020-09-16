<?php 


function display_carnet(){
    global $pdo;
    try{
    $sql ="SELECT c.id, c.title, c.date, c.file, c.cover, m.file_location FROM carnet c join media m on c.cover = m.id  ORDER BY c.id DESC ";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $carnet){
        echo <<<carnet

        <div class="carnetN__carnet margincarn" data-aos="flip-down" data-aos-duration="1000">
            <img src="uploads/{$carnet->file_location}" alt="">
            <div class="carnetN__infos">
                <h3 class="carnetN__infos--date">Magazine mois {$carnet->date}</h3>
                <h5 class="carnetN__infos--title"> <span>Titre: </span> {$carnet->title}</h5>
                <a href="{$carnet->file}" target="_blank" class="carnetN__download"> Télécharger </a>
            </div>
        </div>



carnet;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


// function for displaying the last 1 Carnet de l’inventeur into the homeC2
function display_last_carnet(){
    global $pdo;
    try{
    $sql ="SELECT c.id, c.title, c.date, c.file, c.cover, m.file_location FROM carnet c join media m on c.cover = m.id  ORDER BY c.id DESC LIMIT 1 ";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $carnet){
        echo <<<carnet
        <div class="carnetN__right" data-aos="flip-down" data-aos-duration="1000">
        <div class="carnetN__carnet">
            <img src="uploads/{$carnet->file_location}" alt="">
            <div class="carnetN__infos">
                <h3 class="carnetN__infos--date">Magazine mois {$carnet->date}</h3>
                <h5 class="carnetN__infos--title"> <span>Titre: </span>{$carnet->title}</h5>
                <a href="{$carnet->file}" target="_blank" class="carnetN__download"> Télécharger </a>
            </div>
        </div>
    </div>



carnet;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


// submit a carnet to database admin area
function submit_carnet(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $title = trim($_POST['title']);
        $date = trim($_POST['date']);
        $file = trim($_POST['file']);
        $cover = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `carnet` (`id`, `title`, `date`, `file`, `cover`) VALUES (NULL, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$title , $date, $file, $cover_id]);
        if($result){
            set_message('success','carnet created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}


// Partner Management. display carnet to be edited or deleted in admin area

function display_carnet_admin()
{
    global $pdo;

    if(isset($_POST['carnetpagination'])){

    
        $sql ="SELECT * FROM carnet";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        //for pagination using ajax, how much to show
        $result_per_page = 5;
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
            <th>Date</th>
            <th>File</th>
            </tr>
        </thead>
        <tbody>
table;

    //determine the sql limit
    $this_page_first_result = ($page - 1)*$result_per_page;
    //now finally showing the posts

        $sql = "SELECT c.*, m.file_name FROM carnet c join media m on c.cover = m.id  ORDER BY c.id DESC LIMIT " . $this_page_first_result .',' . $result_per_page;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $carnets = $stmt->fetchAll();
        foreach ($carnets as $carnet){
        echo <<<carnet
        <tr>
        <td class="text-center text-muted">{$carnet->id}</td>
        <td class="text-center"><img src="../uploads/thumbnails/{$carnet->file_name}" class="br-a" alt="carnet thumbnail"></td>
        <td class="text-center"> {$carnet->title} </td>
        <td class="text-center"> {$carnet->date} </td>
        <td class="text-center"><a href="{$carnet->file}" target="_blank">{$carnet->file}</a></td>

        <td class="text-center">
            <a href="index.php?edit_carnet={$carnet->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_carnet&delete_carnet={$carnet->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
carnet;
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






// Delete a partner
function delete_carnet()
{
    global $pdo;
    if (isset($_GET['delete_carnet'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM carnet c join media m on c.cover = m.id WHERE c.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the Partner's image data.
                $stmtimg->execute([$_GET['delete_carnet']]);
                //fetch the Partner cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the carnet
                    $sql = "DELETE c, m FROM carnet c join media m on c.cover = m.id WHERE c.id = ?";
                } else {
                    //this is the default image, The query to delete just the partner
                    $sql = "DELETE FROM carnet WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The carnet.
                $stmt->execute([$_GET['delete_carnet']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'carnet deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update a carnet information

function update_carnet()
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
            

            $sql = "UPDATE `carnet` SET `title` = ?, `date` = ?, `file` = ?,`cover` = ? WHERE `carnet`.`id` = ?";
            $update_carnet = $pdo->prepare($sql);
            $update_carnet->execute([$_POST['title'], $_POST['date'], $_POST['file'], $cover_id, $_POST['carnet_id']]);
            if ($update_carnet) {
                set_message('success', 'carnet informations updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}











?>