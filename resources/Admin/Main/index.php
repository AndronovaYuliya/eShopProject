<!-- Start Signup -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <?php if (isset($errors)): ?>
                <div class="alert alert-danger">
                    <?php echo($errors); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/admin/login">
                <div class="form-group">
                    <label for="adminInputEmail">Email address</label>
                    <input type="text" name="adminEmail" class="form-control" id="adminInputEmail"
                           aria-describedby="emailHelp"
                           placeholder="Enter email" value="<?php echo isset($admin) ? $admin['email'] : '' ?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="form-group">
                    <label for="adminInputPassword">Password</label>
                    <input type="password" name="adminPassword" class="form-control" id="adminInputPassword"
                           placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="loginSubmit">Submit</button>
                <button type="submit" class="btn btn-primary" name="enterSubmit">Enter</button>
            </form>
        </div>
    </div>
</div>
<!--End Signup-->
