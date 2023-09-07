<head>
	<title>Using Datatable In PHP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
	<style>
      	.table-responsive{
			box-shadow: 0px 0px 5px #999;
			padding: 20px;
		}
	</style>
</head>
<body>
    <table id="dataid" class="table table-striped table-bordered" style="width: 100%;">
				<thead>
					<tr>
						<th>id</th>
						<th>title</th>
					</tr>
				</thead>
				<tbody>
                <?php
                    //Kết nối với MySQL
                    $conn = mysqli_connect("localhost", "root", "", "06_humg") or die("Connect fail!");
                    mysqli_query($conn,"SET NAMES 'utf8'");

                    //Lấy dữ liệu từ MySQL
                    $sql = "SELECT * FROM testpt ORDER BY id DESC";
                    $query = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    
                </tr>
                <?php 
                } //end while
                ?>
				</tbody>
	</table>
    <script>
        $(document).ready(function() {
            var datatablephp = $('#dataid').DataTable();
        });
    </script>
</body>
