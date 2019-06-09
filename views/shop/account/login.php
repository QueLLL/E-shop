<?php
require_once ROOT. "/views/layouts/header.php";
?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
                        <? if(!empty($errors)):?>
                        <ul>
                            <? foreach ($errors as $error):?>
                                <li><?=$error?></li>
                            <?php endforeach;?>
                            <ul/>
                            <? endif;?>
						<h2>Login to your account</h2>
						<form action="#" method="post">
                            <input type="email" name="LoginEmail" placeholder="Email Address" required/>
							<input type="password" name="LoginPassword" placeholder="Password" required/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="doLogin" value="1" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


<?php
require_once ROOT. "/views/layouts/footer.php";
?>