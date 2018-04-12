<?php
/**
 * Created by Calenduck TEAM.
 * User: karin
 * Created at: 2018 - 04 - 11
 * Time: 08 : 38 : 37
 */

return [
    /************************************
     *              Home
     ************************************/
    'home'      =>  [
        'title' =>  'Home',
    ],

    'session'   =>  [
        'create' =>  [
            'title' =>  'Login',

            'form'  =>  [
                'label' =>  [
                    'email'         =>  'E-Mail',
                    'password'      =>  'Password',
                    'remember'      =>  'Remember Me',
                    'sign_up_link'  =>  'Sing Up Now ! ',
                ],

            ],

            'message'   =>  [
                'redirect_if_authenticated' =>  'You have logged in, without reoperation.'

            ],
        ],
    ],

    'user'      =>  [
        'index' =>  [
            'title' =>  'All Users',
        ],

        'show'  =>  [
            'title' =>  'Profile',
        ],

        'edit'  =>  [
            'title' =>  'Edit User Information',

            'form'  =>  [
                'label' =>  [
                    'username'              =>      'User Name',
                    'email'                 =>      'E-Mail',
                    'password'              =>      'Password',
                    'password_confirmation' =>      'Password(Confirmation)',
                    'update'                =>      'Update',
                ],
            ],

            'message'   =>  [
                'success'   =>  'The information was successfully updated.',
            ],
        ],

        'destroy'   =>  [
            'message'   =>  [
                'access_denied' =>  'This action is unauthorized! ',
                'success'       =>  'Delete user successful.',
                'failed'        =>  'Delete user failure.'
            ],


        ],
    ],
];