<?php
include('../libs/registerform.php');
if(isset($_POST['registersubmit']))
{
	unset($_POST['registersubmit']);
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
	{
		if($_POST['password'] != '' && strlen($_POST['password']) > 7)
		{
			if($_POST['password'] == $_POST['cmfpassword'])
			{
				if(!exist('users',' where email like "'.$_POST['email'].'"') && !exist('admins',' where email like "'.$_POST['email'].'"'))
				{
					$_POST['password'] = hash('sha256', $_POST['password'], FALSE);
					$_POST['code'] = uniqid(mt_rand(111111111,999999999));
					unset($_POST['cmfpassword']);
					
					if(isset($_POST['dealer']))
					{
						unset($_POST['dealer']);
						if(insertAdmin($_POST))
						{
							if($contact['email'] != '') $_POST['contactemail'] = $contact['email'];
							if(sendemail('admin',$_POST)) header('Location: ../register.php?message=m1');
							else header('Location: ../register.php?message=m2');
						}
						else header('Location: ../register.php?message=m2');
					}
					else
					{
						unset($_POST['company']);
						if(insertuser($_POST))
						{
							if($contact['email'] != '') $_POST['contactemail'] = $contact['email'];
							if(sendemail('user',$_POST)) header('Location: ../register.php?message=m1');
							else header('Location: ../register.php?message=m2');
						}
						else header('Location: ../register.php?message=m2');
					}
				}
				else header('Location: ../register.php?message=m13');
			}
			else header('Location: ../register.php?message=m6');
		}
		else header('Location: ../register.php?message=m7');
	}
	else header('Location: ../register.php?message=m5');
}
?>