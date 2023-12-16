<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PendingBooks extends Model
{
    use HasFactory;
    protected $fillable = [
        'idBook',
        'studID',
        'studName',
        'status',
        'bookTitle',
        'publisher',
        'date_borrowed',
        'date_returned'
        // Add other fields as needed
    ];
    // PendingBooks.php model
public function user()
{
    return $this->belongsTo(User::class, 'studID', 'id');
}



}
