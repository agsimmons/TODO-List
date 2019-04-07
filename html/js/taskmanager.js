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
