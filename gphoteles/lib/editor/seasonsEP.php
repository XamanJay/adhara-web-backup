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
Editor::inst( $db, 'seasons','id' )
    ->fields(
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
                            //->set( Field::SET_EDIT ),
        Field::inst( 'triple' )->validator( 'Validate::notEmpty' ),

        Field::inst( 'cuadra' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'isDeleted' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'idRoom' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'idHotel' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'minStay' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'extra' )->validator( 'Validate::notEmpty' ))

    ->where( 'idRoom', 1 ) // Habitacion EP
    ->where( 'isDeleted', 0)
    ->on( 'preEdit', function ( $editor, $id, $values ) {
        $editor
            ->field( 'single' )
            ->setValue($values['single']+($values['single']*0.19));
          } )
    ->on( 'preEdit', function ( $editor, $id, $values ) {
        $editor
            ->field( 'doble' )
            ->setValue($values['single']+($values['single']*0.19));
          } )
    ->on('preEdit',function($editor, $id,$values){
        $editor
            ->field('triple')
            ->setValue($values['single']+$values['extra']+(($values['single']+$values['extra'])*0.19));
        })
    ->on('preEdit',function($editor, $id,$values){
        $editor
            ->field('cuadra')
            ->setValue($values['single']+(2*$values['extra'])+(($values['single']+(2*$values['extra']))*0.19));
        })
    ->on( 'preCreate', function ( $editor, $values ) {
        $editor
            ->field( 'single' )
            ->setValue($values['single']+($values['single']*0.19));
          } )
    ->on( 'preCreate', function ( $editor, $values ) {
        $editor
            ->field( 'doble' )
            ->setValue($values['single']+($values['single']*0.19));
          } )
    ->on('preCreate',function($editor,$values){
        $editor
            ->field('triple')
            ->setValue($values['single']+$values['extra']+(($values['single']+$values['extra'])*0.19));
        })
    ->on('preCreate',function($editor,$values){
        $editor
            ->field('cuadra')
            ->setValue($values['single']+(2*$values['extra'])+(($values['single']+(2*$values['extra']))*0.19));
        })
    ->on('preCreate',function($editor,$values){
        $editor
            ->field('isDeleted')
            ->setValue(0);
        })
    ->on('preCreate',function($editor,$values){
        $editor
            ->field('idRoom')
            ->setValue(1);
        })
    ->on('preCreate',function($editor,$values){
        $editor
            ->field('extra')
            ->setValue($values['extra']+($values['extra']*0.19));
    })
    ->on('preCreate',function($editor,$values){
        $editor
            ->field('idHotel')
            ->setValue(1);
    })
    ->on('preCreate',function($editor,$values){
        $editor
            ->field('minStay')
            ->setValue(1);
    })

    ->process( $_POST )
    ->json();

