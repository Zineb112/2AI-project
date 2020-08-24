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
        $sql = "INSERT INTO `testimonials` (`id`, `full_name`, `description`, `role`, `profile`) VALUES (NULL, ?, ?, ?, ?, ?)";
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






?>