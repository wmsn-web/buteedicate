<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div style="padding-left: 30px; padding-right: 30px; margin: auto;">
		<div style="width:100%; display: flex; justify-content: center;">
			<div style="width:80%">
				<div style="text-align: center;">
					<h4>Contact Form Request</h4>
				</div>
				<table style="width:100%; border:solid 1px #f3f3f3;"cellspacing="0">
					<tr>
						<th style="width:20%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;">Name:</th>
						<td style="width:80%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;"><?= $data['name']; ?></td>
					</tr>
					<tr>
						<th style="width:20%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;">Email:</th>
						<td style="width:80%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;"><?= $data['email']; ?></td>
					</tr>
					<tr>
						<th style="width:20%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;">Mobile:</th>
						<td style="width:80%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;"><?= $data['mobile']; ?></td>
					</tr>
					<tr>
						<th style="width:20%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;">Requirment:</th>
						<td style="width:80%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;"><?= $data['requir']; ?></td>
					</tr>
					<tr>
						<th style="width:20%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;">Message:</th>
						<td style="width:80%; border:solid 1px #ccc; padding: 4px 15px; text-align: left;"><?= $data['message']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>