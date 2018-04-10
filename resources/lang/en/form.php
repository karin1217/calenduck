<?php
/**
 * Created by Calenduck TEAM.
 * User: karin
 * Created at: 2018 - 04 - 06
 * Time: 15 : 26 : 00
 */


return [
    /** SignUp Form **/
    'label'                     =>  [
        'username'              =>      'User Name',
        'email'                 =>      'E-Mail',
        'password'              =>      'Password',
        'password_confirmation' =>      'Password(Confirmation)',
        'signup'                =>      'Sign Up',
        'remember'              =>      'Remember me',
    ],

    'hint'                      =>  [
        'between'               =>      [
            'numeric'           =>      'The :attribute must be between :min and :max.',
            'file'              =>      'The :attribute must be between :min and :max kilobytes.',
            'string'            =>      'The :attribute must be between :min and :max characters.',
            'array'             =>      'The :attribute must have between :min and :max items.',
        ],
        'email'                 =>      'The :attribute must be a valid email address.',
        'password'              =>      'The :attribute more than :min alphanumeric characters.',
        'confirm'               =>      'Enter the same contents with the :other.',
    ],

    'bottom'                    =>  [
        'have_no_account'       =>      'Sinup Now!',
    ],


];