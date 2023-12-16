<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenEd extends Model
{
    use HasFactory;

    protected $table = 'gen_eds';

    protected $fillable = [
        'accession_num',
        'call_num',
        'title',
        'publisher',
        'author',
        'category',
        'image'
    ];


}
