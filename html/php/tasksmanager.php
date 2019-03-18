<?php
//$server_name = "localhost"; // change to the actual server name
//$username ="username"; // change to the actual username once configured
//$password = "password"; // change to the actual password once configured
//$dbname = "ourDB"; // change to the actual DB name once configured

// create connection
//TODO
// check connection
//TODO

$window = new DOMDocument('5.0'); // create new DOM with version num
$table = $window->createElement('table');
$table_id = $window->createAttribute('id');
$table_id->value = 'task_table';

$table->appendChild('table_id');
$window->appendChild($table);
//createTable();
//echo $window->saveHTML(); // output the new HTML

// function createTable() {
//   $table = $window->createElement('table');
//   $table_id = $window->createAttribute('id');
//   $table_id->value = 'my_table';
// }

function addTask() {
  // THIS CODE WILL CHANGE TO SQL QUERY ONCE MARIADB IS CONFIGURED
  $tr = $window->createElement('tr');
  $table->appendChild($tr);

  // new cell for task_name
  $taskname = $window->createElement('td', 'New Task');
  $taskname_id = $window->createAttribute('id');
  $taskname_id->value = 'task_name';
  $tr->appendChild($taskname);

  // new cell for tags
  $tags = $window->createElement('td', 'Add Tags');
  $tags_id = $window->createAttribute('id');
  $tags_id->value= 'tags';
  $tr->appendChild($tags);

  // new cell for due_date
  $duedate = $window->createElement('td', 'Add Due Date');
  $duedate_id = $window->createAttribute('id');
  $duedate_id->value = 'due_date';
  $tr->appendChild($duedate);

  // new cell for descrip
  $descrip = $window->createElement('td', 'Add Description');
  $descrip_id = $window->createAttribute('id');
  $descrip_id->value = 'descrip';
  $tr->appendChild($descrip);
}

function deleteTask() {

}

function editTask() {

}

function completeTask() {

}
?>
