<div class="row">
	<?php include("../designs/headers/profilemenu.php"); ?>
	<div class="col-md-10 <?php if($lang_file == 'ar') echo 'col-md-pull-2'; ?>">
	<h2><label><?php language('admins'); ?></label></h2><br><br>
	
		<h4><label style="color: #0c5d97;"><?php language('newadmin'); ?></label></h4>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
				<form enctype="multipart/form-data" method="POST" action="">
				<?php if(isset($_GET['oldid']) && $_GET['oldid'] != '') { ?><input type="hidden" name="oldid" value="<?php echo $_GET['oldid']; ?>" /><?php } ?>
				<table class="table table-bordered">
					<tr>
						<td class="info"><?php language('username'); ?></td>
						<td class="warning"><input type="text" name="username" value="<?php if(isset($admin['username'])) echo $admin['username']; ?>" maxlength="100" class="form-control" required="required" /></td>
					</tr>
					<tr>
						<td class="info"><?php language('password'); ?></td>
						<td class="warning"><input type="password" name="password" class="form-control" <?php if(!isset($_GET['oldid'])) echo 'required="required"'; ?> /></td>
					</tr>
					<tr>
						<td class="info"><?php language('email'); ?></td>
						<td class="warning"><input type="email" name="email" value="<?php if(isset($admin['email'])) echo $admin['email']; ?>" maxlength="50" class="form-control" required="required" /></td>
					</tr>
					<tr>
						<td class="info"><?php language('company'); ?></td>
						<td class="warning"><input type="text" name="company" value="<?php if(isset($admin['company'])) echo $admin['company']; ?>" maxlength="50" class="form-control" required="required" /></td>
					</tr>
					<tr>
						<td class="info"><?php language('active'); ?></td>
						<td class="warning"><input type="checkbox" name="active" <?php if(isset($admin['active']) && $admin['active'] == 1) echo 'checked'; ?>></td>
					</tr>
					<tr>
						<td class="info"></td>
						<td class="warning"><input type="submit" name="saveadmin" class="btn btn-success" /></td>
					</tr>
				</table>
				</form>
				</div>
			</div>
		</div>
	
	<br><br><h4><label style="color: #0c5d97;"><?php language('admins'); ?></label></h4>
		<?php
		$admins = getAdmins($startResults,$resultsPerPage);
		if(!empty($admins))
		{
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
				<table class="table table-bordered">
					<tr class="danger">
						<td><?php language('username'); ?></td>
						<td><?php language('email'); ?></td>
						<td><?php language('company'); ?></td>
						<td><?php language('active'); ?></td>
						<td><?php language('edit'); ?></td>
						<td><?php language('delete'); ?></td>
					</tr>
				<?php for($i=0;$i<sizeof($admins);$i++) { ?>
					<tr id="tr-<?php echo $admins[$i]['id']; ?>">
						<td><?php echo $admins[$i]['username']; ?></td>
						<td><?php echo $admins[$i]['email']; ?></td>
						<td><?php echo $admins[$i]['company']; ?></td>
						<td><input type="checkbox" name="active" <?php if($admins[$i]['active'] == 1) echo 'checked'; ?> disabled></td>
						<td><a href="admins.php?oldid=<?php echo $admins[$i]['id']; ?>"><i style="color:green;" class="glyphicon glyphicon-edit"></i></a></td>
						<td>
							<i id="<?php echo $admins[$i]['id'];?>" style="color:red;" class="admindel glyphicon glyphicon-remove-circle"></i>
							<div id="admins-<?php echo $admins[$i]['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<?php language('deleteadminmodal'); ?>
											<br>
        								</div>
										<div class="modal-body">
										<center>
											<button class="btn btn-danger" onclick="deleteadmin('<?php echo $admins[$i]['id'];?>')" data-dismiss="modal"><?php language('agree'); ?></button>
											<button class="btn btn-success" data-dismiss="modal" aria-hidden="true"><?php language('no'); ?></button>
										</center>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php } ?>
				</table>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4<?php if($lang_file == 'ar') echo ' col-md-push-8'; ?>">
			</div>
			<div class="col-md-8<?php if($lang_file == 'ar') echo ' col-md-pull-4'; ?>">
				<nav>
					<ul class="pagination">
						<?php if($totalPages > 1) { ?><li><a href="?page=1"><?php language("first"); ?></a></li><?php } ?>
						<?php if($page > 3) { ?><li>
							<a href="?page=<?php echo $page-2; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li><?php } ?>
						<?php if($page > 1) { ?><li><a href="?page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
						<?php if($totalPages > 1) { ?><li><a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
						<?php if($page < $totalPages) { ?><li><a href="?page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
						<?php if($page < $totalPages-1) { ?><li>
							<a href="?page=<?php echo $page+2; ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li><?php } ?>
						<?php if($totalPages > 1) { ?><li><a href="?page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
					</ul>
				</nav>
			</div>
		</div>
		
		<?php } else language("noadmins"); ?>
	</div>
</div>