<?php 
session_start();
require_once('db_connection.php');
include 'components/head.php';
include 'components/navbar.php';
include 'components/sitebar.php';
?>

    <div class="flex-grow-1 p-3">
        <h2>User Data</h2>
        
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
			
			<?php

			$sql = "SELECT * FROM users ";
			$result = mysqli_query($conn, $sql); 
			$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
			
			foreach ($user as $user_data) {
			echo "
				<tr>
					<td>".$user_data['id']."</td>
					<td>".$user_data['name']."</td>
					<td>".$user_data['phone']."</td>
					<td>".$user_data['address']."</td>
					<td><span class='badge bg-success'>Active</span></td>
					<td>
						<a href='user_edit.php?id=".$user_data['id']."' class='btn btn-primary btn-sm'>Edit</a>
						<a href='user_delete.php?id=".$user_data['id']."' class='btn btn-danger btn-sm'>Delete</a>
					</td>
				</tr>
				";
			}

			
			?>
                
            </tbody>
        </table>
		
<?php include 'components/footer.php';?>