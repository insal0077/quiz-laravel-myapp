<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'tblAuthor';
    protected $primaryKey = 'AuthorID';

    protected $fillable = [
        'AuthorName',
        'Gender',
        'DOB',
        'POB',
        'Address',
        'Phone',
        'Email',
        'Photo',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'tblBookAuthor', 'AuthorID', 'BookID')
            ->withPivot('AuthorDate', 'Remark')
            ->withTimestamps();
    }

    public function bookAuthors()
    {
        return $this->hasMany(BookAuthor::class, 'AuthorID', 'AuthorID');
    }
}

