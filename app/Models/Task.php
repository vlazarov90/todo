<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var array
     */
    protected $fillable = [
        'text',
        'completed'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'completed' => false
    ];
}
