@extends('layouts/app2')
@section('title', 'List Data Jenjang')
@section('judul', 'Data Jenjang')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahJenjang">Tambah Jenjang</button>
                        <button class="btn btn-info mb-2" data-toggle="modal" data-target="#tambahKelas">Tambah Kelas</button>
                        <table class="table table-striped data">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jenjang</th>
                                    <th scope="col">Kelas</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($jenjang as $j)
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <th><?= $j->jenjang ?></th>
                                    <th>
                                        <form action="<?= route('jenjang.kelas', $j->id) ?>" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-info">Lihat Daftar Kelas</button>
                                        </form>
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
<!-- Modal -->
<div class="modal fade" id="tambahJenjang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jenjang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?= route('jenjang.store') ?>" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="jenjang" class="form-control">
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

<!-- Modal -->
<div class="modal fade" id="tambahKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?= route('kelas.store') ?>" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="kelas" class="form-control" required>
                </div>
                <div class="form-group">
                    <select name="jenjang" class="form-control" required>
                        <option value="">-- Pilih Jenjang --</option>
                        @foreach ($jenjang as $j)
                            <option value="<?= $j->id ?>"><?= $j->jenjang ?></option>
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