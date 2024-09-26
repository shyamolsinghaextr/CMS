<?php 

include 'components/head.php';
include 'components/navbar.php';
include 'components/sitebar.php';

?>

<!-- Main Content Area -->
    <div class="flex-grow-1 p-3">
        <h2>User Data</h2>
        
        <!-- User Data Table -->
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>password</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
			
			<?php
			require_once('db_connection.php');
			$sql = "SELECT * FROM users ";
			$result = mysqli_query($conn, $sql); 
			$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
			
				foreach ($user as $user_data) {
					echo "
						<tr>
							<td>1</td>
							<td>".$user_data['name']."</td>
							<td>".$user_data['phone']."</td>
							<td>".$user_data['password']."</td>
							<td><span class='badge bg-success'>Active</span></td>
							<td>
								<button class='btn btn-primary btn-sm'>Edit</button>
								<button class='btn btn-danger btn-sm'>Delete</button>
							</td>
						</tr>
					";
				}
			
			?>
                
               

            </tbody>
        </table>
		
<?php include 'components/footer.php';?>