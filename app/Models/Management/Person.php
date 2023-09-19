<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;

const TIPO_CONTACTO_COREO = 37; 
const TIPO_CONTACTO_TELEFONO = 38;

class Person extends Model
{
    //
    public $table = "persons";
    
    public function getFullnameAttribute(){

        return "{$this->socialreason} {$this->firstname} {$this->othernames} {$this->lastname} {$this->otherlastname}";
        
    }

    public function getIdentificationAttribute(){
        $return = "{$this->TypeDocument->code} {$this->numberdocument}";
        if ($this->typeperson_id == '3')
            $return .= '-'.$this->digitcheck;
        return $return;
    }

    public function getAgeAttribute(){
        return $this->age = \Carbon\Carbon::parse(substr($this->birthdate, 0, 10))->age;
    }

    public function TypePerson(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typeperson_id');
    }

    public function TypeDocument(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typedocument_id');
    }
    
    public function Location()
    {
        return $this->hasMany('App\Models\Management\Address')->where('status',1);
    }

    public function ContactEmail()
    {
        return $this->hasMany('App\Models\Management\Contact')->where('type_id', '=', TIPO_CONTACTO_COREO )->where('status',1);
    }
    
    public function ContactPhone()
    {
        return $this->hasMany('App\Models\Management\Contact')->where('type_id', '=', TIPO_CONTACTO_TELEFONO )->where('status',1);
    }
    public function getEmailAttribute(){
        $email = Contact::where('person_id',$this->id)
            ->where('type_id',37)->value('textcontact');

        return $email;
    }
    
}
