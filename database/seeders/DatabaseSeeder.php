<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with 6 records per table.
     */
    public function run(): void
    {
        // 1. Seed 6 BookTypes (IDs 1 to 6)
        $bookTypes = [
            ['BookTypeID' => 1, 'BookTypeName' => 'Programming'],
            ['BookTypeID' => 2, 'BookTypeName' => 'Networking'],
            ['BookTypeID' => 3, 'BookTypeName' => 'Database System'],
            ['BookTypeID' => 4, 'BookTypeName' => 'Mobile Development'],
            ['BookTypeID' => 5, 'BookTypeName' => 'Cyber Security'],
            ['BookTypeID' => 6, 'BookTypeName' => 'Artificial Intelligence'],
        ];

        foreach ($bookTypes as $bt) {
            BookType::updateOrCreate(['BookTypeID' => $bt['BookTypeID']], $bt);
        }

        // 2. Seed 6 Authors (IDs 1 to 6)
        $authors = [
            [
                'AuthorID'   => 1,
                'AuthorName' => 'Sok Pisal',
                'Gender'     => 'Male',
                'DOB'        => '1995-05-15',
                'POB'        => 'Phnom Penh',
                'Address'    => 'Phnom Penh, Cambodia',
                'Phone'      => '012345671',
                'Email'      => 'pisal@example.com',
                'Photo'      => 'pisal.jpg',
            ],
            [
                'AuthorID'   => 2,
                'AuthorName' => 'Chan Dara',
                'Gender'     => 'Male',
                'DOB'        => '1997-08-20',
                'POB'        => 'Siem Reap',
                'Address'    => 'Siem Reap, Cambodia',
                'Phone'      => '012345672',
                'Email'      => 'dara@example.com',
                'Photo'      => 'dara.jpg',
            ],
            [
                'AuthorID'   => 3,
                'AuthorName' => 'Keo Bopha',
                'Gender'     => 'Female',
                'DOB'        => '1999-02-10',
                'POB'        => 'Battambang',
                'Address'    => 'Battambang, Cambodia',
                'Phone'      => '012345673',
                'Email'      => 'bopha@example.com',
                'Photo'      => 'bopha.jpg',
            ],
            [
                'AuthorID'   => 4,
                'AuthorName' => 'Ly Vannak',
                'Gender'     => 'Male',
                'DOB'        => '1994-11-25',
                'POB'        => 'Kandal',
                'Address'    => 'Kandal, Cambodia',
                'Phone'      => '012345674',
                'Email'      => 'vannak@example.com',
                'Photo'      => 'vannak.jpg',
            ],
            [
                'AuthorID'   => 5,
                'AuthorName' => 'Chea Sophea',
                'Gender'     => 'Female',
                'DOB'        => '2000-04-12',
                'POB'        => 'Kampot',
                'Address'    => 'Kampot, Cambodia',
                'Phone'      => '012345675',
                'Email'      => 'sophea@example.com',
                'Photo'      => 'sophea.jpg',
            ],
            [
                'AuthorID'   => 6,
                'AuthorName' => 'Meas Rithy',
                'Gender'     => 'Male',
                'DOB'        => '1996-09-30',
                'POB'        => 'Takeo',
                'Address'    => 'Takeo, Cambodia',
                'Phone'      => '012345676',
                'Email'      => 'rithy@example.com',
                'Photo'      => 'rithy.jpg',
            ],
        ];

        foreach ($authors as $author) {
            Author::updateOrCreate(['AuthorID' => $author['AuthorID']], $author);
        }

        // 3. Seed 6 Books (IDs 1 to 6)
        $books = [
            [
                'BookID'      => 1,
                'BookTitle'   => 'Laravel API Development',
                'BookTypeID'  => 1,
                'PublishDate' => '2026-01-10',
                'NumOfPages'  => 320,
                'NumOfCopies' => 15,
                'Edition'     => '1st Edition',
                'Publisher'   => 'Phnom Penh Press',
                'BookSource'  => 'University Library',
                'Remark'      => 'Available',
            ],
            [
                'BookID'      => 2,
                'BookTitle'   => 'Computer Networking Essentials',
                'BookTypeID'  => 2,
                'PublishDate' => '2026-02-15',
                'NumOfPages'  => 410,
                'NumOfCopies' => 20,
                'Edition'     => '2nd Edition',
                'Publisher'   => 'Angkor Press',
                'BookSource'  => 'Purchase',
                'Remark'      => 'Available',
            ],
            [
                'BookID'      => 3,
                'BookTitle'   => 'MySQL Database Mastery',
                'BookTypeID'  => 3,
                'PublishDate' => '2026-03-01',
                'NumOfPages'  => 290,
                'NumOfCopies' => 25,
                'Edition'     => '1st Edition',
                'Publisher'   => 'CamTech Press',
                'BookSource'  => 'Donation',
                'Remark'      => 'Available',
            ],
            [
                'BookID'      => 4,
                'BookTitle'   => 'Flutter Mobile App Guide',
                'BookTypeID'  => 4,
                'PublishDate' => '2026-04-20',
                'NumOfPages'  => 360,
                'NumOfCopies' => 30,
                'Edition'     => '3rd Edition',
                'Publisher'   => 'Norton Press',
                'BookSource'  => 'University Library',
                'Remark'      => 'New Arrival',
            ],
            [
                'BookID'      => 5,
                'BookTitle'   => 'Ethical Hacking & Security',
                'BookTypeID'  => 5,
                'PublishDate' => '2026-05-12',
                'NumOfPages'  => 450,
                'NumOfCopies' => 10,
                'Edition'     => '1st Edition',
                'Publisher'   => 'Mekong Press',
                'BookSource'  => 'Purchase',
                'Remark'      => 'Reference Only',
            ],
            [
                'BookID'      => 6,
                'BookTitle'   => 'Machine Learning Fundamentals',
                'BookTypeID'  => 6,
                'PublishDate' => '2026-06-18',
                'NumOfPages'  => 500,
                'NumOfCopies' => 12,
                'Edition'     => '1st Edition',
                'Publisher'   => 'Phnom Penh Press',
                'BookSource'  => 'Donation',
                'Remark'      => 'Best Seller',
            ],
        ];

        foreach ($books as $book) {
            Book::updateOrCreate(['BookID' => $book['BookID']], $book);
        }

        // 4. Seed 6 BookAuthors (1-1, 2-2, 3-3, 4-4, 5-5, 6-6)
        $bookAuthors = [
            ['BookID' => 1, 'AuthorID' => 1, 'AuthorDate' => '2026-01-10', 'Remark' => 'Primary Author'],
            ['BookID' => 2, 'AuthorID' => 2, 'AuthorDate' => '2026-02-15', 'Remark' => 'Primary Author'],
            ['BookID' => 3, 'AuthorID' => 3, 'AuthorDate' => '2026-03-01', 'Remark' => 'Primary Author'],
            ['BookID' => 4, 'AuthorID' => 4, 'AuthorDate' => '2026-04-20', 'Remark' => 'Co-Author'],
            ['BookID' => 5, 'AuthorID' => 5, 'AuthorDate' => '2026-05-12', 'Remark' => 'Primary Author'],
            ['BookID' => 6, 'AuthorID' => 6, 'AuthorDate' => '2026-06-18', 'Remark' => 'Primary Author'],
        ];

        foreach ($bookAuthors as $ba) {
            BookAuthor::updateOrCreate(
                ['BookID' => $ba['BookID'], 'AuthorID' => $ba['AuthorID']],
                $ba
            );
        }
    }
}
