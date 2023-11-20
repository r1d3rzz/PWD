<?php

function dbConnect()
{
    return new PDO("mysql:dbhost=localhost;dbname=project", "root", "");
}
