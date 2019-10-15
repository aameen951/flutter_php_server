<?php

$connection = mysqli_connect("localhost", "root", "", "flutter_php");
if(!$connection)
{
  echo "Error";
  exit(1);
}



$in_data = json_decode($_GET['data'], true);
if($in_data['command'] === "add_item")
{
  $name = mysqli_real_escape_string($connection, $in_data['name']);
  $result = mysqli_query($connection, "INSERT INTO items (name) VALUES ('$name');");
  echo "OK";
}
else if($in_data['command'] === "get_items")
{
  $result = mysqli_query($connection, "SELECT * FROM items;");
  if($result)
  {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);
  }
}