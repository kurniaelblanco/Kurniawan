<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="p-3 mb-2 text-black" style="background-color: #ADD8E6;">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-2">Detail Novel</h2>
                <div class="card mb-3" style="max-width: 800px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/img/<?= $novel['sampul']; ?>" width="200" style="padding: 5px;" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $novel['judul']; ?></h5>
                                <p class="card-text"><b>Sinopsis: </b> <?= $novel['sinopsis']; ?></p>
                                <p class="card-text"><b>Karya: </b> <?= $novel['karya']; ?></p>
                                <p class="card-text"><b>Jumlah Halaman: </b> <?= $novel['jumlah_halaman']; ?></p>
                                <p class="card-text"><b>Tahun Terbit: </b> <?= $novel['thn_terbit']; ?></p>
                                <p class="card-text"><b>ISBN: </b> <?= $novel['isbn']; ?></p>


                                <a href="/novel/edit/<?= $novel['judul']; ?>" class="btn btn-warning">Edit</a>

                                <form action="/novel/<?= $novel['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?'); ">Delete </button>

                                </form>

                                <br><br>
                                <a href="/novel"> Kembali ke List Novel</a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>