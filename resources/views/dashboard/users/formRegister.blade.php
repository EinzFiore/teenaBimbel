@extends('layouts/users/users')
@php
    $state = Auth::user()->state;
@endphp

@section('title', 'Form Pendaftaran Bimbel')

@if ($state == 0)
  @section('judul', 'Upload Photo Profil')
@endif

@if ($state == 1)
  @section('judul', 'Form Pendaftaran Bimbel')
@endif

@if ($state == 2)
  @section('judul', 'Pembayaran Bimbel')
@endif

@if ($state == 3)
  @section('judul', 'Status Registrasi')
@endif

@section('content')
<div class="card-header">
  @if ($state == 0)
    <h4>Upload Foto Profil</h4>
  @endif
  @if ($state == 1)
    <h4>Isi Form Pendaftaran</h4>
  @endif
  @if ($state == 2)
    <h4>Transaksi Pembayaran</h4>
  @endif
  </div>
  <div class="card-body">
    @if ($state == 0 OR $state == 1 OR $state == 2)
    <div class="row mt-4">
      <div class="col-12 col-lg-8 offset-lg-2">
        <div class="wizard-steps">
          <div class="wizard-step" id="userAccount">
            <div class="wizard-step-icon">
              <i class="far fa-user"></i>
            </div>
            <div class="wizard-step-label">
              User Account
            </div>
          </div>
          <div class="wizard-step" id="registrasi">
            <div class="wizard-step-icon">
              <i class="fas fa-box-open"></i>
            </div>
            <div class="wizard-step-label">
              Form Registrasi Bimbel 
            </div>
          </div>
          <div class="wizard-step" id="transaksi">
            <div class="wizard-step-icon">
              <i class="fas fa-server"></i>
            </div>
            <div class="wizard-step-label">
              Pembayaran Bimbel
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if ($state == 0)
    <form class="wizard-content mt-2" action="<?= route('users.update', Auth::user()->id) ?>" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="wizard-pane">
        <div class="form-group row align-items-center">
          <label class="col-md-4 text-md-right text-left">Nama Lengkap</label>
          <div class="col-lg-4 col-md-6">
            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" disabled>
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-md-4 text-md-right text-left">Email</label>
          <div class="col-lg-4 col-md-6">
            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" disabled>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-4 text-md-right text-left mt-2">Alamat</label>
          <div class="col-lg-4 col-md-6">
            <textarea class="form-control" name="alamat"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-4 text-md-right text-left mt-2">Upload Photo</label>
          <div class="col-lg-4 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-4"></div>
          <div class="col-lg-4 col-md-6 text-right">
            <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </form>
    @endif

    @if ($state == 1)
    <form class="wizard-content mt-2" action="<?= route('registrasi.store') ?>" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="wizard-pane">
        <div class="form-group row align-items-center">
          <label class="col-md-4 text-md-right text-left">Nama</label>
          <div class="col-lg-4 col-md-6">
            <input type="text" name="nama" value="{{ Auth::user()->name }}" class="form-control" disabled>
            <input type="hidden" name="userID" value="{{ Auth::user()->id }}" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-4 text-md-right text-left mt-2">Alamat</label>
          <div class="col-lg-4 col-md-6">
            <textarea class="form-control" name="alamat" disabled>{{Auth::user()->alamat}}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-4 text-md-right text-left mt-2">Jenjang</label>
          <div class="col-lg-4 col-md-6">
            <select name="jenjang" class="form-control" id="pilihJenjang">
              <option value="">-- Pilih Jenjang --</option>
              @foreach ($jenjang as $j)
                  <option value="<?= $j->id ?>"><?= $j->jenjang ?></option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-4 text-md-right text-left mt-2">Kelas</label>
          <div class="col-lg-4 col-md-6">
            <select name="kelas" class="form-control" id="pilihKelas" disabled>
              <option value="">-- Pilih Kelas --</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-md-4 text-md-right text-left mt-2">Paket</label>
          <div class="col-lg-4 col-md-6">
            <select name="paket" class="form-control" id="pilihPaket" disabled>
              <option value="">-- Pilih Paket --</option>
            </select>
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-md-4 text-md-right text-left">Asal Sekolah</label>
          <div class="col-lg-4 col-md-6">
            <input type="text" placeholder="contoh : SMA/SMK Bina Sarana Informatika" name="sekolah" class="form-control">
          </div>
        </div>
      <div class="form-group row">
        <div class="col-md-4"></div>
        <div class="col-lg-4 col-md-6 text-right">
          <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
        </div>
      </div>
    </div>
  </form>
    @endif

    @if ($state == 2)
    <form class="wizard-content mt-2" action="<?= route('transaksi.store') ?>" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Hampir Selesai!</h4>
        <p>Silahkan lakukan pembayaran dengan melakukan transfer ke nomor rekening dibawah, setelah itu silahkan upload bukti transfer, kami akan konfirmasi pembayaran bila pembayaran telah di transfer dan mengupload bukti transfer.</p>
        <hr>
        <p class="mb-0">Terimakasih | TeenaBimbel</p>
      </div>
      <div class="wizard-pane">
        <div class="form-group row align-items-center">
          <label class="col-md-4 text-md-right text-left"></label>
          <div class="col-lg-4 col-md-6">
            <h2 id="noRek">-</h2>
            <p>Atas Nama : <strong>TeenaBimbel</strong></p>
            {{-- <p>Jumlah Uang yang harus di transfer : <strong>Rp. <?= $registrasi->harga ?></strong></p> --}}
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-md-4 text-md-right text-left">ATM</label>
          <div class="col-lg-4 col-md-6">
            <select name="rek" id="rek" class="form-control">
              <option value="">-- Pilih ATM --</option>
              <option value="BCA">BCA</option>
              <option value="MANDIRI">MANDIRI</option>
              <option value="BRI">BRI</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-4 text-md-right text-left mt-2">Upload Bukti</label>
          <div class="col-lg-4 col-md-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  {{-- data ID --}}
                  <input type="hidden" name="userID" value="<?= Auth::user()->id ?>">
                  <input type="hidden" name="registrasiID" value="<?= $registrasi->id ?>">
                  <input type="file" class="custom-file-input" name="bukti" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-md-4 text-md-right text-left">Atas Nama Rekening</label>
          <div class="col-lg-4 col-md-6">
            <input type="text" name="atasNama" class="form-control">
          </div>
        </div>
      <div class="form-group row">
        <div class="col-md-4"></div>
        <div class="col-lg-4 col-md-6 text-right">
          <button type="submit" class="btn btn-icon icon-right btn-primary">Selesai</button>
        </div>
      </div>
      <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Jenjang</th>
            <th scope="col">Kelas</th>
            <th scope="col">Asal Sekolah</th>
            <th scope="col">Jenis Paket</th>
            <th scope="col">Harga</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th><?= Auth::user()->name ?></th>
            <td><?= $registrasi->jenjang ?></td>
            <td><?= $registrasi->kelas ?></td>
            <td><?= $registrasi->asal_sekolah ?></td>
            <td><?= $registrasi->jenis_paket ?></td>
            <td>Rp. <?= $registrasi->harga ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>
    @endif

    @if ($state == 3)
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">Data telah dikonfirmasi!</h4>
      <p>Selamat !!, data pendaftaran anda telah kami konfirmasi, selanjutnya silahkan cetak Kartu Pendaftaran dan tunggu info selanjutnya melalui email</p>
      <hr>
      <p class="mb-0">Terimakasih | TeenaBimbel.</p>
    </div>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Jenjang</th>
          <th scope="col">Kelas</th>
          <th scope="col">Asal Sekolah</th>
          <th scope="col">Jenis Paket</th>
          <th scope="col">Status</th>
          @if ($transaksi->status == 1)
              <th scope="col">Kartu Pendaftaran</th>
          @endif
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><?= Auth::user()->name ?></th>
          <td><?= $registrasi->jenjang ?></td>
          <td><?= $registrasi->kelas ?></td>
          <td><?= $registrasi->asal_sekolah ?></td>
          <td><?= $registrasi->jenis_paket ?></td>
          <td>
            @if ($transaksi->status == 0)
              <span class="badge badge-warning">Menunggu Konfirmasi</span>
              @else
              <span class="badge badge-success">Berhasil Dikonfirmasi</span>
            @endif
          </td>
          @if ($transaksi->status == 1)
            <form action="<?= route('cetakPDF', $registrasi->id) ?>" method="post">
              @csrf
              <td><button type="submit" class="btn btn-primary">Cetak</button></td>
            </form>
          @endif
        </tr>
      </tbody>
    </table>
    </table>
    @endif
@endsection