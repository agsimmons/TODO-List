$(function() {
    getIncompleteTasks();
});

function getIncompleteTasks() {

    var $tasks = $('#tasks');
    $tasks.empty();

    $.ajax({
        type: 'GET',
        url: '/php/ajax/get_incomplete_tasks.php',
        success: function(tasks) {
            $.each(tasks, function(i, task) {
                var html = `
                    <tr class="taskrow">
                        <td class="name">${task.name}</td>
                        <td class="tag">${task.tag}</td>
                        <td class="date">${task.due_date.substring(0, 10)}</td>
                        <td class="descrip">${task.description}</td>
                        <td>
                            <button class="btn btn-primary" onclick="editTaskForm(this.parentNode.parentNode, ${task.id})">Edit</button>
                            <button class="btn btn-primary" onclick="completeTask(${task.id})">Complete</button>
                            <button class="btn btn-primary" onclick="deleteTask(${task.id})">Delete</button>
                        </td>
                    </tr>
                `;

                $tasks.append(html);
            });
        }
    });
}

function deleteTask(id) {

    $.ajax({
        type: 'POST',
        url: '/php/ajax/delete_task.php',
        data: {
            task_id: id,
        },
        success: function(response) {
            getIncompleteTasks();
        }
    });

}

function completeTask(id) {

    $.ajax({
        type: 'POST',
        url: '/php/ajax/complete_task.php',
        data: {
            task_id: id,
        },
        success: function(response) {
            getIncompleteTasks();
        }
    });

}

function createTaskForm() {

    // Return if form already exists
    if ($('#task_entry').length != 0) {
        return;
    }

    var $tasks = $('#tasks');
    var html = `
        <tr>
            <form id="task_entry" method="POST" action="/php/ajax/add_task.php"></form>
            <td>
                <div class="form-group">
                    <input class="form-control" form="task_entry" type="text" placeholder="Task Name" name="task_name" required>
                </div>
            </td>

            <td>
                <div class="form-group">
                    <input class="form-control" form="task_entry" type="text" placeholder="Tag" name="task_tag">
                </div>
            </td>

            <td>
                <div class="form-group">
                    <input form="task_entry" class="form-control" type="date" name="task_due_date" required>
                </div>
            </td>

            <td>
                <div class="form-group">
                    <input form="task_entry" class="form-control" type="text" placeholder="Task Description" name="task_description">
                </div>
            </td>

            <td>
                <button form="task_entry" type="submit" class="btn btn-primary">Create Task</button>
            </td>
        </tr>
    `

    $tasks.append(html);
}

function editTaskForm(task, id) {
  var $tasks = $('#tasks');

  var taskName = task.querySelector(".name").innerHTML;
  var taskTag = task.querySelector(".tag").innerHTML;
  var taskDate = task.querySelector(".date").innerHTML;
  var taskDescrip = task.querySelector(".descrip").innerHTML;

  task.remove();

  var html = `
      <tr>
          <form id="task_entry" method="POST" action="/php/ajax/edit_task.php">
            <input form="task_entry" type="hidden" name="task_id" value=${id} />
          </form>
          <td>
              <div class="form-group">
                  <input class="form-control" form="task_entry" type="text" name="task_name" value="${taskName}" required>
              </div>
          </td>

          <td>
              <div class="form-group">
                  <input class="form-control" form="task_entry" type="text" name="task_tag" value="${taskTag}" required>
              </div>
          </td>

          <td>
              <div class="form-group">
                  <input form="task_entry" class="form-control" type="date" name="task_due_date" value="${taskDate}">
              </div>
          </td>

          <td>
              <div class="form-group">
                  <input form="task_entry" class="form-control" type="text" name="task_description" value="${taskDescrip}">
              </div>
          </td>

          <td>
              <button form="task_entry" type="submit" class="btn btn-primary">Save</button>
              <button form="task_entry" onclick="getIncompleteTasks()" class="btn btn-primary">Cancel</button>
          </td>
      </tr>
  `
  $tasks.prepend(html);
}
