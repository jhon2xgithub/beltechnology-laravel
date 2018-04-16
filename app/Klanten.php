<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Klanten extends Model
{
    // Mass Assignment
    // assign the affected fileds during insert
    // protected $fillable = ['company_name', 'company_street', 'company_number', 'company_country', 'company_city', 'company_zip', 'ban', 'vn', 'company_email', 'company_telephone', 'company_general_fax', 'company_sector', 'contact_first_name', 'contact_lastname', 'contact_email', 'contact_telephone', 'contact_function', 'contact_person_last_name.*', 'contact_person_first_name.*', 'contact_person_function.*', 'contact_person_email.*', 'contact_person_telephone.*'];

    // protected $hidden = ['company_general_fax', 'company_sector', 'contact_first_name', 'contact_lastname', 'contact_email', 'contact_telephone', 'contact_function', 'contact_person_last_name.*', 'contact_person_first_name.*', 'contact_person_function.*', 'contact_person_email.*', 'contact_person_telephone.*'];

    // protected $guarded = ['_token'];

}

