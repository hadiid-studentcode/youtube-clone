<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    protected $primaryKey = 'id';

    protected $fillable = [
        'fullname',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'foto',
    ];

    public function savePerson($data)
    {
        return Person::create($data);
    }

    public function getPersonLastId()
    {
        return Person::latest('id')->value('id');
    }

    public function getPersonFirst($id_person)
    {
        return Person::where('id', $id_person)->first();
    }
}
