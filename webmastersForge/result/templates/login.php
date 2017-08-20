
<form  name="loginForm" id="loginForm"  action="" method="POST" >

    <br><br><br>

    <div class="form-group">
        <label class="col-md-4 control-label" for="login"><?php l('login') ?></label>  
        <div class="col-md-4">
            <input id="login" name="login" placeholder="<?php l('authLoginPH') ?>" class="form-control input-md" type="text">
            <span  id="loginD" class="text-danger"> &nbsp;</span> 
<!--  <?php l('loginErr') ?> -->
        </div>
    </div>

<!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="password"><?php l('password') ?></label>  
        <div class="col-md-4">
            <input id="password" name="password" placeholder="<?php l('authPasswordPH') ?>" class="form-control input-md" type="password">
 
        </div>
    </div>



<!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="submit"> </label>
        <div class="col-md-4"><br>
            <button type="button" id="submit" name="submit"  class="btn btn-primary"><?php l('authShort') ?></button>
        </div>
    </div>

</form>