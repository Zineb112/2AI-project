<?php 


function display_partner(){
    global $pdo;
    try{
    $sql ="SELECT p.partner_name, p.partner_logo, p.partner_link, m.file_name FROM partners p join media m on p.partner_logo = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $partners){
        echo <<<partners
        <li class="partners__item">
        <a href="{$partners->partner_link}" target ="_blank">
        <img src="uploads/{$partners->file_name}" alt="{$partners->partner_name}" class="partners__img">
        </a>  
       </li>
partners;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}



// submit a partner to database admin area
function submit_partner(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $name = trim($_POST['partner_name']);
        $name = trim($_POST['partner_link']);
        $file = $_FILES['partner_logo']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('partner_logo', $cover_id);
        $sql = "INSERT INTO `partners` (`id`, `partner_name`, `partner_logo`, `partner_link`) VALUES (NULL, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $cover_id, $link]);
        if($result){
            set_message('success','Partner created successfully');
            
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

function display_partners_admin()
{
    global $pdo;
    try{
        $sql = "SELECT p.*, m.file_name FROM partners p join media m on p.partner_logo = m.id "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $partner){
        echo <<<partner
        <tr>
        <td class="text-center text-muted">{$partner->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$partner->file_name}" class="br-a" alt="partner thumbnail"></td>
        <td class=""> {$partner->partner_name} </td>
        <td class=""> {$partner->partner_link} </td>

        <td class="text-center">
            <a href="index.php?edit_partner={$partner->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_partner&delete_partner={$partner->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
partner;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}

?>