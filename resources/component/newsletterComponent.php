<?php


// Subsriber Management. display partners to be edited or deleted in admin area

function display_subscriber_admin()
{
    global $pdo;
    try{
        $sql = "SELECT n.* FROM news_lettre n ORDER BY n.id DESC"; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $newsletter){
            $reg = date("F jS, Y, g:i a", strtotime($newsletter->date));
        echo <<<newsletter
        <tr>
        <td class="text-center text-muted">{$newsletter->id}</td>
        <td class=""> <a href= "mailto:{$newsletter->subscriber_email}">{$newsletter->subscriber_email}</a> </td>
        <td class=""> {$reg} </td>
    </tr>
newsletter;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}

?>