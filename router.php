<?php

$in_data = json_decode($_GET['data'], true);

if($in_data['command'] === "add_item")
{
  $result = add_item($in_data);
}
else if($in_data['command'] === "get_items")
{
  $result = get_items($in_data);
}
else if($in_data['command'] === "delete_item")
{
  $result = delete_item($in_data);
}
else
{
  echo "Error: unknown command";
  exit(1);
}

header('Content-Type: application/json');
echo json_encode($result);
