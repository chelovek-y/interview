<!DOCTYPE html>

<html>

<head>

    <title><?php l($view) ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <? foreach ($cssFiles as $cssFile) {?>
        <link rel="stylesheet" href="<?php echo $cssFile ?>">
    <?;}?>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


    <? foreach ($jsFiles as $jsFile) {?>
        <script src="<?php echo $jsFile ?>"></script>
    <?;}?>


    <script>
        var checkFields='<?php echo $checkFields ?>';
    </script>

</head>

<body class="<?php echo $view ?>" >

    <div class="container">
        <div class="row">
            <h2><?php l(($view=='login') ?  ("auth") :  ($view)) ?></h2> <br>
        
            <form class="form-horizontal">
        
                <fieldset>

  <!-- Form Name -->
                    <legend  style="padding:4px 0; overflow: hidden;">
                        <? if ($login) { ?>
                            <div style="float:left;"><?= l('hello') ?> <?= $login ?>!</div>
                        <? ;} else { ?>
                            <a href="<?php echo link2('register') ?>" title="<?php l('registerShort') ?>" style="margin:0 30px"><?php l('registerShort') ?></a> 	
                            <a href="<?php echo link2('login') ?>" title="<?php l('authShort') ?>"><?php l('authShort') ?></a> 
                        <? ;} ?>


                        <div  style="float:right;">
                            <form  action="<?php echo ROOT_URI ?>" method="post" >
                                <select  name="lang" id="lang" size="1">
                                    <option value="en" <?php echo ($lang=="en") ?  ('selected="selected"') :  ("") ?> >english</option>
                                    <option value="ru" <?php echo ($lang=="ru") ?  ('selected="selected"') :  ("") ?> >русский</option>
                                </select>
                                <input type="hidden" name="task" value="setLang">
                            </form>

                        </div> 
                        <? if ($login) { ?>
                            <div  style="float:right;">
                                <a href="<?php echo task('logout') ?>" title="<?php l('logout') ?>" style="margin:0 30px"><?php l('logout') ?></a> 
                            </div> 
                        <? ;} ?>
                    </legend>

              <?php require_once($viewFile); ?>

                </fieldset>
            </form>
  
        </div>
    </div>
</body>

</html>