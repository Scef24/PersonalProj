<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBooks extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_reserved' => 'datetime',
        'date_borrowed' => 'datetime',
        'date_returned' => 'datetime',
    ];

    // Other model properties and methods...

    /**
     * Get the format for database stored dates.
     *
     * @return string
     */


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // Other fillable attributes...
        'date_reserved',
        'date_borrowed',
        'date_returned',

    ];
}
