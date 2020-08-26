<?php 


function display_carnet(){
    global $pdo;
    try{
    $sql ="SELECT c.title, c.date, c.file, c.cover, m.file_location FROM carnet c join media m on c.cover = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $carnet){
        echo <<<carnet
        <div class="carnet-inv__wrapper">
        <div class="carnetN__carnet margincarn" data-aos="flip-down" data-aos-duration="1000">
            <img src="uploads/{$carnet->file_location}" alt="">
            <div class="carnetN__infos">
                <h3 class="carnetN__infos--date">{$carnet->date}</h3>
                <h5 class="carnetN__infos--title"> <span>Titre: </span> {$carnet->title} </h5>
                <a href="{$carnet->file}" class="carnetN__download">{$carnet->file}</a>
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

function display_carnet_portailInnov(){
    global $pdo;
    try{
    $sql ="SELECT c.title, c.date, c.file, c.cover, m.file_location FROM carnet c join media m on c.cover = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $carnet_portailInnov){
        echo <<<carnet_portailInnov
        <div class="carnetN__right" data-aos="flip-down" data-aos-duration="1000">
        <div class="carnetN__carnet">
            <img src="uploads/{$carnet_portailInnov->file_location}" alt="">
            <div class="carnetN__infos">
                <h3 class="carnetN__infos--date">{$carnet_portailInnov->date}</h3>
                <h5 class="carnetN__infos--title"> <span>Titre: </span>{$carnet_portailInnov->title} </h5>
                <a href="{$carnet_portailInnov->file}" class="carnetN__download">{$carnet_portailInnov->file}</a>
            </div>
        </div>
    </div>



carnet_portailInnov;
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


// Partner Management. display testimonials to be edited or deleted in admin area

function display_carnet_admin()
{
    global $pdo;
    try{
        $sql = "SELECT c.*, m.file_name FROM carnet c join media m on c.cover = m.id "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $carnet){
        echo <<<carnet
        <tr>
        <td class="text-center text-muted">{$carnet->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$carnet->file_name}" class="br-a" alt="carnet thumbnail"></td>
        <td class=""> {$carnet->file} </td>
        <td class=""> {$carnet->date} </td>
        <td class=""> {$carnet->title} </td>

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
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}










?>