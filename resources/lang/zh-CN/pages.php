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
    'home'  =>  [
        'title' =>  '主页',
    ],

    'session'   =>  [
        'create' =>  [
            'title' =>  '登录',

            'form'  =>  [
                'label' =>  [
                    'email'         =>  '邮箱地址',
                    'password'      =>  '密码',
                    'remember'      =>  '记住我',
                    'sign_up_link'  =>  '马上注册 ! ',
                ],

            ],

            'message'   =>  [
                'redirect_if_authenticated' =>  '您已登录，无需再次操作。'
            ],
        ],

        'store' =>  [
            'message'   =>  [
                'unactivated'   =>  '账号未激活，请检查邮箱中的注册邮件进行激活。',
                'success'       =>  '欢迎回来 !',
                'failed'        =>  '很报歉，您的账号与密码不匹配 !',
            ],
        ],
    ],

    'user'  =>  [
        'index' =>  [
            'title' =>  '用户列表',
        ],

        'show'  =>  [
            'title' =>  '用户简介',
        ],

        'edit'  =>  [
            'title' =>  '更新资料',

            'form'  =>  [
                'label' =>  [
                    'username'              =>      '用户名',
                    'email'                 =>      '电子邮箱',
                    'password'              =>      '密码',
                    'password_confirmation' =>      '确认密码',
                    'update'                =>      '更新',
                ],
            ],

            'message'   =>  [
                'success'   =>  '个人资料更新成功。',
            ],
        ],

        'destroy'   =>  [
            'message'   =>  [
                'access_denied' =>  '您未被授权进行此项操作 ! ',
                'success'       =>  '用户删除成功。',
                'failed'        =>  '用户删除失败。',
            ],
        ],

        'email_confirmation'    =>  [
            'message'   =>  '感谢注册 Calenduck 应用！请确认你的邮箱。',
            'success'   =>  '验证邮件已发送到你的注册邮箱上，请注意查收。',
        ]
    ],
];