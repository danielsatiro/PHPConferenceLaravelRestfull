<?php

class Palestrante extends Eloquent {

	protected $table='palestrantes';
    protected $primaryKey = 'id_palestrantes';
    public $timestamps = true;
    protected $softDelete = true;
    protected $hidden = array('deleted_at', 'updated_at', 'created_at');
    protected $fillable = array('id_palestrantes', 'email', 'nome', 'sobre', 'foto');

    /*
	* Validate Palestrante data
	*
	* @param array $data Data of Palestrante
	* @param String $type Type of validation Create or Update
	*
	* @return Illuminate\Validation\Validator
	*/
    public static function validatePalestrante($data, $type = 'C'){	 
	    $rules = array(
	        'email' => 'email|unique:palestrantes',
	        'nome' => 'regex:/^([a-zà-úÀ-Ú\x20])+$/i',
	    );
	 
	    if ($type == 'U') :
	      $rules['id_palestrantes'] = 'required|integer|exists:palestrantes,id_palestrantes';
	      $rules['email'] = 'email|unique:palestrantes,email,' . $data['id_palestrantes'] . ',id_palestrantes';
	    endif;
	 
	    return Validator::make($data, $rules);
    }

    public static function createPalestrante($data){
    	
    }
}