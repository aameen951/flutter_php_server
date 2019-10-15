<?php

$connection = mysqli_connect("localhost", "root", "", "flutter_php");
if(!$connection)
{
  echo "Error";
  exit(1);
}

function db_query($query)
{
  global $connection;
  
  $result = mysqli_query($connection, $query);
  if(is_bool($result) && $result)
  {
    $data = true;
  }
  else if($result instanceof mysqli_result)
  {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
  }
  else
  {
    echo "Error: query failed $query";
    exit(1);
  }
  return $data;
}

function db_escape($data)
{
  global $connection;
  return mysqli_real_escape_string($connection, $data);
}
