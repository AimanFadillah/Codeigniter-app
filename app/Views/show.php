<?= $this->extend("layout/template") ?>

<?= $this->section("main") ?>

<div class="container">
    <div class="row p-5">
        <div class="cop-md-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $siswa["img "] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $siswa["name"] ?></h5>
                            <p class="card-text"><small class="text-body-secondary"><?= $siswa["kelas"] ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>