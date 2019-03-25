// JavaScript file for TODO List

// addTask inserts a new row to the bottom of task_table and creates four cells for a new task
function addTask() {
  var taskTable = document.getElementById("task_table");
  // insert new row to bottom of the table
  var newTask = taskTable.insertRow(-1);
  // Makes the added row editable
  newTask.contentEditable = "true";
  //newTask.contentEditable = "true"; // works for the row, but editCell should be used when written
  // insert cells ("td") into the new row
  var taskName = newTask.insertCell(0).innerHTML = "New task";
  var tags = newTask.insertCell(1).innerHTML = "Test";
  var dueDate = newTask.insertCell(2).innerHTML = "2019-03-19";
  var descrip = newTask.insertCell(3).innerHTML = "Write your description here";
  var buttons = newTask.insertCell(4);

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
