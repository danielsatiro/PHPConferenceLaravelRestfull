<?php

class PalestrasController extends BaseController {

	public function index() {
		$palestras = Palestra::listPalestras();
		return Response::json($palestras, 200);
	}

	public function show($idPalestras){

	}

	public function store(){

	}

	public function update($idPalestras){

	}

	public function destroy(){

	}
}