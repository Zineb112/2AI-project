<?php
function display_team(){
    global $pdo;
    try{
    $sql ="SELECT t.full_name, t.role, t.avatar,t.linkedin, t.facebook, t.instagram, m.file_location FROM team t join media m on t.avatar = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $team){
        echo <<<team
        <div class="col-lg-3 col-md-6 no-padding">
            <div class="team-wrap v3">
            <div class="team-thumb">
                <img src="uploads/{$team->file_location}" alt="{$team->full_name}">                                 
                <div class="team-social flex-middle">
                    <div>
                        <a rel="nofollow" href="{$team->facebook}" target="_blank" class="twitter"><i class="fab fa-facebook"></i></a>
                        <a rel="nofollow" href="{$team->linkedin}" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a rel="nofollow" href="{$team->instagram}m" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>  
            </div>
            <div class="team-info">
                <h4>{$team->full_name}</h4>
                <span>{$team->role}</span>
            </div>
        </div>
        </div>
team;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


function display_team_about(){
    global $pdo;
    try{
        $sql ="SELECT t.full_name, t.role, t.avatar,t.linkedin, t.facebook, t.instagram, m.file_location FROM team t join media m on t.avatar = m.id LIMIT 4";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $team){
        echo <<<team
        <div class="col-lg-3 col-md-6 no-padding">
        <div class="team-wrap v3">
        <div class="team-thumb">
            <img src="uploads/{$team->file_location}" alt="{$team->full_name}">                                 
            <div class="team-social flex-middle">
                <div>
                    <a rel="nofollow" href="{$team->facebook}" target="_blank" class="twitter"><i class="fab fa-facebook"></i></a>
                    <a rel="nofollow" href="{$team->linkedin}" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                    <a rel="nofollow" href="{$team->instagram}m" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>  
        </div>
        <div class="team-info">
            <h4>{$team->full_name}</h4>
            <span>{$team->role}</span>
        </div>
    </div>
    </div>        
team;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


// submit a team  to database admin area
function submit_team(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $name = trim($_POST['full_name']);
        $role = trim($_POST['role']);
        $linkedin = trim($_POST['linkedin']);
        $facebook= trim($_POST['facebook']);
        $instagram = trim($_POST['instagram']);
        $file = $_FILES['avatar']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('avatar', $cover_id);
        $sql = "INSERT INTO `team` (`id`, `full_name`, `role`, `avatar`, `linkedin`, `facebook`, `instagram`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $role, $cover_id, $linkedin, $facebook, $instagram, ]);
        if($result){
            set_message('success','Team created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}



//Team Management. display team  to be edited or deleted in admin area

function display_team_admin()
{
    global $pdo;
    try{
        $sql = "SELECT t.*, m.file_name FROM team t join media m on t.avatar = m.id "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $team){
        echo <<<team
        <tr>
        <td class="text-center"><img src="../uploads/thumbnails/{$team->file_name}" class="br-a" alt="team thumbnail"></td>
        <td class="text-center"> {$team->full_name} </td>
        <td class="text-center"> {$team->role} </td>

        <td class="text-center">
            <a href="index.php?edit_team={$team->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_team&delete_team={$team->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
team;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}


// Delete a team
function delete_team()
{
    global $pdo;
    if (isset($_GET['delete_team'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM team t join media m on t.avatar = m.id WHERE t.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the team's image data.
                $stmtimg->execute([$_GET['delete_team']]);
                //fetch the team  cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the team
                    $sql = "DELETE t, m FROM team t join media m on t.avatar = m.id WHERE t.id = ?";
                } else {
                    //this is the default image, The query to delete just the team
                    $sql = "DELETE FROM team WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The team.
                $stmt->execute([$_GET['delete_team']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'Team deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}

// Update a team information

function update_team()
{
    global $pdo;
    if (isset($_POST['submit'])) {
        try {
          if(empty($_FILES['avatar']['name'])){
            $cover_id = $_POST['cover_id'];
          }else{
            //**------  function for handling image upload-------*/
            upload_image('avatar', $cover_id);
          }
            

            $sql = "UPDATE `team` SET `full_name` = ?,`role` = ?, `avatar` = ?, `linkedin` = ?,  `facebook` = ?, `instagram`  = ? WHERE `team`.`id` = ?";
            $update_team = $pdo->prepare($sql);
            $update_team->execute([$_POST['full_name'], $_POST['role'], $cover_id ,$_POST['linkedin'],  $_POST['facebook'], $_POST['instagram'], $_POST['team_id']]);
            if ($update_team) {
                set_message('success', 'Team  member updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}
?>