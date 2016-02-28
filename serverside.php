<?php
    $db = mysql_connect("localhost", "root", "root");
    mysql_select_db("lviv_expert", $db);
 
    if(!isset($_GET['id'])) {
        $_GET['id'] = 1;
    }
 
    $act_news = mysql_fetch_array(mysql_query("SELECT * FROM articles WHERE title='{$_GET['id']}'", $db));
    echo $act_news['title'];
    echo "<p><h5>";
    echo $act_news['text'];
    echo "<p>";
    echo "<p><i>";
    echo $act_news['author'];
    echo "<p>";
    echo $act_news['date'];
    
/*  $arch_news = mysql_fetch_array(mysql_query("SELECT * FROM articles WHERE id='{$_GET['id2']}'", $db));
    echo $arch_news['title'];
    echo "<p><h5>";
    echo $arch_news['text'];
    echo "<p>";
    echo "<p><i>";
    echo $arch_news['author'];
    echo "<p>";
    echo $arch_news['date'];   
    */
?>