<?php


function display_testimonials(){
    global $pdo;
    try{
    $sql ="SELECT t.full_name, t.description, t.role, t.profile, m.file_location FROM testimonials t join media m on t.profile = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $testimonials){
        echo <<<testimonials
       <div class="item">
       <div class="testimonials__single">
           <div class="testimonials__inner">
               <div class="testimonials__image">
                   <img src="uploads/{$testimonials->file_location}" alt="{$testimonials->full_name}">
               </div><!-- /.testimonials__image -->
               <p>{$testimonials->description} </p>
               <h3>{$testimonials->full_name}</h3>
               <h4>{$testimonials->role}</h4>
           </div><!-- /.testimonials__inner -->
       </div><!-- /.testimonials__single -->
   </div><!-- /.item -->



testimonials;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}





// submit a testimonials to database admin area
function submit_testimonials(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $name = trim($_POST['full_name']);
        $description = trim($_POST['description']);
        $role = trim($_POST['role']);
        $file = $_FILES['profile']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('profile', $cover_id);
        $sql = "INSERT INTO `testimonials` (`id`, `full_name`, `description`, `role`, `profile`) VALUES (NULL, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $description, $role, $cover_id]);
        if($result){
            set_message('success','testimonials created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}


// Partner Management. display testimonials to be edited or deleted in admin area

function display_testimonials_admin()
{
    global $pdo;
    try{
        $sql = "SELECT t.*, m.file_name FROM testimonials t join media m on t.profile = m.id "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $testimonials){
        echo <<<testimonials
        <tr>
        <td class="text-center text-muted">{$testimonials->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$testimonials->file_name}" class="br-a" alt="testimonials thumbnail"></td>
        <td class=""> {$testimonials->full_name} </td>
        <td class=""> {$testimonials->description} </td>
        <td class=""> {$testimonials->role} </td>

        <td class="text-center">
            <a href="index.php?edit_testimonials={$testimonials->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_testimonials&delete_testimonials={$testimonials->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
testimonials;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}


// Delete a partner
function delete_testimonials()
{
    global $pdo;
    if (isset($_GET['delete_testimonials'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM testimonials t join media m on t.profile = m.id WHERE t.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the Partner's image data.
                $stmtimg->execute([$_GET['delete_testimonials']]);
                //fetch the Partner cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the partner
                    $sql = "DELETE t, m FROM testimonials t join media m on t.profile = m.id WHERE t.id = ?";
                } else {
                    //this is the default image, The query to delete just the partner
                    $sql = "DELETE FROM testimonials WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The partner.
                $stmt->execute([$_GET['delete_testimonials']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'testimonials deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update a testimonials information

function update_testimonials()
{
    global $pdo;
    if (isset($_POST['submit'])) {
        try {
          if(empty($_FILES['profile']['name'])){
            $cover_id = $_POST['cover_id'];
          }else{
            //**------  function for handling image upload-------*/
            upload_image('profile', $cover_id);
          }
            

            $sql = "UPDATE `testimonials` SET `full_name` = ?, `description` = ?, `role` = ?,`profile` = ? WHERE `testimonials`.`id` = ?";
            $update_testimonials = $pdo->prepare($sql);
            $update_testimonials->execute([$_POST['full_name'], $_POST['description'], $_POST['role'], $cover_id, $_POST['testimonials_id']]);
            if ($update_testimonials) {
                set_message('success', 'Testimonials informations updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}








?>