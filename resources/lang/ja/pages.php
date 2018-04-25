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
        'title' =>  'ホーム',

        'top_menu'  =>  [
            'wish_list'     =>  'ウィッシュリスト',
            'my_account'        =>  [
                'title'         =>  'マイアカウント',
                'sub'           =>  [
                    'list'      =>  'ユーザーリスト',
                    'login'     =>  'ログイン',
                    'logout'    =>  'ログアウト',
                    'profile'   =>  'プロファイル',
                    'update'    =>  '情報更新',
                    'help'      =>  'ヘルプ',
                ],
            ],
            'shopping_cart' =>  'ショッピングカート',
            'check_out'     =>  'チェックアウト',
        ],

        'nav'  =>  [
            'home'          =>  'ホーム',
            'shops'         =>  'ショップ',
            'categories'    =>  'カテゴリー',
            'gallery'       =>  'ギャラリー',
            'blog'          =>  'ブログ',
            'contact'       =>  'コンタクト',
        ],

        'message'   =>  [
            'visitor'   =>  ''
        ],
    ],

    'session'   =>  [
        'create' =>  [
            'title' =>  'ログイン',

            'form'  =>  [
                'label' =>  [
                    'email'         =>  'メールアドレス',
                    'password'      =>  'パスワード',
                    'forgot'        =>  'パスワードを忘れた',
                    'captcha'       =>  'キャプチャー',
                    'remember'      =>  'ログイン状態を保持',
                    'sign_up_link'  =>  '今すぐ登録',
                ],

            ],

            'message'   =>  [
                'redirect_if_authenticated' =>  'すでにログインしているので、再度操作することはありません。'
            ],
        ],

        'store' =>  [
            'message'   =>  [
                'unactivated'   =>  'アカウントがアクティブにされていません。 アクティベートするために登録したメールをチェックしてください。',
                'success'       =>  'お帰りなさい！',
                'failed'        =>  'アカウントとパスワードが一致しません。',
            ],
        ],
    ],

    'user'  =>  [
        'index' =>  [
            'title' =>  'ユーザーリスト',
        ],

        'create'    =>  [
            'title' =>  'サインアップ',
        ],

        'show'  =>  [
            'title' =>  'プロフィール',
        ],


        'edit'  =>  [
            'title' =>  '情報変更',

            'form'  =>  [
                'label' =>  [
                    'username'              =>      'ユーザー名',
                    'email'                 =>      'メールアドレス',
                    'password'              =>      'パスワード',
                    'password_confirmation' =>      'パスワード(確認用)',
                    'update'                =>      '更　新',
                ],
            ],

            'message'   =>  [
                'success'   =>  '情報更新が成功しました！',
            ],
        ],

        'destroy'   =>  [
            'message'   =>  [
                'access_denied' =>  'この操作を許可されていません! ',
                'success'       =>  'ユーザーを削除されました。',
                'failed'        =>  'ユーザーを削除するのに失敗しました。'
            ],
        ],

        'email_confirmation'    =>  [
            'message'   =>  'Calenduckアプリケーションにご登録ありがとうございます。このメールアドレスでご登録したことをご確認して下さい。',
            'success'   =>  '確認メールがご登録のメールアドレスに送信されましたので、ご査収してください。',
        ]
    ],

    'blog'  =>  [
        'create'    =>  [
            'title' =>  'ブログ',

            'form'  =>  [
                'title' =>  '書き込み',

                'label' =>  [
                    'submit'    =>  '書き込み',
                ]
            ]
        ],
    ],
];