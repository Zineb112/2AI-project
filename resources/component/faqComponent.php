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


// FAQ's Management. display faq to be edited or deleted in admin area

function display_faq_admin()
{
    global $pdo;
    try{
        $sql = "SELECT f.* FROM faq f"; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $faq){
        echo <<<faq
        <tr>
        <td class="text-center"> {$faq->question} </td>

        <td class="text-center">
            <a href="index.php?edit_faq={$faq->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_faq&delete_faq={$faq->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
faq;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}

// Delete a partner
function delete_faq()
{
    global $pdo;
    if (isset($_GET['delete_faq'])) {
        //Exeption Handling
        try {
                $sql = "DELETE FROM faq WHERE id = ?";
                            $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The partner.
                $stmt->execute([$_GET['delete_faq']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'Question deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update a partner information

// function update_faq()
// {
//     global $pdo;
//     if (isset($_POST['submit'])) {
//         try {
//             $sql = "UPDATE `faq` SET `question` = ?, `reponse` = ? WHERE `faq`.`id` = ?";
//             $update_faq = $pdo->prepare($sql);
//             $update_faq->execute([$_POST['question'], [$_POST['reponse'], $_POST['faq_id']]);
//             if ($update_faq) {
//                 set_message('success', 'Question updated successfully');
//             } else {
//                 set_message('error', 'query failed try later');
//             }
//         } catch (PDOException $e) {
//             echo 'query failed' . $e->getMessage();
//         }
//     }
// }

?>