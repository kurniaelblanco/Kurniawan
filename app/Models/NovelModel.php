<?php

namespace App\Models;

use CodeIgniter\Model;

class NovelModel extends Model
{
    protected $table   = 'novel';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'sinopsis', 'karya', 'jumlah_halaman', 'thn_terbit', 'isbn', 'sampul'];

    public function getnovel($judul = false)
    {
        if ($judul == false) {
            return $this->findAll();
        }

        return $this->where(['judul' => $judul])->first();
    }
}
