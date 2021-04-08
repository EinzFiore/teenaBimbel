<!DOCTYPE html>
<html>
<head>
	<title>Kartu Pendaftar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <center><h2>Kartu Pendaftar</h2></center>
    <center>
      <table class="table table-striped">
          <tr>
            <th scope="col">Nama</th>
            <td>:</td>
            <td><?= $registrasi->name ?></td>
          </tr>
           <tr>
             <th scope="col">Jenjang</th>
             <td>:</td>
             <td><?= $registrasi->jenjang ?></td>
           </tr>
           <tr>
             <th scope="col">Kelas</th>
             <td>:</td>
             <td><?= $registrasi->kelas ?></td>
           </tr>
           <tr>
              <th scope="col">Jenis Paket</th>
              <td>:</td>
              <td><?= $registrasi->jenis_paket ?></td>
            </tr>
            <tr>
              <th scope="col">Status</th>
              <td>:</td>
              <td>
                @if ($registrasi->status == 0)
                    belum dikonfirmasi
                    @else
                    Dikonfirmasi
                @endif
              </td>
            </tr>
      </table>
    </center>
</body>
</html>