<?= $this->extend("layout/template") ?>

<?= $this->section("main") ?>
<div class="container">
    <div class="row">
        <div class="col mt-10 border mt-5 p-2 rounded shadow">
            <h1>Create Siswa</h1>
            <form action="/home/create" method="post" enctype="multipart/form-data" >
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= isset($validation["name"]) ? "is-invalid" : "" ?>" id="name" value="<?= old("name") ?>" name="name" placeholder="Name Siswa">
                    <div class="invalid-feedback">
                        <?= isset($validation["name"]) ?  $validation["name"] : "" ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" value="<?= old("kelas") ?>" class="form-control" id="kelas" name="kelas" placeholder="kelas Siswa">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto Siswa</label>
                    <input class="form-control <?= isset($validation["img"]) ? "is-invalid" : "" ?>" type="file" name="img" id="formFile">
                    <div class="invalid-feedback">
                        <?= isset($validation["img"]) ? $validation["img"] : "" ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>