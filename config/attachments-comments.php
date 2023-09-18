<?php

return [
    // Either "int" or "uuid".
    'user_id_type' => env('ANDACH_ATTACHCOMMENT_USER_ID_TYPE', 'int'),

    'set_user_id_on_create' => env('ANDACH_ATTACHCOMMENT_SET_USER_ID_ON_CREATE', 'true'),

    'set_user_id_on_update' => env('ANDACH_ATTACHCOMMENT_SET_USER_ID_ON_UPDATE', 'true'),
];
