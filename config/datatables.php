<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DataTables Namespace
    |--------------------------------------------------------------------------
    |
    | This value determines the root namespace of your DataTables classes.
    | If you modify this value, make sure to re-publish the DataTables
    | assets to reflect your changes.
    |
    */

    'namespace' => 'App\\DataTables\\',

    /*
    |--------------------------------------------------------------------------
    | DataTables Searchable Column Method
    |--------------------------------------------------------------------------
    |
    | This value determines the method that should be used to apply a search
    | query to a DataTable. The default value is "where" which is a standard
    | Eloquent query. Other options include "having" and "scope".
    |
    */

    'search' => 'where',

    /*
    |--------------------------------------------------------------------------
    | DataTables Buttons
    |--------------------------------------------------------------------------
    |
    | Here you can define the default DataTables buttons configuration. These
    | values will be merged with any button-specific configuration defined
    | within your individual DataTables classes.
    |
    */

    'buttons' => [
        'export',
        'create',
        'reload',
    ],

    // Autres configurations...

];
