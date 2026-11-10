
<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
Tambah Data Siswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2>Form Tambah Data Siswa</h2>

<form action="<?= base_url('siswa/simpan'); ?>" method="post">

    <label>NIS</label><br>
    <input type="text" name="nis" required>
    <br><br>

    <label>Nama Siswa</label><br>
    <input type="text" name="nama" required>
    <br><br>

    <label>Kelas</label><br>
    <input type="text" name="kelas" required>
    <br><br>

    <label>Jurusan</label><br>
    <input type="text" name="jurusan" required>
    <br><br>

    <label>Alamat</label><br>
    <textarea name="alamat" required></textarea>
    <br><br>

    <button type="submit">Simpan Data</button>

</form>

<br>
<a href="<?= base_url('siswa'); ?>">Kembali</a>

<?= $this->endSection() ?>
