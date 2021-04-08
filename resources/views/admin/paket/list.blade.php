@extends('layouts/app2')
@section('title', 'List Data Paket')
@section('judul', 'Data Paket')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah">Tambah Paket</button>
                        <table class="table table-striped data">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jenis Paket</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($paket as $k)
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <th><?= $k->jenis_paket ?></th>
                                    <th><?= $k->deskripsi ?></th>
                                    <th><?= $k->harga ?></th>
                                    <th><?= $k->pertemuan_belajar ?></th>
                                    <th><?= $k->kelas ?></th>
                                    <th>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#edit<?= $k->id ?>">Edit</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $k->id ?>">Hapus</button>
                                    </th>
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

{{-- Modal Tambah --}}
<div class="modal fade" id="tambah" tabindex="-1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= route('paket.store') ?>" method="post">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Jenis Paket</label>
              <input type="text" class="form-control" name="jenis">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Harga</label>
                <input type="number" class="form-control" name="harga">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Jumlah Pertemuan</label>
                <input type="text" class="form-control" name="pertemuan">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Kelas</label>
                <select name="kelas" class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option value="<?= $k->id ?>"><?= $k->kelas ?></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  @foreach ($paket as $k)
  <!-- Modal -->
<div class="modal fade" id="hapus<?= $k->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= route('paket.destroy', $k->id) ?>" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body">
              <p>Hapus paket dengan jenis : <span class="badge badge-info"><?= $k->jenis_paket ?> ?</span></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

{{-- Modal Edit --}}
@foreach ($paket as $k)
<div class="modal fade" id="edit<?= $k->id ?>" tabindex="-1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= route('paket.update', $k->id) ?>" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Jenis Paket</label>
              <input type="text" value="<?= $k->jenis_paket ?>" class="form-control" name="jenis">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Deskripsi</label>
              <textarea name="deskripsi" value="<?= $k->deskripsi ?>" class="form-control" id="" cols="30" rows="10"><?= $k->deskripsi ?></textarea>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Harga</label>
                <input type="number" value="<?= $k->harga ?>" class="form-control" name="harga">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Jumlah Pertemuan</label>
                <input type="text" value="<?= $k->pertemuan_belajar ?>" class="form-control" name="pertemuan">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Kelas</label>
                <select name="kelas" class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option value="<?= $k->id ?>"><?= $k->kelas ?></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  @endforeach