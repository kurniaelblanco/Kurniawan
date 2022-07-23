<?php

namespace App\Controllers;

use App\Models\NovelModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class novel extends BaseController
{
    protected $novelModel;
    public function __construct()
    {
        $this->novelModel = new NovelModel();
    }
    public function index()
    {


        $data = [
            'title' => 'Daftar Novel',
            'novel'  => $this->novelModel->getnovel()
        ];



        return view('novel/index', $data);
    }
    public function detail($judul)
    {
        $data = [
            'title' => 'Detail Novel',
            'novel'  => $this->novelModel->getnovel($judul)
        ];

        //jika novel tidak ada di tabel
        if (empty($data['novel'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Novel ' . $judul . ' 
            tidak ditemukan.');
        }

        return view('novel/detail', $data);
    }

    public function create()
    {
        //session();
        $data = [
            'title' => 'Form Tambah Data Novel',
            'validation' => \Config\Services::validation()
        ];

        return view('novel/create', $data);
    }

    public function save()
    {

        //validasi data input

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[novel.judul]',
                'errors' => [
                    'required' => '{field} novel harus diisi',
                    'is_unique' => '{field} novel sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,4024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda upload bukan gambar',
                    'mime_in'  => 'File yang anda upload bukan gambar'

                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/novel/create')->withInput()->with('validation', $validation);
            return redirect()->to('/novel/create')->withInput();
        }

        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');

        // jika tidak ada upload gambar
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // pindahkan file gambar ke folder img
            $fileSampul->move('img');

            // ambil nama file gambar
            $namaSampul = $fileSampul->getName();
        }



        $this->novelModel->save([
            'judul' => $this->request->getVar('judul'),
            'sipnosis' => $this->request->getVar('sinopsis'),
            'karya' => $this->request->getVar('karya'),
            'jumlah_halaman' => $this->request->getVar('jumlah_halaman'),
            'thn_terbit' => $this->request->getVar('thn_terbit'),
            'isbn' => $this->request->getVar('isbn'),
            'sampul' => $namaSampul

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/novel');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $novel = $this->novelModel->find($id);

        // cek jika gambarnya default
        if ($novel['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $novel['sampul']);
        }

        $this->novelModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/novel');
    }

    public function edit($judul)
    {
        $data = [
            'title' => 'Form Ubah Data Novel',
            'validation' => \Config\Services::validation(),
            'novel' => $this->novelModel->getnovel($judul)
        ];

        return view('novel/edit', $data);
    }

    public function update($id)
    {
        //cek judul
        //$novellama = $this->novelModel->getnovel($this->request->getVar('judul'));
        //if ($novellama['judul'] == $this->request->getVar('judul')) {
        //    $rule_judul = 'required';
        //} else {
        //    $rule_judul = 'required|is_unique[novel.judul]';
        //}

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[novel.judul,' . $id . ']',
                'errors' => [
                    'required' => '{field} novel harus diisi',
                    'is_unique' => '{field} novel sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,4024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda upload bukan gambar',
                    'mime_in'  => 'File yang anda upload bukan gambar'

                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/novel/edit/' . $this->request->getVar(('judul')))->withInput()->with('validation', $validation);
            return redirect()->to('/novel/edit/' . $this->request->getVar(('judul')))->withInput();
        }

        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');

        // cek apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // ambil nama file gambar
            $namaSampul = $fileSampul->getName();

            // pindahkan file gambar ke folder img
            $fileSampul->move('img');

            // hapus sampul lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }


        $this->novelModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'karya' => $this->request->getVar('karya'),
            'jumlah_halaman' => $this->request->getVar('jumlah_halaman'),
            'thn_terbit' => $this->request->getVar('thn_terbit'),
            'isbn' => $this->request->getVar('isbn'),
            'sampul' => $namaSampul

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/novel');
    }
}
