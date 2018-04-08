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
        'username'              =>      'ユーザー名',
        'email'                 =>      'メールアドレス',
        'password'              =>      'パスワード',
        'password_confirmation' =>      'パスワード(確認用)',
    ],

    'hint'                      =>  [
        'between'               =>      [
            'numeric'           =>      'The :attribute must be between :min and :max.',
            'file'              =>      'The :attribute must be between :min and :max kilobytes.',
            'string'            =>      ':attributeは:min文字から:max文字まで',
            'array'             =>      'The :attribute must have between :min and :max items.',
        ],
        'email'                 =>      '有効なメールアドレスを入力してください。',
        'password'              =>      ':attributeは半角英数:min文字以上にして下さい。',
        'confirm'               =>      ':otherと同じ内容を入力してください。',
    ],


];