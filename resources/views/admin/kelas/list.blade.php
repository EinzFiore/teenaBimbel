@extends('layouts/app2')
@section('title', 'List Data Jenjang')
@section('judul', 'Data Jenjang')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped data">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kelas as $k)
                                <tr>
                                    <th><?= $no++ ?></th>
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

@foreach ($kelas as $k)
<!-- Modal -->
<div class="modal fade" id="edit<?= $k->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?= route('kelas.update', $k->id) ?>" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="kelas" value="<?= $k->kelas ?>" class="form-control" required>
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
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

@foreach ($kelas as $k)
<!-- Modal -->
<div class="modal fade" id="hapus<?= $k->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Hapus Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?= route('kelas.destroy', $k->id) ?>" method="post">
                @csrf
                @method('DELETE')
                <p>Yakin hapus data kelas <span class="badge badge-info"><?= $k->kelas ?></span> ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
@endforeach