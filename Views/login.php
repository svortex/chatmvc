   <div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong>Sign In </strong></h3></div>
            <div class="panel-body">
                <?php

                if(isset($errors) && !is_null($errors)) {
                    echo $errors;
                }

                ?>
                <form role="form" action="/security/login" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username or Email</label>
                        <input name ="login" type="text" class="form-control" placeholder="Enter login">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-sm btn-default">Sign in</button>
                </form>
            </div>
        </div>
    </div>
   </div>