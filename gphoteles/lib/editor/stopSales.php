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
Editor::inst( $db, 'stopsale','id' )
    ->fields(
        //Field::inst( 'idRoom' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'stopsale.idRoom' )
            ->options( Options::inst()
                ->table('rooms')
                ->value('id')
                ->label('description')
                )
            ->validator( 'Validate::dbValues' ),
        Field::inst('rooms.description')
            ->set( false ),
        Field::inst( 'stopsale.startDate' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
        Field::inst( 'stopsale.endDate' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
        Field::inst( 'stopsale.isDeleted' )->validator( 'Validate::notEmpty' ))

    ->where( 'stopsale.isDeleted', 0)
    ->on( 'preCreate', function ( $editor, $values ) {
        $editor
            ->field( 'stopsale.isDeleted' )
            ->setValue(0);
          } )
    ->leftJoin( 'rooms', 'rooms.id', '=', 'stopsale.idRoom' )
    ->process( $_POST )
    ->json();