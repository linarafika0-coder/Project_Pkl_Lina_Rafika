<?php
namespace App\Controllers;
use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    // Menampilkan data siswa, pencarian, dan pagination
    public function index()
    {
        helper('siswa');
        $keyword = $this->request->getGet('keyword');

        $builder = $this->siswaModel;

        if ($keyword) {
            $builder = $builder->groupStart()
                ->like('nis', $keyword)
                ->orLike('nama', $keyword)
                ->orLike('kelas', $keyword)
                ->orLike('jurusan', $keyword)
                ->groupEnd();
        }

        $data['siswa'] = $builder->paginate(5);
        $data['pager'] = $builder->pager;
        $data['keyword'] = $keyword;

        return view('siswa/index', $data);
    }

    // Menampilkan form tambah
    public function tambah()
    {
        return view('siswa/tambah');
    }

    // Menyimpan data siswa
    public function simpan()
    {
        $this->siswaModel->insert([
            'nis'     => $this->request->getPost('nis'),
            'nama'    => $this->request->getPost('nama'),
            'kelas'   => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
            'alamat'  => $this->request->getPost('alamat')
        ]);

        return redirect()->to('/siswa');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data['siswa'] = $this->siswaModel->find($id);

        return view('siswa/edit', $data);
    }

    // Memperbarui data siswa
    public function update($id)
    {
        $this->siswaModel->update($id, [
            'nis'     => $this->request->getPost('nis'),
            'nama'    => $this->request->getPost('nama'),
            'kelas'   => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
            'alamat'  => $this->request->getPost('alamat')
        ]);

        return redirect()->to('/siswa');
    }

    // Menghapus data siswa
    public function hapus($id)
    {
        $this->siswaModel->delete($id);

        return redirect()->to('/siswa');
    }
    // Pencarian data menggunakan Ajax
public function cari()
{
    $keyword = $this->request->getGet('keyword');

    $siswa = [];

    if ($keyword) {
        $siswa = $this->siswaModel
            ->groupStart()
            ->like('nis', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('kelas', $keyword)
            ->orLike('jurusan', $keyword)
            ->groupEnd()
            ->findAll();
    } else {
        $siswa = $this->siswaModel->findAll();
    }

    return $this->response->setJSON($siswa);
}
}
