<?php 

$con = mysqli_connect('localhost','root','','arkademy');
if (!$con) {
	echo "Koneksi sukses ";die;
}

$data = $con->query("SELECT name.id as id_name, name.id_work as id_work, name.id_salary as id_salary, name.name as nama, work.name as work, category.salary as salary FROM name LEFT JOIN work ON work.id=name.id_work LEFT JOIN category ON category.id=name.id_salary");

$work = $con->query("SELECT * FROM work");
$salary = $con->query("SELECT * FROM category");

$work2 = $con->query("SELECT * FROM work");
$salary2 = $con->query("SELECT * FROM category");
?>

<!doctype html>
<html lang="en">
<head>
	<title>Hello, world!</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<button style="float: right" type="button" class="btn btn-warning text-white mb-2" data-toggle="modal" data-target="#modalAdd">
					ADD
				</button>
				<table class="table table-bordered">
					<thead>
						<tr class="bg-default">
							<th>Name</th>
							<th>Work</th>
							<th>Salary</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $item): ?>
							<tr>
								<td><?php echo $item['nama'] ?></td>
								<td><?php echo $item['work'] ?></td>
								<td><?php echo number_format($item['salary']) ?></td>
								<td>
									<a href="#" class="btn btn-warning text-white mb-2" data-toggle="modal" data-target="#modalEdit" data-id="<?php echo $item['id_name'] ?>" data-nama="<?php echo $item['nama'] ?>" title="Edit" data-work="<?php echo $item['id_work'] ?>" data-salary="<?php echo $item['id_salary'] ?>"><img src="edit.png" width="20px"></a>
									<form action="" method="POST">
										<input type="hidden" name="id_hapus" value="<?php echo $item['id_name'] ?>">
										<input type="submit" name="form_hapus" value="Hapus" class="btn btn-warning text-white">
									</form>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal ADD -->
	<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddLabel">ADD DATA</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Name..">
						</div>
						<div class="form-group">
							<select name="work" class="form-control">
								<?php foreach ($work as $work): ?>
									<option value="<?php echo $work['id'] ?>"><?php echo $work['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<select name="salary" class="form-control">
								<?php foreach ($salary as $salary): ?>
									<option value="<?php echo $salary['id'] ?>">Rp. <?php echo number_format($salary['salary']) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" name="form_add" class="btn btn-warning text-white" value="ADD">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal EDIT -->
	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddLabel">ADD DATA</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					<input type="hidden" name="id_edit" id="view-id">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" name="name_edit" class="form-control" placeholder="Name.." id="view-name">
						</div>
						<div class="form-group">
							<select name="work_edit" class="form-control" id="view-work">
								<?php foreach ($work2 as $work): ?>
									<option><?php echo $work['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<select name="salary_edit" class="form-control" id="view-salary">
								<?php foreach ($salary2 as $salary): ?>
									<option>Rp. <?php echo number_format($salary['salary']) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" name="form_edit" class="btn btn-warning text-white" value="ADD">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal EDIT -->
	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddLabel">ADD DATA</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					<input type="hidden" name="id_edit" id="view-id">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" name="name_edit" class="form-control" placeholder="Name.." id="view-name">
						</div>
						<div class="form-group">
							<select name="work_edit" class="form-control" id="view-work">
								<?php foreach ($work2 as $work): ?>
									<option><?php echo $work['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<select name="salary_edit" class="form-control" id="view-salary">
								<?php foreach ($salary2 as $salary): ?>
									<option>Rp. <?php echo number_format($salary['salary']) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" name="form_edit" class="btn btn-warning text-white" value="ADD">
					</div>
				</form>
			</div>
		</div>
	</div>


	<?php 
	if (isset($_POST['form_add'])) {
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		$name = $_POST['name'];
		$work = $_POST['work'];
		$salary = $_POST['salary'];

		$save = $con->query("INSERT INTO name (name,id_work,id_salary) VALUES('$name','$work','$salary')") or die(mysqli_error($con));
		if ($save) {
			echo "<script>alert('success');window.location.href(".$_SERVER['HTTP_REFERER'].")</script>";
		}
	}

	if (isset($_POST['form_edit'])) {
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		$id_edit = $_POST['id_edit'];
		$name_edit = $_POST['name_edit'];
		$work_edit = $_POST['work_edit'];
		$salary_edit = $_POST['salary_edit'];

		$save = $con->query("INSERT INTO name (name,id_work,id_salary) VALUES('$name','$work','$salary')") or die(mysqli_error($con));
		if ($save) {
			echo "<script>alert('success');window.location.href(".$_SERVER['HTTP_REFERER'].")</script>";
		}
	}

	if (isset($_POST['form_hapus'])) {
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";die;
		$id_hapus = $_POST['id_hapus'];

		$hapus = $con->query("DELETE FROM name WHERE id='$id_hapus'") or die(mysqli_error($con));
		if ($hapus) {
			echo "<script>alert('success');window.location.replace(c.php)</script>";
		}
	}


	?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#modalEdit').on('show.bs.modal', function(e){
				var button = $(e.relatedTarget);
				console.log(button.data('id'));
				console.log(button.data('nama'));
				console.log(button.data('work'));
				console.log(button.data('salary'));

				$('#view-id').val(button.data('id'))
				$('#view-name').val(button.data('nama'))
				$('#view-work').val(button.data('work'))
				$('#view-salary').val(button.data('salary'))
			})
		});
	</script>
</body>
</html>