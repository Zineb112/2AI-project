<?php 


function display_carnet(){
    global $pdo;
    try{
    $sql ="SELECT c.title, c.date, c.file, m.file_name FROM carnet c join media m on c.file = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $carnet){
        echo <<<carnet

       <div class="carnet-inv__wrapper">
       <div class="carnetN__carnet margincarn" data-aos="flip-down" data-aos-duration="1000">
           <img src="uploads/{$carnet->file_name}" alt="">
           <div class="carnetN__infos">
               <h3 class="carnetN__infos--date">{$carnet->date}</h3>
               <h5 class="carnetN__infos--title"> <span>Titre: </span> {$carnet->title} </h5>
               <a href="" class="carnetN__download">Télécharger</a>
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









?>