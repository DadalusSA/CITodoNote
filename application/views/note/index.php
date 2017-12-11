
<h2 class="note-container text-center">Note</h2>
<script src="<?php echo base_url(); ?>assets/java/note-ajax.js"></script>
<div class="container">
    
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createnote">
            Add Note
        </button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th width="320px" class="text-center">Description</th>
                    <th width="50px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <!-- Create -->
        <div class="modal fade" id="createnote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    	<h3 class="modal-title" id="myModalLabel">Add Note</h3>
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form data-toggle="validator" action="<?php echo base_url() ?>note/add_note" method="POST">

                            <div class="form-group">
                                <label class="control-label" for="title">Title:</label>
                                <input type="text" name="title" class="form-control" data-error="Please enter title." required />
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="title">Description:</label>
                                <textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success Create_Noteclass">Add</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        <!-- Edit -->
        <div class="modal fade" id="editnote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Edit Note</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        
                    </div>

                    <div class="modal-body">
                        <form data-toggle="validator" action="<?php echo base_url() ?>note/edit_note" method="put">
                            <input type="hidden" name="id" class="edit-id">

                            <div class="form-group">
                                <label class="control-label" for="title">Title:</label>
                                <input type="text" name="title" class="form-control" data-error="Please enter title." required />
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="title">Description:</label>
                                <textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success submitedit">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>