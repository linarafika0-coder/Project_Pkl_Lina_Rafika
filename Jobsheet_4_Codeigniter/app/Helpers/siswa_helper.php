
<?php

if (! function_exists('format_nama_siswa')) {
    function format_nama_siswa($nama)
    {
        return ucwords(strtolower($nama));
    }
}
