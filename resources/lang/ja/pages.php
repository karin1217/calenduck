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
    ],

    'session'   =>  [
        'create' =>  [
            'title' =>  'ログイン',

            'form'  =>  [
                'label' =>  [
                    'email'         =>  'メールアドレス',
                    'password'      =>  'パスワード',
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
];