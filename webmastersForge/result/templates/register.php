<form  name="register" id="register"  action="<?php echo task('register') ?>" method="POST" >

    <div class="form-group">

        <label class="col-md-4" ></label>

        <div class="col-md-4">
            <div class="controls">
                <img id="image" src="<?php echo $imagesDir?>empty.gif" alt="" class="img-responsive " width="70px"/>
                <a href="#" id="loadImage"> <?php l('loadImage') ?></a>
                <span  id="imageD" class="text-danger">&nbsp;</span> 
            </div>
        </div>
        
    </div>


    <div class="form-group">
        <label class="col-md-4 control-label" for="login"><?php l('login') ?></label>  
        <div class="col-md-4">
            <input id="login" name="login" placeholder="<?php l('loginPH') ?>" class="form-control input-md" type="text">
            <span  id="loginD" class="text-danger"> &nbsp;</span> 
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="email"><?php l('email') ?></label>  
        <div class="col-md-4">
            <input id="email" name="email" placeholder="<?php l('emailPH') ?>" class="form-control input-md" type="text">
            <span  id="emailD" class="text-danger">&nbsp;</span> 
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="password"><?php l('password') ?></label>  
        <div class="col-md-4">
            <input id="password" name="password" placeholder="<?php l('passwordPH') ?>" class="form-control input-md"  type="password">
            <span  id="passwordD" class="text-danger">&nbsp;</span> 
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-4 control-label" for="password2"><?php l('password2') ?></label>  
        <div class="col-md-4">
            <input id="password2" name="password2" placeholder="<?php l('password2PH') ?>" class="form-control input-md" required="" type="password">
            <span  id="password2D" class="text-danger">&nbsp;</span> 
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="submit"> </label>
        <div class="col-md-4">
            <button type="button" id="submit" name="submit"  class="btn btn-primary"><?php l('registerButt') ?></button>
        </div>
    </div>

</form>