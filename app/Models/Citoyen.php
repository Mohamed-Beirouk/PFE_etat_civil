<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;




class Citoyen extends Authenticatable
{
    use HasFactory;
     protected $guarded = ['id'];
    protected $guard = 'citoyen';
   
    protected $fillable = [
        'nni',
        'password',
        'prenom',
        'nom',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'nationalite',
        'nni_pere',
        'nni_mere',
        

        
    ];
   
    public function getAuthPassword()
    {
     return $this->password;
    }
     public function dece()
    {
        return $this->hasOne(Dece::class);
    }
    public function naissance()
    {
        return $this->hasOne(Naissance::class);
    }
    public function mariage()
    {
        return $this->hasOne(Mariage::class);
    }
     public function divorce()
    {
        return $this->hasOne(Divorce::class);
    }
     public function rdvs()
    {
        return $this->hasMany(Rdv::class,'citoyen_id');
    }
     public function dossiers()
    {
        return $this->hasMany(Rdv::class);
    }
}
