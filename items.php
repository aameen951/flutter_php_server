<?php

function add_item($in_data)
{
  $name = db_escape($in_data['name']);
  db_query("INSERT INTO items (name) VALUES ('$name');");
  return "OK";
}
function get_items($in_data)
{
  return db_query("SELECT * FROM items;");
}
function delete_item($in_data)
{
  $id = db_escape($in_data['id']);
  $item = db_query("SELECT * FROM items WHERE id = '$id';");
  if(count($item))
  {
    db_query("DELETE FROM items WHERE id = '$id';");
    return true;
  }
  return false;
}