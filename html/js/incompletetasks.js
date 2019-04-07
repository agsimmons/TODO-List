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
                        <td>TODO</td>
                        <td>${task.due_date}</td>
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
