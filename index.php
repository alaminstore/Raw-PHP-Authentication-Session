
<?php
      include 'lib/User.php ';
      include 'inc/header.php ';
      Session::checkSession();
?>

<?php
     $loginmsg = Session::get("loginmsg");
     if (isset($loginmsg)) {
         echo $loginmsg;
     }

    Session::set("loginmsg" , NULL);
?>
             <div class=" panel panel-default">
             	<div class="panel-heading">
             		<h2>User List <span class="pull-right">Welcome !<strong>
                    <?php
                        $username = Session::get("username");
                        if (isset($username)) {
                            echo $username;
                        }
                    ?>
                </strong></span></h2>
             	</div>
             	<div class="panal-body">
             		<table class="table table-striped">
         			<tr>
	         			<th width="20%">Serial</th>
	         			<th width="20%">Name</th>
	         			<th width="20%">Username</th>
	         			<th width="20%">Email Address</th>
	         			<th width="20%">Action</th>             				
         			</tr>
                    <?php
                       $user = new User();
                       $userdata = $user->getUserData();
                       if ($userdata) {
                        $i=0;
                          foreach ($userdata as  $sdata) {
                          $i++;
                            ?>
         			<tr>
         				<td><?php echo $i;?></td>
         				<td><?php echo $sdata['name']; ?></td>
         				<td><?php echo $sdata['username']; ?></td>
         				<td><?php echo $sdata['email']; ?></td>
         				<td>
                           <a class="btn btn-primary" href="profile.php?id=<?php echo $sdata['id']; ?>">view</a>
         				</td>
         			</tr>
                <?php }}else{  ?>
                     <tr><td colspan="5"><h2 class="text-center">No User Data</h2></td></tr>
                    <?php } ?>
             		</table>
             	</div>
             </div>

         <?php
             include 'inc/footer.php ';
         ?>