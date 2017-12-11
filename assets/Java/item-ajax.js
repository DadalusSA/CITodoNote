$(function () {
    get_todolist();

    /* Get Page Data*/
    function get_todolist() {
        $.ajax({
            type: 'ajax',
            dataType: 'json',
            url: url + 'todolist/get_todolist',
        }).done(function (data) {
            manageRow(data);
        });
    }

    function manageRow(data) {
        var rows = '';
        var checkedverify= "checked";
        $.each(data, function (key, value) {
            var newchecked = value.checked;
            rows = rows + '<tr>';
            rows = rows + '<td>' + value.todo_list + '</td>';
            rows = rows + '<td data-id="' + value.id + '">';
            if (newchecked == 1)
                {
                rows = rows + '<input type="checkbox" style="width:21px;height: 21px;" class="getcheck" id="'
                 + value.id + '"' + checkedverify + ' />&nbsp&nbsp';
            }
            else
            {
                rows = rows + '<input type="checkbox" style="width:21px;height: 21px;" class="getcheck" id="'
                 + value.id + '" />&nbsp&nbsp';
            }
            rows = rows + '<button class="btn btn-danger delete_todo" style="margin-bottom:10px">Del</button>';
            rows = rows + '</td>';
            rows = rows + '</tr>';
             function markdone(getvalue) {
                alert(getvalue);
            }
        });

        $("tbody").html(rows);
        
        
    }
    
     $("body").on("click", ".getcheck", function () {
        var gid = $(this).parent("td").data('id');
        var ischecked = $(this).is(":checked");
            
            if (ischecked) {
                $.ajax({
                    type: 'POST',
                    url: url +'todolist/update_checklist',
                    data: { gid },
                }).done(function (getdata) {
                    alert("Added")
                });
            }
           
        if (!ischecked) {
            $.ajax({
                type: 'POST',
                url: url + 'todolist/update_checklistcancel',
                data: { gid },
            }).done(function (getdata2) {
                alert("Deleted")
            });
        }
    });

        //create todo
      $(".Create_Todoclass").click(function (e) {
            e.preventDefault();
            var form_action = $("#createtodo").find("form").attr("action");
            var getTodo = $("#createtodo").find("input[name='Todo']").val();

            if (getTodo != '') {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: form_action,
                    data: {getTodo},
                }).done(function (data) {
                    $("#createtodo").find("input[name='Todo']").val('');
                    get_todolist();
                    $(".modal").modal('hide');
                    toastr.success('Todo Created Successfully.', 'Success Alert', { timeOut: 5000 });
                });
            } else {
                alert('You are missing title or description.')
            }
        });
             /* Remove Item */
        $("body").on("click", ".delete_todo", function () {
            var gid = $(this).parent("td").data('id');
            var clearline= $(this).parents("tr");
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url + 'todolist/delete_todolist',
                data: { gid },
            }).done(function (data) {
                clearline.remove();
                toastr.success('Todo Deleted Successfully.', 'Success Alert', { timeOut: 5000 });
                get_todolist();
            });

        });

        
});

   