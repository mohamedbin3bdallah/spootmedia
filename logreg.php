<?php if(!isset($_COOKIE['uid'])) { ?>
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" dir="rtl">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>���� ����</h3>
										<form action="develops/registerform.php" method="POST">
											<div class="sign-up">
												<h4>��� ������� :</h4>
												<input type="text" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">	
											</div>
											<div class="sign-up">
												<h4>����� :</h4>
												<input type="text" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">	
											</div>
											<div class="sign-up">
												<h4>���� ������ :</h4>
												<input type="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>����� ���� ������ :</h4>
												<input type="password" name="cmfpassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>���� :</h4>
												<input type="checkbox" name="dealer" id="dealer" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Dealer';}">
												
											</div>
											<div class="sign-up" id="dealercompany">
												<h4>���� :</h4>
												<input type="text" name="company" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Company';}">
												
											</div>
											<div class="sign-up">
												<input type="submit" name="registersubmit" value="�����" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>�����</h3>
										<form action="loginform.php" method="POST">
											<div class="sign-in">
												<h4>����� :</h4>
												<input type="text" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>���� ������ :</h4>
												<input type="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">���� ���� �����ѿ</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox" name="remember" id="brand" value="">
												<label for="brand"><span></span>������</label>
											</div>
											<div class="sign-in">
												<input type="submit" name="loginsubmit" value="����" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>�������� ��� ���� �� ����� ��� ��  <a href="#">������ �������</a> � <a href="#">����� ��������</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>