
<!-- Container -->
<div id="container">
	<div class="shell">
		

<? if ($login) { ?>
		<!-- Message OK -->		
		<div class="msg msg-ok">
			<p><strong>Вы успешно авторизованы</strong></p>
		   
		</div>		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<? ;} else { ?>
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
			  
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Авторизация</h2>
					</div>
					<!-- End Box Head -->
					
					<form action="" method="post">
						
						<!-- Form -->
						<div class="form">
								<p>
									
									<label>Логин </label>
									<input type="text" id="login" class="field size1" />
								</p>
								<p>
									
									<label>Пароль </label>
									<input type="password" id="password" class="field size1" />
								</p>
								<p>
									
								  Запомнить меня 
									<input id="remember" type="checkbox" />
								</p>
								<p id="failAuth" style="color:#B20000;display:none;" >
									
								  неверное имя пользователя<br> либо пароль 
									
								</p>
                                
							
						</div>
						<!-- End Form -->
						<br /><br /><br /><br />
						<!-- Form Buttons -->
						<div class="buttons">
							
							<input type="button" id="enter" class="button" value="Войти" />
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			
			
			<div class="cl">&nbsp;</div>			
		</div>
<? ;} ?>
 
   
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />