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
Editor::inst( $db, 'rooms','id' )
    ->fields(

        Field::inst( 'id' )->validator( 'Validate::notEmpty'),
        Field::inst( 'description' )->validator( 'Validate::notEmpty'),
        Field::inst( 'capMax' )->validator( 'Validate::notEmpty'),
        Field::inst( 'quantity' )->validator( 'Validate::notEmpty'),
        Field::inst( 'kidsAllow' )->validator( 'Validate::notEmpty' ))
    ->where( 'isDeleted', 0)
    ->process( $_POST )
    ->json();
