<?php

function display_portail(){
    global $pdo;
    try{
    $sql ="SELECT p.full_name, p.link, p.cover,p.role, p.title FROM portail p join media m on p.cover = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $team){
        echo <<<portail
       <div class="team-one__single" data-aos="flip-down" data-aos-duration="1500">
                    <div class="team-one__image">
                        <img src="uploads/{$team->file_location}" alt="{$team->full_name}" >
                        <div class="team-one__social">
                            <a href="{$team->linkedin}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{$team->twitter}"><i class="fab fa-twitter"></i></a>
                            <a href="{$team->gmail}"><i class="fab fa-dribbble"></i></a>
                            <a href="{$team->instagram}"><i class="fab fa-behance"></i></a>
                        </div><!-- /.team-one__social -->
                    </div><!-- /.team-one__image -->
                    <div class="team-one__content">
                        <div class="team-one__content-text">
                            <h3><a href="#">{$team->full_name}</a></h3>
                            <p>{$team->role}</p>
                        </div><!-- /.team-one__content-text -->
                    </div><!-- /.team-one__content -->
            </div><!-- /.team-one__single -->
portail;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


?>