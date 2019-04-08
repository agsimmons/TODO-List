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
                        <td>${task.due_date.substring(0, 10)}</td>
                        <td>${task.description}</td>
                        <td>${task.completed_date.substring(0, 10)}</td>
                    </tr>
                `;

                $tasks.append(html);
            });
        }
    });
}
