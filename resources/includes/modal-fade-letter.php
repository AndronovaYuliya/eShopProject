<!-- Start Modal -->
<div class="modal fade" id="letterModal" tabindex="-1" role="dialog" aria-labelledby="letterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="letterModalLabel">Subscribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/sender/letter">
                    <div class="form-group">
                        <label for="letterInputName">Name</label>
                        <input type="text" required class="form-control" id="letterInputName" aria-describedby="nameHelp" name="name" placeholder="James Bond">
                    </div>
                    <div class="form-group">
                        <label for="letterInputEmail">email</label>
                        <input type="email" required class="form-control" id="letterInputEmail" name="email" placeholder="james@bond.com">
                    </div>
                    <button type="submit" name="subscribe" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->
