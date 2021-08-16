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
Editor::inst( $db, 'seasonspromo','id' )
    ->fields(
        Field::inst( 'idRoom' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'startDate' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
        Field::inst( 'endDate' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
        Field::inst( 'single' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'doble' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'triple' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'cuadra' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'extra' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'mealAdults' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'mealKids' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'idHotel' ))
        
    ->where( 'isDeleted', 0)
    ->where( 'idHotel', 1)
    ->process( $_POST )
    ->json();