<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>
</head>

<body>
<table align="center" style="text-align: center; margin-top: 20px">
   <tr>
      <td width="15%"><img src="<?= assets('img/logo.png') ?>" width="100"></td>
      <td width="85%"><h1 style="margin-bottom: 0">ZADDE AUTO MOBIL</h1><br>
      <div style="margin: 0; font-size: large;">Jl. Pondok Bambu Batas No.9, RW.4, Pd. Bambu, Kec. Duren <br>
      Sawit Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13430</div></td>
   </tr>
   <tr>
      <td></td>
      <td>
      </td>
   </tr>
</table>
<hr style="border: 1px solid black">
<hr>
<div>
   <h2 style="text-align: center; margin-top: 0;  margin-bottom: 30px">Laporan Permintaan Janji Temu</h2>

      <table style="border-spacing: 10px 5px;" align="center">
         <thead>
            <tr>
            <th style="width: 50px;">No</th>
                     <th>Nama</th>
							<th>Email</th>
							<th>No HP</th>
							<th>Mobil</th>
							<th>Tanggal Temu</th>
							<th>Status</th>
            </tr>
         </thead>
         <tbody>
                     <?php 
                     $nomor = 1;
                     foreach ($data as $x) { ?>
                        <tr style="text-align: center; ">
                        <td><?= $nomor++; ?></td>
								<td><?= $x->user_name; ?></td>
								<td><?= $x->user_email; ?></td>
								<td><?= $x->phone; ?></td>
								<td><?= $x->car_name; ?></td>
								<td><?= date('d/m/Y', strtotime($x->meet_date)); ?></td>
								<td>
									<?php if ($x->status == 'SUCCESS') { ?>
										<span>Selesai</span>
									<?php } elseif ($x->status == 'CANCEL') { ?>
										<span>Dibatalkan</spans>
									<?php } else { ?>
										<span>Belum Selesai</span>
									<?php } ?>
								</td>
                     </tr>
            <?php } ?>

         </tbody>
      </table>
</div>
   <script type="text/javascript">
      window.print();
   </script>

</body>

</html>