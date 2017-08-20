<?php
$email = $vars['user']['email'];
$image = $vars['user']['image'];
$imageFull = $uploadsDir.$image;
?>
<? if ($image) { ?>
    <div class="form-group" >
        <img id="image"  src="<?php echo $imageFull?>" alt="" class="img-responsive " style="margin:0 auto;" width="120"/>
    </div>
<? ;} ?>

<? if ($login) { ?>
    <div class="form-group"  >
        <label class="col-md-4 control-label" for="login"><?php l('login') ?>:</label>  
        <div>
            <?php echo $login ?>
        </div> 
    </div>
<? ;} ?>

<? if ($email) { ?>
    <div class="form-group">
        <label class="col-md-4 control-label" for="login"><?php l('emailShort') ?>:</label>  
        <div >
            <?php echo $email ?>
        </div> 
    </div>
<? ;} ?>





