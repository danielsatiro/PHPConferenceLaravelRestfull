<?php

class PalestrasController extends BaseController {

	public function index() {
		$palestras = Palestra::listPalestras();
		return Response::json($palestras, 200);
	}

	public function show($idPalestras){
		$palestra = Palestra::getPalestra($idPalestras);
		return Response::json($palestra, 200);
	}

	public function store(){
		//recupera valores postados
		$data = Input::json()->all();
		$palestra = Palestra::createPalestra($data);

		return Response::json($palestra, $palestra['return_code']);
	}

	public function update($idPalestras){
		$data = Input::json()->all();
		$data['id_palestras'] = $idPalestras;
		$palestra = Palestra::updatePalestra($data);

		return Response::json($palestra, $palestra['return_code']);
	}

	public function destroy($idPalestras){
		$palestra = Palestra::deletePalestra($idPalestras);
		return Response::json($palestra, $palestra['return_code']);
	}
}