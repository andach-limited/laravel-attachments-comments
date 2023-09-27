<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ID Type
    |--------------------------------------------------------------------------
    |
    | Specify whether the ID of the attachments and comments table should be
    | an integer or a UUID.
    |
    */

    'id_type' => env('ANDACH_ATTACHCOMMENT_ID_TYPE', 'int'),

    /*
    |--------------------------------------------------------------------------
    | Linkable ID Type
    |--------------------------------------------------------------------------
    |
    | Specify whether the ID of the attachable and commentable models should be
    | an integer or a UUID.
    |
    */

    'linkable_type' => env('ANDACH_ATTACHCOMMENT_LINKABLE_ID_TYPE', 'int'),

    /*
    |--------------------------------------------------------------------------
    | User ID Type
    |--------------------------------------------------------------------------
    |
    | Specify whether your user_id should be an integer or a UUID.
    |
    */

    'user_id_type' => env('ANDACH_ATTACHCOMMENT_USER_ID_TYPE', 'int'),

    /*
    |--------------------------------------------------------------------------
    | Set User ID on Create and Update
    |--------------------------------------------------------------------------
    |
    | Specify whether the user_id should be set automatically on create and
    | update. If set to false, you will need to set the user_id manually.
    |
    */

    'set_user_id_on_create' => env('ANDACH_ATTACHCOMMENT_SET_USER_ID_ON_CREATE', 'true'),

    'set_user_id_on_update' => env('ANDACH_ATTACHCOMMENT_SET_USER_ID_ON_UPDATE', 'true'),
];
