<!-- Start Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/user/signup" name="signupUser">
                    <div class="form-group">
                        <label for="SignupInputName">Name</label>
                        <input type="text" class="form-control" id="signupInputName" aria-describedby="nameHelp"
                               name="name" placeholder="James Bond">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputPhone">Phone</label>
                        <input type="text" class="form-control" required id="signupInputPhone"
                               aria-describedby="nameHelp" name="lastName" placeholder="123-456-789">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputLogin">Login</label>
                        <input type="text" class="form-control" required id="signupInputLogin"
                               aria-describedby="nameHelp" name="Login" placeholder="Agent007">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputEmail">email</label>
                        <input type="email" class="form-control" required id="signupInputEmail" name="email"
                               placeholder="james@bond.com">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputCity">city</label>
                        <input type="text" class="form-control" id="signupInputCity" aria-describedby="nameHelp"
                               name="City" placeholder="London">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputAdress">adress</label>
                        <input type="text" class="form-control" id="signupInputAdress" aria-describedby="nameHelp"
                               name="Adress" placeholder="Vauxhall Cross - 85">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputBorn">born</label>
                        <input type="date" class="form-control" id="signupInputBorn" aria-describedby="nameHelp"
                               name="Born">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputPassword">password</label>
                        <input type="password" required class="form-control" id="signupInputPassword"
                               aria-describedby="nameHelp" name="Password">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputConfirmPassword">confirm password</label>
                        <input type="password" required class="form-control" id="signupInputConfirmPassword"
                               aria-describedby="nameHelp" name="ConfirmPassword">
                    </div>
                    <button type="submit" name="subscribe" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->