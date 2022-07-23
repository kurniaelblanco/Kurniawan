<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="p-3 mb-2 text-black" style="background-color: #ADD8E6;">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2 class="my-2"> Ubah Data Novel </h2>


                <form action="/novel/update/<?= $novel['id']; ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="sampulLama" value="<?= $novel['sampul']; ?>">
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $novel['judul'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sipnosis" class="col-sm-2 col-form-label">Sipnosis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('sinopsis')) ? 'is-invalid' : ''; ?>" id="sinopsis" name="sinopsis" value="<?= (old('sinopsis')) ? old('sinopsis') : $novel['sinopsis'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sinopsis'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="karya" class="col-sm-2 col-form-label">Karya</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('karya')) ? 'is-invalid' : ''; ?>" id="karya" name="karya" value="<?= (old('karya')) ? old('karya') : $novel['karya'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('karya'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_halaman" class="col-sm-2 col-form-label">Jumlah Halaman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('jumlah_halaman')) ? 'is-invalid' : ''; ?>" id="jumlah_halaman" name="jumlah_halaman" value="<?= (old('jumlah_halaman')) ? old('jumlah_halaman') : $novel['jumlah_halaman'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_halaman'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('thn_terbit')) ? 'is-invalid' : ''; ?>" id="thn_terbit" name="thn_terbit" value="<?= (old('thn_terbit')) ? old('thn_terbit') : $novel['thn_terbit'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('thn_terbit'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('isbn')) ? 'is-invalid' : ''; ?>" id="isbn" name="isbn" value="<?= (old('isbn')) ? old('isbn') : $novel['isbn'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('isbn'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sampul" class="col-sm-2 col-form-label">Gambar Sampul</label>
                        <div class="col_sm-2">
                            <img src="/img/<?= $novel['sampul']; ?>" class="img-thumbnail img-preview">
                        </div>
                    </div>
            </div>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewIMG">
                    <div class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                    <label class="custom-file-label" for="sampul"><?= $novel['sampul']; ?></label>
                </div>
                <?= $validation->getError('sampul'); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
        </div>
        </form>

    </div>
</div>
</div>


<?= $this->endSection(); ?>