@extends('layouts.app2')
@section('title', 'List Data Registrasi | Admin')
@section('judul', 'Data Registrasi')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="<?= url('/export') ?>" class="btn btn-success mb-2">Export Data</a>
                        <table class="table table-striped data">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenjang</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Asal Sekolah</th>
                                    <th scope="col">Jenis Paket</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Bukti</th>
                                    <th scope="col">Konfirmasi</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($registrasi as $r)
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <th><?= $r->name ?></th>
                                    <th><img src="<?= url('assets/imageProfile/', $r->image) ?>" width="100%" class="img-thumbnail"></th>
                                    <th><?= $r->alamat ?></th>
                                    <td><?= $r->jenjang ?></td>
                                    <td><?= $r->kelas ?></td>
                                    <td><?= $r->asal_sekolah ?></td>
                                    <td><?= $r->jenis_paket ?></td>
                                    <td>
                                        @if ($r->status == 0)
                                            <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                        @else
                                            <span class="badge badge-success">Berhasil Dikonfirmasi</span>
                                        @endif
                                    </td>
                                    <td><a href="<?= url('buktiTF/', $r->bukti) ?> " target="_blank" class="btn btn-info">Lihat</a></td>
                                    <td>
                                        @if ($r->status == 0)
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi<?= $r->id ?>">
                                            Konfirmasi
                                            </button>
                                            @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@foreach ($registrasi as $r)
<div class="modal fade" id="konfirmasi<?= $r->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= route('registrasi.update', $r->id) ?>" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <p>Yakin konfirmasi data dengan Nama pendaftar : <?= $r->name ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Konfirmasi</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach