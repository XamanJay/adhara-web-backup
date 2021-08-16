<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include("DataTables.php");
 
// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;
 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'tema','Id' ) 
    ->fields(
        Field::inst( 'Nombre' )->validator( 'Validate::notEmpty' )
    )
    ->where( 'isDeleted', 0)
    ->process( $_POST )
    ->json();


/*    // Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'users','Id' )
->fields(
    Field::inst( 'users.Email' )->validator( 'Validate::notEmpty' ),
    Field::inst( 'personas.Nombre' ),
    Field::inst( 'personas.Apellido_paterno' ),
    Field::inst( 'clientes.NumeroSocio' ),
    Field::inst( 'clientes.Puntos' ))
->leftJoin( 'personas', 'personas.Id', '=', 'users.Id' )
->leftJoin( 'clientes', 'clientes.Id', '=', 'users.Id' )
->process( $_POST )
->json();*/