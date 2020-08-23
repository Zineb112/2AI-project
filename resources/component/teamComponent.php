<?php
function display_team(){
    global $pdo;
    try{
    $sql ="SELECT t.full_name, t.role, t.avatar,t.linkedin, t.gmail, t.twitter, t.instagram, m.file_location FROM team t join media m on t.avatar = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $team){
        echo <<<team
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
    $sql ="SELECT t.full_name, t.role, t.avatar,t.linkedin, t.gmail, t.twitter, t.instagram, m.file_location FROM team t join media m on t.avatar = m.id";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $team){
        echo <<<team

        <div class="team-box">
                    <div class="image">
                        <img src="uploads/{$team->file_location}" alt="team">

                        <div class="social">
                            <a href=""{$team->linkedin}"" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="{$team->twitter}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{$team->twitter}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="{$team->instagram}" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>

                    <div class="content">
                        <h3>{$team->full_name}</h3>
                        <span>{$team->role}</span>
                    </div>
            </div>
      
                   
team;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}











?>