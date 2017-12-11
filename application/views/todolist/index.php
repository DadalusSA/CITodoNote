<h2 class="todo-container text-center">Todo</h2>
<script src="<?php echo base_url(); ?>assets/java/item-ajax.js"></script>
<div class="container">
    <button class="btn-css btn btn-success" data-toggle="modal" data-target="#createtodo">Add Todo</button>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th width="320px">Todo</th>
                <th width="150px" class="text-center">Action</th>
            </tr>
              
        </thead>
        <tbody>
            
        </tbody>

    </table>

     <!-- Create Modal -->
        <div class="modal fade" id="createtodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Todo task</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                    </div>

                    <div class="modal-body">
                        <form data-toggle="validator" action="<?php echo base_url() ?>todolist/add_todolist" method="POST">

                            <div class="form-group">
                                <label class="control-label" for="Todo">Todo:</label>
                                <input type="text" name="Todo" class="form-control" data-error="Please enter name Todo." required />
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success Create_Todoclass">Add</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
</div>