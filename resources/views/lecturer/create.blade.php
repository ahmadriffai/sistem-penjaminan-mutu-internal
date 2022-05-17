@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open(array('route' => 'lecturer.store','method'=>'POST')) !!}
                <div class="form-group">
                    <label for="nidn" class="font-weight-bolder">Nidn</label>
                    {!! Form::text('nidn', null, array('placeholder' => 'Masukan Nidn','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="text" class="font-weight-bolder">Nama</label>
                    {!! Form::text('name', null, array('placeholder' => 'Masukan Nama','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="alamat" class="font-weight-bolder">Alamat</label>
                    {!! Form::text('address', null, array('placeholder' => 'Masukan Alamat','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="jenisKelamin" class="font-weight-bolder">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="lakilaki">
                        <label class="form-check-label" for="jenisKelamin">
                            Laki-Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="perempuan">
                        <label class="form-check-label" for="jenisKelamin">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nomerHp" class="font-weight-bolder">Nomer Hp</label>
                    {!! Form::text('phone', null, array('placeholder' => 'Masukan Konfirmasi Nomer Hp','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="tanggalLahir" class="font-weight-bolder">Tanggal Lahir</label>
                    {!! Form::text('birthday', null, array('placeholder' => 'Masukan Tanggal Lahir','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="jabatan" class="font-weight-bolder">Jabatan</label>
                    {!! Form::text('name', null, array('placeholder' => 'Masukan Jabatan','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="prodi" class="font-weight-bolder">Prodi</label>
                    {!! Form::text('name', null, array('placeholder' => 'Masukan Prodi','class' => 'form-control')) !!}
                </div>
                <a href="{{ route('lecturer.index') }}" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn green text-white">Simpan</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
