<?php

class Palestra extends Eloquent {

	protected $table='palestras';
    protected $primaryKey = 'id_palestras';
    public $timestamps = true;
    protected $softDelete = true;
    protected $hidden = array('deleted_at', 'updated_at', 'created_at');
    protected $fillable = array('id_palestras', 'id_palestrantes', 'id_macro_temas', 'titulo', 'resumo', 'descricao', 'topicos', 'pre_requisitos', 'referencias_assunto', 'data', 'hora_inicio', 'hora_fim');

    public function palestrante(){
    	return $this->hasOne('Palestrante', 'id_palestrantes', 'id_palestrantes');
    }

    public function macroTema(){
    	return $this->hasOne('MacroTema', 'id_macro_temas', 'id_macro_temas');
    }

    /*
	* Validate Palestra data
	*
	* @param array $data Data of Palestra
	* @param String $type Type of validation Create or Update
	*
	* @return Illuminate\Validation\Validator
	*/
    public static function validatePalestra($data, $type = 'C'){	 
	    $rules = array(
	    	'id_palestrantes' => 'required|integer|exists:palestrantes,id_palestrantes',
	    	'id_macro_temas' => 'required|integer|exists:macro_temas,id_macro_temas',
	        'titulo' => 'required|regex:/^([a-zà-úÀ-Ú\x20])+$/i|unique:palestras',
	        'resumo' => 'required',
	        'descricao' => 'required',
	        'topicos' => 'required',
	        'pre_requisitos' => 'required',
	    );
	 
	    if ($type == 'U') :
	      $rules['id_palestras'] = 'required|integer|exists:palestras,id_palestras';
	    endif;
	 
	    return Validator::make($data, $rules);
    }

    public static function createPalestra($data){
    	$validate = self::validatePalestra($data);

    	$response = array();
    	if ($validate->fails()) {
    		$response['messages'] = $validate->messages()->toArray();
			$response['return_code'] = 406;
			return $response;
    	}

    	$palestra = new Palestra;
    	$palestra->fill($data);

    	if ($palestra->save()) {
    		$response['id_palestras'] = $palestra->id_palestras;
    		$response['return_code'] = 201;
    		return $response;
    	}
    }

    public static function updatePalestra($data){
    	$validate = self::validatePalestra($data, 'U');

    	$response = array();
    	if ($validate->fails()) {
    		$response['messages'] = $validate->messages()->toArray();
			$response['return_code'] = 406;
			return $response;
    	}

    	$palestra = self::find($data['id_palestras']);
    	unset($data['id_palestras']);

    	$palestra->fill($data);
    	if ($palestra->save()) {
    		$response['palestra'] = $palestra;
    		$response['return_code'] = 200;
    		return $response;
    	}
    }

    public static function deletePalestra($idPalestra){
    	$palestra = self::find($idPalestra);
    	$response = array();

    	if (!empty($palestra)) {
    		$response['sucesso'] = $palestra->delete();
    		$response['return_code'] = 200;
    		return $response;
    	} else {
    		$response['messages'] = 'Palestra não encontrada';
    		$response['return_code'] = 406;
    		return $response;
    	}
    }

    public static function listPalestras(){
    	$palestras = self::with('palestrante', 'macroTema')->get();
    	return $palestras;
    }

    public static function getPalestra($idPalestras){
    	$palestra = self::with('palestrante', 'macroTema')->find($idPalestras);
    	return $palestra;
    }
}