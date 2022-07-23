<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="p-3 mb-2 text-black" style="background-color: #ADD8E6;">
    <div class="container">
        <div class="row">
            <div class="col">

                <a href="/novel/create" class="btn btn-primary mt-3">Tambah Data Novel</a>
                <h1 class="mt-2">Daftar Novel</h1>
                <?php if (session()->getFlashdata('pesan')) : ?>

                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>



                <?php endif; ?>
                <table class="table table table-striped" style="background-color: #F0F8FF;" border="1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sampul</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Selengkapnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($novel as $k) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul" width="200"></td>
                                <td><?= $k['judul']; ?></td>
                                <td>
                                    <a href="/novel/<?= $k['judul']; ?>" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>