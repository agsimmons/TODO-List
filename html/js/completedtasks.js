$(function() {
    getCompletedTasks();
});

function getCompletedTasks() {

    var $tasks = $('#tasks');
    $tasks.empty();

    $.ajax({
        type: 'GET',
        url: '/php/ajax/get_completed_tasks.php',
        success: function(tasks) {
            $.each(tasks, function(i, task) {
                var html = `
                    <tr>
                        <td>${task.name}</td>
                        <td>TODO</td>
                        <td>${task.due_date}</td>
                        <td>${task.description}</td>
                        <td>
                            TODO
                        </td>
                    </tr>
                `;

                $tasks.append(html);
            });
        }
    });
}
