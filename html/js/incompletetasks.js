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
                    <tr>
                        <td>${task.name}</td>
                        <td>${task.due_date.substring(0, 10)}</td>
                        <td>${task.description}</td>
                        <td>
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
                    <input form="task_entry" class="form-control" type="date" name="task_due_date">
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
