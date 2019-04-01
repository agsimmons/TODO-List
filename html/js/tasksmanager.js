// JavaScript file for TODO List

// addTask inserts a new row to the bottom of task_table and creates four cells for a new task
function addTask() {
  var taskTable = document.getElementById("task_table");
  // insert new row to bottom of the table
  taskTable.insertRow(-1).innerHTML = '<tr id="next_row"><td id="name_td"><textarea name="Name" placeholder="New task" id="name"></textarea></td>' +
                                          '<td id="tag_td"><textarea name="tag" placeholder="Enter tags" id="tag"></textarea></td>' +
                                          '<td id="date_td"><textarea name="Date" placeholder="Current Time" id="due_date"></textarea></td>' +
                                          '<td id="description_td"><textarea name="Description" placeholder="Enter description here" id="description"></textarea></td>' +
                                          '<td id="buttons"><button class="btn btn-primary" onclick="createTask()">Create</button></td></tr>';
}

// createTask has the user fill in the empty text areas generated from addTask
function createTask() {
  var nameCell = document.getElementById("name_td");
  var tagcCell = document.getElementById("tag_td");
  var dateCell = document.getElementById("date_td");
  var descripCell = document.getElementById("description_td");

  var nameText = document.getElementById("name");
  var tagText = document.getElementById("tag");
  var dateText = document.getElementById("due_date");
  var descripText = document.getElementById("description");

  if (nameText.value == "" || dateText.value == "" || descripText.value == "") {
    alert("Please fill in all fields.");
  } else {
    nameCell.innerHTML = nameText.value;
    dateCell.innerHTML = dateText.value;
    descripCell.innerHTML = descripText.value;

    var buttons = document.getElementById("next_row");
    document.getElementById("buttons").innerHTML = createButton("Complete", buttons);
    // createButton("Complete", buttons);
    // createButton("Delete", buttons);
  }

  //createButton("Complete", buttons);
  var btnC = document.createElement('button');
  btnC.innerHTML = "Complete";
  btnC.id = "cc";
  btnC.className = "btn btn-primary";
  buttons.appendChild(btnC);
  document.getElementById("cc").addEventListener("click", CR);
  function CR(){
  document.getElementById("task_table").deleteRow(-1);
  };

//createButton("Delete", buttons);
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
  //TODO: copy the row to complete_table in completedtasks.html
  deleteTask(row);
}

// createButton creates a button element and applies the class name and provided text
// appends the button to the provided parent
function createButton(buttonText, parent) {
  var button = document.createElement("button");
  button.className = "btn btn-primary";
  button.innerHTML = buttonText;
  //TODO: give the created buttons functionality(completeTask, deleteTask)
  parent.appendChild(button);
}
