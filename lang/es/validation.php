<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'duenio' => [
            'required' => 'El dueño es requerido',
        ],
        'marcaVehiculo' => [
            'required' => 'La marca es requerida',
        ],
        'modeloVehiculo' => [
            'required' => 'El modelo es requerido',
        ],
        'anioVehiculo' => [
            'required' => 'El año es requerido',
            'digits_between' => 'El año debe tener 4 digitos',
        ],
        'precioVehiculo' => [
            'required' => 'El precio es requerido',
        ],
        'nombreUsuario' => [
            'required' => 'El nombre es requerido',
            'alpha' => 'El nombre debe contener solo letras',
            'max' => 'El nombre debe tener un largo maximo de 60'
        ],
        'apellidoUsuario' => [
            'required' => 'El apellido es requerido',
            'alpha' => 'El apellido debe contener solo letras',
            'max' => 'El apellido debe tener un largo maximo de 60'
        ],
        'correoUsuario' => [
            'required' => 'El correo es requerido',
            'email' => 'El correo debe tener el formato email@example.com'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
