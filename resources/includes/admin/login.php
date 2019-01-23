<!-- Start Signup -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <?php if (isset($_SESSION['errors'])):?>
                <div class="alert alert-danger">
                    <?php echo($_SESSION['errors']);?>
                </div>
            <?php endif;?>

            <form method="post" action="/admin/login">
                <div class="form-group">
                    <label for="adminInputEmail">Email address</label>
                    <input type="text" required name="adminEmail" class="form-control" id="adminInputEmail" aria-describedby="emailHelp"
                           placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="form-group">
                    <label for="adminInputPassword">Password</label>
                    <input type="password" required name="adminPassword" class="form-control" id="adminInputPassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<!--End Signup-->
