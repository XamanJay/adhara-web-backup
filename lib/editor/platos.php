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
Editor::inst( $db, 'articulos','Id' ) 
    ->fields(
        Field::inst( 'Nombre' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'Stock' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'Precio' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'id_tema' )->validator( 'Validate::notEmpty' )
    )
    ->where( 'isDeleted', 0)
    ->where( 'Id_categoria', 4)
    ->process( $_POST )
    ->json();