<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;

    protected $table = 'tblBookAuthor';
    protected $primaryKey = ['BookID', 'AuthorID'];
    public $incrementing = false;

    protected $fillable = [
        'BookID',
        'AuthorID',
        'AuthorDate',
        'Remark',
    ];

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('BookID', $this->getAttribute('BookID'))
                     ->where('AuthorID', $this->getAttribute('AuthorID'));
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'BookID', 'BookID');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'AuthorID', 'AuthorID');
    }
}
