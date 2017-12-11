$(function () {
    get_note();

    /* Get Page Data*/
    function get_note() {
        $.ajax({
            type: 'ajax',
            dataType: 'json',
            url: url + 'note/get_note',
        }).done(function (data) {
            manageRow(data);
        });
    }
    /* Add new Item table row */
    function manageRow(data) {
        var rows = '';
        $.each(data, function (key, value) {
            rows = rows + '<tr>';
            rows = rows + '<td>' + value.title + '</td>';
            rows = rows + '<td>' + value.description + '</td>';
            rows = rows + '<td data-id="' + value.id + '">';
            rows = rows + '<button data-toggle="modal" data-target="#editnote" class="btn btn-primary editnotecls">Edit</button> ';
            rows = rows + '<button class="btn btn-danger delete_note">Del</button>';
            rows = rows + '</td>';
            rows = rows + '</tr>';
            function markdone(getvalue) {
                alert(getvalue);
            }
        });

        $("tbody").html(rows);


    }
   

    /* Create Note*/
    $(".Create_Noteclass").click(function (e) {
        e.preventDefault();
        var form_action = $("#createnote").find("form").attr("action");
        var getTitle = $("#createnote").find("input[name='title']").val();
        var getDescription = $("#createnote").find("textarea[name='description']").val();

        if (getTitle != '' && getDescription != '') {
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: form_action,
                data: { getTitle,getDescription },
            }).done(function (getvalue4) {
                $("#createnote").find("input[name='title']").val('');
                $("#createnote").find("textarea[name='description']").val('');
                get_note();
                $(".modal").modal('hide');
                toastr.success('Note Successfully Added.', 'Success Alert', { timeOut: 5000 });
            });
        } else {
            alert('You are missing title or description.')
        }

    });

    /* Remove Item */
    $("body").on("click", ".delete_note", function () {
        var gid = $(this).parent("td").data('id');
        var clearline = $(this).parents("tr");
        $.ajax({
            type: 'POST',
            url: url + 'note/delete_note',
            data: { gid },
        }).done(function (data) {
            clearline.remove();
            toastr.success('Note Deleted Successfully.', 'Success Alert', { timeOut: 5000 });
            get_note();
        });

    });

    /* Edit Item */
    $("body").on("click", ".editnotecls", function () {

        var id = $(this).parent("td").data('id');
        var description = $(this).parent("td").prev("td").text();
        var title = $(this).parent("td").prev("td").prev("td").text();
        

        $("#editnote").find("input[name='title']").val(title);
        $("#editnote").find("textarea[name='description']").val(description);
        $("#editnote").find(".edit-id").val(id);

    });

    /* Updated new Item */
    $(".submitedit").click(function (ev) {
        ev.preventDefault();
        var form_action = $("#editnote").find("form").attr("action");
        var getTitle = $("#editnote").find("input[name='title']").val();
        var getDescription = $("#editnote").find("textarea[name='description']").val();
        var getId = $("#editnote").find(".edit-id").val();

        if (getTitle != '' && getDescription != '') {
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: form_action,
                data: { getTitle, getDescription, getId }
            }).done(function (data) {
                get_note();
                $(".modal").modal('hide');
                toastr.success('Note Changed.', 'Success Alert', { timeOut: 5000 });

            });
        } else {
            alert('You are missing title or description.')
        }
    });
});