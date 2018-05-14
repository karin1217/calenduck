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

        'top_menu'  =>  [
            'wish_list'         =>  'Wish List',
            'my_account'        =>  [
                'title'         =>  'My Account',
                'sub'           =>  [
                    'list'      =>  'Users List',
                    'login'     =>  'Login',
                    'logout'    =>  'Logout',
                    'profile'   =>  'Profile',
                    'update'    =>  'Update',
                    'help'      =>  'Help',
                ],
            ],

            'shopping_cart' =>  'Shopping Cart',
            'check_out'     =>  'Check Out',
        ],

        'nav'  =>  [
            'home'          =>  'Home',
            'shops'         =>  'Shops List',
            'categories'    =>  'Categories',
            'gallery'       =>  'Gallery',
            'blog'          =>  'Blog',
            'contact'       =>  'Contact',
        ],
    ],

    'session'   =>  [
        'create' =>  [
            'title' =>  'Login',

            'form'  =>  [
                'label' =>  [
                    'email'         =>  'E-Mail',
                    'password'      =>  'Password',
                    'forgot'        =>  'Forgot password',
                    'captcha'       =>  'Captcha',
                    'remember'      =>  'Remember Me',
                    'sign_up_link'  =>  'Sing Up Now ! ',
                ],

            ],

            'message'   =>  [
                'redirect_if_authenticated' =>  'You have logged in, without reoperation.',
            ],
        ],

        'store' =>  [
            'message'   =>  [
                'unactivated'   =>  'Your account is not activated. Please check the registered mail for activation.',
                'success'       =>  'Welcome back!',
                'failed'        =>  'Sorry, your password does not match the account!',
            ],
        ],
    ],

    'user'      =>  [
        'index' =>  [
            'title' =>  'All Users',
        ],

        'create'    =>  [
            'title' =>  'Sign Up',
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
                    'update'                =>      'Save',
                    'introduction'          =>      'Introduction',
                ],
            ],

            'message'   =>  [
                'success'       =>  'The information was successfully updated.',
                'access_denied' =>  'This action is unauthorized! ',
            ],
        ],

        'destroy'   =>  [
            'message'   =>  [
                'access_denied' =>  'This action is unauthorized! ',
                'success'       =>  'Delete user successful.',
                'failed'        =>  'Delete user failure.'
            ],
        ],

        'email_confirmation'    =>  [
            'message'   =>  'Thank you for the registration of the Calenduck application! Please confirm your email address.',
            'success'   =>  'The verify mail has been sent to your registered mailbox, please check it.',
        ]
    ],

    'blog'  =>  [
        'create'    =>  [
            'title' =>  'Blog',

            'form'  =>  [
                'title' =>  'Write a blog',

                'label' =>  [
                    'submit'    =>  'Write',
                ]
            ]
        ],

        'destroy'   =>  [
            'form'  =>  [
                'label' =>  [
                    'submit'    =>  'Delete',
                ]
            ],
            'message'   =>  [
                'access_denied' =>  'This action is unauthorized! ',
                'success'       =>  'Delete blog successful.',
                'failed'        =>  'Delete blog failure.'
            ],
        ],
    ],
];