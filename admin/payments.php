<?php
include "includes/header.php";
?>

<h1>Payments</h1>
<p>This table includes
	<?php echo counting("payments", "id"); ?> payments.
</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>User Name</th>
			<th>Transaction id</th>
			<th>Method</th>
			<th>Remarks</th>
			<th>Amount</th>
			<th>Created at</th>
		</tr>
	</thead>

	<?php
	$sql = "SELECT p.*, pr.full_name as full_name FROM payments p JOIN profile pr on p.user_id = pr.id";
	$payments = query($sql);
	if ($payments)
		foreach ($payments as $paymentss):
			?>
			<tr>
				<td>
					<?php echo $paymentss['id'] ?>
				</td>
				<td>
					<?php echo $paymentss['full_name'] ?>
				</td>
				<td>
					<?php echo $paymentss['transaction_id'] ?>
				</td>
				<td>
					<?php echo $paymentss['method'] ?>
				</td>
				<td>
					<?php echo $paymentss['remarks'] ?>
				</td>
				<td>
					<?php echo $paymentss['amount'] ?>
				</td>
				<td>
					<?php echo $paymentss['created_at'] ?>
				</td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>