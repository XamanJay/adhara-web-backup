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
Editor::inst( $db, 'pagodestino','id' )
    ->fields(

        Field::inst( 'pagodestino.id' )->validator( 'Validate::notEmpty'),
        Field::inst( 'pagodestino.referencia' )->validator( 'Validate::notEmpty'),
        Field::inst( 'pagodestino.sitio' )
            ->options( Options::inst()
                ->table('hotels')
                ->value('id')
                ->label('name')
                )
            ->validator( 'Validate::dbValues' ),
        Field::inst('hotels.name')
            ->set( false ),
        Field::inst( 'pagodestino.startDate' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
        Field::inst( 'pagodestino.endDate' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ))
    ->where( 'pagodestino.isDeleted', 0)
    ->leftJoin( 'hotels', 'hotels.id', '=', 'pagodestino.sitio' )
    ->process( $_POST )
    ->json();
