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
Editor::inst( $db, 'reservations','id' )
    ->fields(
        Field::inst( 'reservations.id' )->validator( 'Validate::notEmpty'),
        Field::inst( 'reservations.idClient' )
            ->options( Options::inst()
                ->table('huespedes')
                ->value('id')
                ->label(array('nombre','apellido','isClub','correo'))
                ),
        Field::inst('huespedes.nombre'),
        Field::inst('huespedes.apellido'),
        Field::inst('huespedes.isClub'),
        Field::inst('huespedes.correo'),
        Field::inst('reservations.idTransaction')
            ->options( Options::inst()
                ->table('transactions')
                ->value('id')
                ->label(array('price','costoProv','currency','formaPago','cardType','estatus'))
                ),
        Field::inst('transactions.price'),
        Field::inst('transactions.costoProv'),
        Field::inst('transactions.currency'),
        Field::inst('transactions.formaPago'),
        Field::inst('transactions.cardType'),
        Field::inst('transactions.estatus'),
        Field::inst( 'reservations.dateFrom' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
        Field::inst( 'reservations.dateTo' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
        Field::inst('reservations.servicio')
            ->validator('Validate::notEmpty'),
        Field::inst('reservations.responsable')
            ->validator('Validate::notEmpty'),
        Field::inst('reservations.idOpera')
            ->validator('Validate::notEmpty'),
        Field::inst('reservations.hotel')
            ->validator('Validate::notEmpty'))
    ->where( 'reservations.isDeleted', 0)
    ->leftJoin( 'huespedes', 'huespedes.id', '=', 'reservations.idClient' )
    ->leftJoin( 'transactions', 'transactions.id', '=', 'reservations.idTransaction')
    ->where( 'reservations.dateFrom',date("Y-m-d H:i:s", mktime(0, 0, 0, 7, 1, 2017)), ">=")
    ->process( $_POST )
    ->json();
