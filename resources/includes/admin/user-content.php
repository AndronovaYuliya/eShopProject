<div class="content">
    <div class="container-fluid">
        <ul class="nav nav-tabs">
            <li class="nav-item active">
                <a href="#view" class="nav-link" aria-controls="view" role="tab" data-toggle="tab">User</a>
            </li>
            <li class="nav-item">
                <a href="#add" class="nav-link" aria-controls="add" role="tab" data-toggle="tab">Add</a>
            </li>
            <li class="nav-item">
                <a href="#edit" class="nav-link" aria-controls="edit" role="tab" data-toggle="tab">Edit</a>
            </li>
            <li class="nav-item">
                <a href="#delete" class="nav-link disabled" aria-controls="delete" role="tab"
                   data-toggle="tab">Delete</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="view">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo $_SESSION['user']['role'] ?></h4>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <h4 class="title"><?php echo $_SESSION['user']["first_name"] . ' ' . $_SESSION['user']['last_name'] ?>
                                        <br/>
                                        <small><?php echo $_SESSION['user']["login"] ?></small>
                                    </h4>
                                </div>
                                <p class="description text-left"><?php echo $_SESSION['user']["email"] ?></p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="add">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add User</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="/admin/signup">
                                    <div class="row">

                                        <?php if (isset($data["errors"])): ?>
                                            <div class="alert alert-danger">
                                                <?php echo array_shift($data["errors"]); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="adminInputLogin">Login</label>
                                                <input type="text" required name="adminLogin" name="adminLogin"
                                                       id="adminInputLogin" class="form-control" placeholder="Login">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="adminInputEmail">Email address</label>
                                                <input type="email" required name="adminEmail" name="adminEmail"
                                                       id="adminInputEmail" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" checked type="radio"
                                                       name="adminRadioRole" id="adminRadioUser" value="User">
                                                <label class="form-check-label" for="adminRadioUser">User</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="adminRadioRole"
                                                       id="adminRadioAdmin" value="Admin">
                                                <label class="form-check-label" for="adminRadioAdmin">Admin</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="adminInputFirst">First Name</label>
                                                <input type="text" name="adminFirstName" id="adminInputFirst"
                                                       class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="adminInputLast">Last Name</label>
                                                <input type="text" name="adminLastName" id="adminInputLast"
                                                       class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="adminInputPassword">Password</label>
                                                <input type="password" required name="adminPassword"
                                                       id="adminInputPassword" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="adminInputConfirmPassword">Confirm Password</label>
                                                <input type="password" required name="adminConfirmPassword"
                                                       id="adminInputConfirmPassword" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Add Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="edit">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="/admin/edit">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" checked type="radio"
                                                       name="adminRadioRole" id="adminRadioUser" value="User">
                                                <label class="form-check-label" for="adminRadioUser">User</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="adminRadioRole"
                                                       id="adminRadioAdmin" value="Admin">
                                                <label class="form-check-label" for="adminRadioAdmin">Admin</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="adminInputFirst">First Name</label>
                                                <input type="text" name="adminFirstName" id="adminInputFirst"
                                                       class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="adminInputLast">Last Name</label>
                                                <input type="text" name="adminLastName" id="adminInputLast"
                                                       class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="adminInputPassword">Password</label>
                                                <input type="password" required name="adminPassword"
                                                       id="adminInputPassword" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="adminInputConfirmPassword">Confirm Password</label>
                                                <input type="password" required name="adminConfirmPassword"
                                                       id="adminInputConfirmPassword" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile
                                    </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="delete">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">List of Users</h4>
                                    </div>
                                    <form method="post" action="/admin/delete" name="userDelete">
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <th>ID</th>
                                                <th>Login</th>
                                                <th>email</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Role</th>
                                                </thead>
                                                <tbody>

                                                <?php if (isset($data['users'])): ?>
                                                    <?php foreach ($data['users'] as $key => $user): ?>
                                                        <tr data-html="/admin/delete">
                                                            <td>
                                                                <input class="form-check-input" checked type="radio"
                                                                       name="adminUserDelete"
                                                                       value="<?php echo $user['id'] ?>">
                                                            </td>
                                                            <td><?php echo $user['id'] ?></td>
                                                            <td><?php echo $user['login'] ?></td>
                                                            <td><?php echo $user['email'] ?></td>
                                                            <td><?php echo $user['first_name'] ?></td>
                                                            <td><?php echo $user['last_name'] ?></td>
                                                            <td><?php echo $user['role'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" id="userDelete" class="btn btn-info btn-fill pull-right">
                                            Delete Profile
                                        </button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>