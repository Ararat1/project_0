<?php 

    $connect = @mysqli_connect('localhost', 'root', '', 'project_0');

    if( !$connect ) {
        die('Connecting error');
    }