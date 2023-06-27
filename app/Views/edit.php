<?= $this->extend("layout/template") ?>

<?= $this->section("main") ?>
<div class="container">
    <div class="row">
        <div class="col mt-10 border mt-5 p-2 rounded shadow">
            <h1>Edit Siswa <?= $siswa["name"] ?></h1>
            <form action="/home/edit/<?= $siswa["id"] ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="old_name" value="<?= $siswa["name"] ?>" > 
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= $validation && $validation->hasError("name") ? "is-invalid" : "" ?>"  id="name" value="<?= old("name") ?? $siswa["name"] ?>" name="name" placeholder="Name Siswa">
                    <div class="invalid-feedback">
                        <?= $validation ? $validation->getError("name") : ""?>
                    </div>
                </div>  
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text"  value="<?= old("kelas") ?? $siswa["kelas"] ?>" class="form-control" id="kelas" name="kelas" placeholder="kelas Siswa">
                </div>
                <button type="submit" class="btn btn-dark" >Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>