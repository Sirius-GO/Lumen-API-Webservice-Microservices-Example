<?php

$fetchAuthors = file_get_contents('http://localhost:8000/api/authors?api_token=Sczf7sz354cMlsrH5GwId6WMWdwTy4mhj5XL1MjSwohfKK5GsTp6HGgkzac9');

$decodedAuthors = json_decode($fetchAuthors, true);

foreach($decodedAuthors as $da){
    echo '<h1>' . $da['name'] . '</h1>';
};

?>