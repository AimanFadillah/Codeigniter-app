<?= $this->extend("layout/template") ?>

<?= $this->section("main") ?>

<div class="container mt-5">
    <div class="row justify-content-center mb-2">
        <div class="col-md-10">
            <a href="/home/create" class="btn btn-primary shadow">Create Siswa</a>
        </div>
    </div>
    <?php if (session()->getFlashdata("pesan")) : ?>
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata("pesan") ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table text-center border shadow">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">kelas</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $loop = 1 ?>
                    <?php foreach ($dataSiswa as $siswa) : ?>
                        <tr>
                            <th scope="row"><?= $loop++ ?></th>
                            <td><a href="/home/<?= $siswa["name"] ?>" class="text-decoration-none text-dark"><?= $siswa["name"] ?></a></td>
                            <td><?= $siswa["kelas"] ?></td>
                            <td>
                                <form class="d-inline" action="/home/<?= $siswa["id"] ?>" method="post">
                                    <input type="hidden" name="_method" value="DELETE" >
                                    <?= csrf_field() ?>
                                    <button class="badge bg-danger" style="border:none"><i class="bi bi-trash3"></i></button>
                                </form>    
                                <a href="/home/edit/<?= $siswa["name"] ?>" class="badge bg-primary"><i class="bi bi-pencil-square"></i></a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?= $this->endSection() ?>