<?php

class MacroTema extends Eloquent {

	protected $table='macro_temas';
    protected $primaryKey = 'id_macro_temas';
    public $timestamps = true;
    protected $softDelete = true;
    protected $hidden = array('deleted_at', 'updated_at', 'created_at');
    protected $fillable = array('id_macro_temas', 'macro_tema');
}