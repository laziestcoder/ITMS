

<div class="signin-form">
    <div class="container">
        <form class="form-signin" method="post" id="login-form">
            <h2 class="form-signin-heading" style="text-align:center;">Log In Form</h2><hr />

            <div id="error">
                <!-- error will be shown here ! -->
            </div>

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email address . . . . ." name="user_email" id="user_email" autofocus="autofocus" />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password . . . . . " name="password" id="password" />
            </div>

            <hr />

            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">
                    <span class="glyphicon glyphicon-log-in"></span> Sign In
                </button>
            </div>
        </form>
    </div>
</div>