
<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
Data Siswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2>Data Siswa</h2>

<!-- Form Pencarian -->
<div>
    <input
        type="text"
        id="keyword"
        placeholder="Cari NIS atau nama siswa..."
    >

    <button type="button" id="tombol-cari">Cari</button>
    <button type="button" id="tombol-reset">Reset</button>
</div>

<br>

<a href="<?= base_url('siswa/tambah'); ?>">
    + Tambah Data Siswa
</a>

<br><br>

<!-- Tabel Data Siswa -->
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody id="tabel-siswa">
        <?php $no = 1; ?>

        <?php foreach ($siswa as $row): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= esc($row['nis']); ?></td>
            <td><?= esc(format_nama_siswa($row['nama'])); ?></td>
            <td><?= esc($row['kelas']); ?></td>
            <td><?= esc($row['jurusan']); ?></td>
            <td><?= esc($row['alamat']); ?></td>

            <td>
                <a href="<?= base_url('siswa/edit/' . $row['id']); ?>">
                    Edit
                </a>

                <a href="<?= base_url('siswa/hapus/' . $row['id']); ?>"
                   class="tombol-hapus">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Pagination -->
<div style="margin-top: 20px;">
    <?= $pager->links(); ?>
</div>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>

<script>

// SweetAlert untuk tombol Hapus
$(document).on('click', '.tombol-hapus', function(event) {
    event.preventDefault();

    const url = $(this).attr('href');

    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: 'Data siswa akan dihapus!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#198754',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
});


// jQuery Ajax untuk pencarian
$(document).ready(function() {

    function cariSiswa(keyword) {

        $.ajax({
            url: "<?= base_url('siswa/cari'); ?>",
            type: "GET",

            data: {
                keyword: keyword
            },

            dataType: "json",

            success: function(data) {

                let baris = '';

                if (data.length > 0) {

                    $.each(data, function(no, siswa) {

                        baris += '<tr>';

                        baris += '<td>' + (no + 1) + '</td>';
                        baris += '<td>' + $('<div>').text(siswa.nis).html() + '</td>';
                        baris += '<td>' + $('<div>').text(siswa.nama).html() + '</td>';
                        baris += '<td>' + $('<div>').text(siswa.kelas).html() + '</td>';
                        baris += '<td>' + $('<div>').text(siswa.jurusan).html() + '</td>';
                        baris += '<td>' + $('<div>').text(siswa.alamat).html() + '</td>';

                        baris += '<td>';
                        baris += '<a href="<?= base_url('siswa/edit/'); ?>' + siswa.id + '">Edit</a> ';

                        baris += '<a href="<?= base_url('siswa/hapus/'); ?>' + siswa.id + '" class="tombol-hapus">Hapus</a>';

                        baris += '</td>';
                        baris += '</tr>';
                    });

                } else {

                    baris = '<tr><td colspan="7">Data tidak ditemukan</td></tr>';

                }

                $('#tabel-siswa').html(baris);
            },

            error: function() {
                alert('Terjadi kesalahan saat mengambil data.');
            }
        });
    }


    // Tombol Cari
    $('#tombol-cari').click(function() {
        cariSiswa($('#keyword').val());
    });


    // Tombol Reset
    $('#tombol-reset').click(function() {
        $('#keyword').val('');
        cariSiswa('');
    });

});

</script>

<?= $this->endSection() ?>
