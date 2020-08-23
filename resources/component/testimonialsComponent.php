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












?>