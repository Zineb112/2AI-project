<?php 


function display_faq(){
    global $pdo;
    try{
    $sql ="SELECT f.* FROM faq f";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $faq){
        echo <<<faq
    <div class="acc-item">
    <span class="acc-toggle">{$faq->question} 
        <i class="down flaticon-download-arrow"></i><i class="up flaticon-up-arrow"></i>
    </span>
    <div class="acc-content">
    <p>{$faq->response}</p>
    </div>
</div>
faq;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}



// submit a partner to database admin area
function submit_faq(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $question = trim($_POST['question']);
        $response = trim($_POST['response']);

        //**------  function for handling image upload-------*/
        $sql = "INSERT INTO `faq` (`id`, `question`, `response`) VALUES (NULL, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$question, $response]);
        if($result){
            set_message('success','FAQ created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}


// Partner Management. display partners to be edited or deleted in admin area

// function display_partners_admin()
// {
//     global $pdo;
//     try{
//         $sql = "SELECT p.*, m.file_name FROM partners p join media m on p.partner_logo = m.id "; 
//         $stmt = $pdo->query($sql)->fetchAll();
//         foreach ($stmt as $partner){
//         echo <<<partner
//         <tr>
//         <td class="text-center"><img src="../uploads/thumbnails/{$partner->file_name}" class="br-a" alt="partner thumbnail"></td>
//         <td class="text-center"> {$partner->partner_name} </td>

//         <td class="text-center">
//             <a href="index.php?edit_partner={$partner->id}">
//             <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
//                 <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
//             </button>
//             </a>
//             <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_partner&delete_partner={$partner->id}" data-toggle="modal" data-target="#exampleModal">
//                 <i class="pe-7s-trash" style="font-size: 1rem;"></i>
//             </button>
//         </td>
//     </tr>
// partner;
//     }
// } catch (PDOException $e) {
//     echo 'query failed' . $e->getMessage();
// }
// }

// // Delete a partner
// function delete_partner()
// {
//     global $pdo;
//     if (isset($_GET['delete_partner'])) {
//         //Exeption Handling
//         try {
//             //The SQL statement.
//             $sqlimg = "SELECT m.id, m.file_name FROM partners p join media m on p.partner_logo = m.id WHERE p.id = ?";
//                 //Prepare our SELECT SQL statement.
//                 $stmtimg = $pdo->prepare($sqlimg);
//                 //Execute the statement GET the Partner's image data.
//                 $stmtimg->execute([$_GET['delete_partner']]);
//                 //fetch the Partner cover data.
//                 $img = $stmtimg->fetch();
//                 //Check if it's the default image, we don't want to delete the default image.
//                 if ($img->id !== '1') {
//                     //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
//                     !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
//                     //this is not the default image, Now we are going to delete the actual image from the uploads folder.
//                     !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
//                     //this is not the default image, The query to delete both the image and the partner
//                     $sql = "DELETE p, m FROM partners p join media m on p.partner_logo = m.id WHERE p.id = ?";
//                 } else {
//                     //this is the default image, The query to delete just the partner
//                     $sql = "DELETE FROM partners WHERE id = ?";
//                 }
//                             //Prepare our DELETE SQL statement.
//                 $stmt = $pdo->prepare($sql);
//                 //Execute the statement DELETE The partner.
//                 $stmt->execute([$_GET['delete_partner']]);
//                 //display toastr notification, event deleted successfully
//                 set_message('success', 'Partner deleted successfully');
// }catch (PDOException $e) {
//     echo 'query failed' . $e->getMessage();
// }
// }
// }


// // Update a partner information

// function update_partner()
// {
//     global $pdo;
//     if (isset($_POST['submit'])) {
//         try {
//           if(empty($_FILES['partner_logo']['name'])){
//             $cover_id = $_POST['cover_id'];
//           }else{
//             //**------  function for handling image upload-------*/
//             upload_image('partner_logo', $cover_id);
//           }
            

//             $sql = "UPDATE `partners` SET `partner_name` = ?, `partner_logo` = ? WHERE `partners`.`id` = ?";
//             $update_partner = $pdo->prepare($sql);
//             $update_partner->execute([$_POST['partner_name'], $cover_id, $_POST['partner_id']]);
//             if ($update_partner) {
//                 set_message('success', 'Partner updated successfully');
//             } else {
//                 set_message('error', 'query failed try later');
//             }
//         } catch (PDOException $e) {
//             echo 'query failed' . $e->getMessage();
//         }
//     }
// }

?>