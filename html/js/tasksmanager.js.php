// JavaScript file for TODO List

// addTask inserts a new row to the bottom of task_table and creates four cells for a new task
function addTask() {
  var taskTable = document.getElementById("task_table");
  // insert new row to bottom of the table
  taskTable.insertRow(-1).innerHTML = '<tr id="next_row"><td id="name_td"><textarea name="name" placeholder="New task" id="name"></textarea></td>' +
                                          '<td id="tag_td"><p id="tag">New Tag</p></td>' +
                                          '<td id="date_td"><textarea name="date" placeholder="Current Time" id="due_date"></textarea></td>' +
                                          '<td id="description_td"><textarea name="description" placeholder="Enter description here" id="description"></textarea></td>' +
                                          '<td id="buttons"><button class="btn btn-primary" id="create_btn" onclick="createTask()">Create</button></td></tr>';
}

// createTask has the user fill in the empty text areas generated from addTask
function createTask() {
  var nameCell = document.getElementById("name_td");
  var dateCell = document.getElementById("date_td");
  var descripCell = document.getElementById("description_td");

  var nameText = document.getElementById("name");
  var dateText = document.getElementById("due_date");
  var descripText = document.getElementById("description");

  if (nameText.value == "" || dateText.value == "" || descripText.value == "") {
    alert("Please fill in all fields.");
  } else {
    nameCell.innerHTML = nameText.value;
    dateCell.innerHTML = dateText.value;
    descripCell.innerHTML = descripText.value;
    //document.getElementById("buttons").innerHTML = createButton("Complete", buttons);

    var buttons = document.getElementById("buttons");
    var createBtn = document.getElementById("create_btn");
    createBtn.parentNode.removeChild(createBtn);

    // create Complete button
    var btnC = document.createElement('button');
    btnC.innerHTML = "Complete";
    btnC.id = "cc";
    btnC.className = "btn btn-primary";
    buttons.appendChild(btnC);
    document.getElementById("cc").addEventListener("click", CR);
    function CR(){
      completeTask(document.getElementById("next_row"));
    document.getElementById("task_table").deleteRow(-1);
    };

  // create Delete Button
    var btnD = document.createElement('button');
    btnD.innerHTML = "Delete";
    btnD.id = "dd";
    btnD.className = "btn btn-primary";
    buttons.appendChild(btnD);

    document.getElementById("dd").addEventListener("click", DR);
    function DR(){
    document.getElementById("task_table").deleteRow(-1);
    };

  }
}

// editTask allows a user to edit a cell when clicked in task_table
function editCell() {
  //TODO: edit a cell when clicked
}

// deleteTask removes a row from task_table
function deleteTask(row) {
  var index = row.parentNode.parentNode.rowIndex;
  document.getElementById("task_table").deleteRow(index);
}

// completeTask copies the row to complete_table and removes the row from task_table
function completeTask(row) {
  <?php
    $mysql_host = "localhost";
    $mysql_user = "todouser";
    $mysql_pass = "todouserpassword";
    $mysql_db = "todo";

    // Create connection to database
    $conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

    // fix this, currently changes ALL tasks to completed
    //$query = "UPDATE task SET completed=1";
    $result = $conn->query($query);

    if ($result) {
      deleteTask(row);
    }
    mysqli_close($conn);
  ?>
  var newWindow = window.open("http://127.0.0.1:8080/completedtasks.php");
  newWindow.body.innerHTML = window.document.getElementById(row).innerHTML;
}
