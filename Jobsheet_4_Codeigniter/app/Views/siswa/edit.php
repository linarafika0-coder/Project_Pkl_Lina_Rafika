
<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
Edit Data Siswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2>Form Edit Data Siswa</h2>

<form action="<?= base_url('siswa/update/' . $siswa['id']); ?>" method="post">

    <label>NIS</label><br>
    <input type="text" name="nis" value="<?= esc($siswa['nis']); ?>" required>
    <br><br>

    <label>Nama Siswa</label><br>
    <input type="text" name="nama" value="<?= esc($siswa['nama']); ?>" required>
    <br><br>

    <label>Kelas</label><br>
    <input type="text" name="kelas" value="<?= esc($siswa['kelas']); ?>" required>
    <br><br>

    <label>Jurusan</label><br>
    <input type="text" name="jurusan" value="<?= esc($siswa['jurusan']); ?>" required>
    <br><br>

    <label>Alamat</label><br>
    <textarea name="alamat" required><?= esc($siswa['alamat']); ?></textarea>
    <br><br>

    <button type="submit">Simpan Perubahan</button>

</form>

<br>
<a href="<?= base_url('siswa'); ?>">Kembali</a>

<?= $this->endSection() ?>
