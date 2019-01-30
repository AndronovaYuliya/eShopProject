<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="/img/admin/sidebar-5.jpg">
        <!--
            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag
        -->
        <div class="sidebar-wrapper">
            <ul class="nav nav-tabs">
                <li class="nav-item active">
                    <a href="#admin" class="nav-link" aria-controls="admin" role="tab" data-toggle="tab">
                        <i class="pe-7s-user"></i>
                        <p>Admin Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <i class="pe-7s-tools"></i>
                    <p>Tables</p>
                    <?php foreach ($tables

                    as $table): ?>
                <li class="nav-item ">
                    <a href="#<?php echo $table ?>" class="nav-link" aria-controls="view" role="tab"
                       data-toggle="tab">
                        <p><?php echo $table ?></p>
                    </a>
                </li>
                <?php endforeach; ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/admin/logout">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="admin">
                        <?php if (isset($errors)): ?>
                            <div class="alert alert-danger">
                                <?php echo $errors; ?>
                            </div>
                        <?php endif; ?>
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a href="#view" class="nav-link" aria-controls="view" role="tab"
                                   data-toggle="tab">User</a>
                            </li>
                            <li class="nav-item">
                                <a href="#add" class="nav-link" aria-controls="add" role="tab" data-toggle="tab">Add</a>
                            </li>
                            <li class="nav-item">
                                <a href="#edit" class="nav-link" aria-controls="edit" role="tab"
                                   data-toggle="tab">Edit</a>
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
                                            <?php if (isset($admin)): ?>
                                                <div class="header">
                                                    <h4 class="title"><?php echo $admin["role"] ?></h4>
                                                </div>
                                                <div class="content">
                                                    <div class="author">
                                                        <h4 class="title"><?php echo $admin["first_name"] . ' ' . $admin["last_name"] ?>
                                                            <br/>
                                                            <small><?php echo $admin["login"] ?></small>
                                                        </h4>
                                                    </div>
                                                    <p class="description text-left"><?php echo $admin["email"] ?></p>
                                                </div>
                                                <hr>
                                            <?php endif; ?>

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
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="adminInputLogin">Login</label>
                                                                <input type="text" name="adminAddLogin"
                                                                       id="adminInputLogin" class="form-control"
                                                                       placeholder="Login">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="adminInputEmail">Email address</label>
                                                                <input type="email" name="adminAddEmail"
                                                                       id="adminInputEmail" class="form-control"
                                                                       placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" checked type="radio"
                                                                       name="adminAddRadioRole" id="adminRadioUser"
                                                                       value="User">
                                                                <label class="form-check-label" for="adminRadioUser">User</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                       name="adminAddRadioRole"
                                                                       id="adminRadioAdmin" value="Admin">
                                                                <label class="form-check-label" for="adminRadioAdmin">Admin</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="adminInputFirst">First Name</label>
                                                                <input type="text" name="adminAddFirstName"
                                                                       id="adminInputFirst"
                                                                       class="form-control" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="adminInputLast">Last Name</label>
                                                                <input type="text" name="adminAddLastName"
                                                                       id="adminInputLast"
                                                                       class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="adminInputPassword">Password</label>
                                                                <input type="password" name="adminAddPassword"
                                                                       id="adminInputPassword" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="adminInputConfirmPassword">Confirm
                                                                    Password</label>
                                                                <input type="password" name="adminAddConfirmPassword"
                                                                       id="adminInputConfirmPassword"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="addSubmit"
                                                            class="btn btn-info btn-fill pull-right">Add
                                                        Profile
                                                    </button>
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
                                                                       name="adminRadioRole" id="adminRadioUser"
                                                                       value="User">
                                                                <label class="form-check-label" for="adminRadioUser">User</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                       name="adminRadioRole"
                                                                       id="adminRadioAdmin" value="Admin">
                                                                <label class="form-check-label" for="adminRadioAdmin">Admin</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if (isset($admin)): ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="adminInputFirst">First Name</label>
                                                                    <input type="text" name="adminFirstName"
                                                                           id="adminInputFirst"
                                                                           class="form-control"
                                                                           placeholder="First Name"
                                                                           value="<?php echo $admin["first_name"] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="adminInputLast">Last Name</label>
                                                                    <input type="text" name="adminLastName"
                                                                           id="adminInputLast"
                                                                           class="form-control"
                                                                           placeholder="Last Name"
                                                                           value="<?php echo $admin["last_name"] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="adminInputPassword">Password</label>
                                                                    <input type="password" name="adminEditPassword"
                                                                           id="adminInputPassword" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="adminInputConfirmPassword">Confirm
                                                                        Password</label>
                                                                    <input type="password"
                                                                           name="adminEditConfirmPassword"
                                                                           id="adminInputConfirmPassword"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-info btn-fill pull-right">
                                                            Update Profile
                                                        </button>
                                                    <?php endif; ?>
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
                                                                <?php if (isset($admins)): ?>
                                                                    <?php foreach ($admins as $key => $user): ?>
                                                                        <tr data-html="/admin/delete">
                                                                            <td>
                                                                                <input class="form-check-input" checked
                                                                                       type="radio"
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
                                                        <button type="submit" id="userDelete"
                                                                class="btn btn-info btn-fill pull-right">
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

                    <?php foreach ($tables as $table): ?>
                        <div role="tabpanel" class="tab-pane" id="<?php echo $table ?>">
                            <div class="row">
                                <form method="post" action="/admin/tableDelete" id="form_table">
                                    <div class="col-md-12">
                                        <?php $name = $table;
                                        echo $name ?>
                                        <?php $keys = array_keys($$name[0]); ?>
                                        <div class="card">
                                            <div class="header">
                                                <h4 class="title">Table <?php echo $table ?></h4>
                                            </div>
                                            <div class="content table-responsive table-full-width">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-striped table-condensed">
                                                        <thead>

                                                        <?php foreach ($keys as $key): ?>
                                                            <th><?php echo $key ?></th>
                                                        <?php endforeach; ?>

                                                        </thead>
                                                    </table>
                                                </div>
                                                <div class="bodycontainer scrollable">
                                                    <table class="table table-hover table-striped table-condensed table-scrollable">
                                                        <tbody>

                                                        <?php foreach ($$name as $value): ?>
                                                            <?php $currentKeys = $keys ?>
                                                            <tr>
                                                                <td width="1%">
                                                                    <input class="form-check-input table-admin-check"
                                                                           type="radio"
                                                                           name="adminTable<?php echo '?' . $table ?>"
                                                                           value="<?php echo $value['id'] ?>">
                                                                </td>
                                                                <td width="1%"><?php echo $value[array_shift($currentKeys)] ?></td>

                                                                <?php foreach ($currentKeys as $key): ?>
                                                                    <?php if ($key != 'created_at' && $key != 'updated_at'
                                                                        && $key != 'password' && $key != 'date_touched'): ?>
                                                                        <td><input type="text" name="<?php echo $key ?>"
                                                                                   value="<?php echo $value[$key] ?>">
                                                                        </td>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                                <?php if (isset($value['date_touched'])): ?>
                                                                    <td class="text-left"><?php echo $value['date_touched'] ?></td>
                                                                <?php endif; ?>
                                                                <td class="text-left"><?php echo $value['created_at'] ?></td>
                                                                <td class="text-left"><?php echo $value['updated_at'] ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <button type="submit" name="tableEdit"
                                                    class="btn btn-info btn-fill pull-right edit-table-admin">
                                                Edit Data
                                            </button>
                                            <button type="submit" name="tableDelete"
                                                    class="btn btn-info btn-fill pull-right delete-table-admin">Delete
                                                Data
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="/admin/tableAdd">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="header">
                                                <h4 class="title">Add data to table <?php echo $table ?></h4>
                                            </div>
                                            <div class="content table-responsive table-full-width">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-striped table-condensed">
                                                        <thead>
                                                        <?php foreach ($keys as $key): ?>
                                                            <?php if ($key != 'id' && $key != 'created_at' && $key != 'updated_at'): ?>
                                                                <th><?php echo $key ?></th>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        </thead>
                                                        <tbody>
                                                        <?php $currentKeys = $keys; ?>
                                                        <tr>
                                                            <?php foreach ($currentKeys as $key): ?>
                                                                <?php if ($key != 'created_at' && $key != 'updated_at' && $key != 'id'): ?>
                                                                    <td>
                                                                        <input name="<?php echo $table . '?' . $key ?>"
                                                                               type="text"
                                                                               placeholder="<?php echo $key ?>">
                                                                    </td>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right add-table-admin">
                                            Add Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>
</div>
