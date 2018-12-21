<!-- Start Modal -->
<div class="modal fade" id="letterModal" tabindex="-1" role="dialog" aria-labelledby="letterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="letterModalLabel">Sender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="letterInputName">Name</label>
                        <input type="name" class="form-control" id="letterInputName" aria-describedby="nameHelp" placeholder="James Bond">
                    </div>
                    <div class="form-group">
                        <label for="letterInputEmail">email</label>
                        <input type="email" class="form-control" id="letterInputEmail" placeholder="bond007@gmail.ru">
                    </div>
                    <button type="submit" name="btn-mail" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->
