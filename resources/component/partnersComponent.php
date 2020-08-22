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



?>