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
        'username'              =>      '用户名',
        'email'                 =>      '邮箱地址',
        'password'              =>      '密码',
        'password_confirmation' =>      '确认密码',
        'signup'                =>      '注册',
        'remember'              =>      '记住我',
    ],

    'hint'                      =>  [
        'between'               =>      [
            'numeric'           =>      'The :attribute must be between :min and :max.',
            'file'              =>      'The :attribute must be between :min and :max kilobytes.',
            'string'            =>      ':attribute必须在 3 至 25 个字符以内。',
            'array'             =>      'The :attribute must have between :min and :max items.',
        ],
        'email'                 =>      '填写有效的邮箱地址。',
        'password'              =>      ':attribute必须由英文数字组成，并且在 3 个字符以上。',
        'confirm'               =>      '输入和:other一样的内容。',
    ],

    'bottom'                    =>  [
        'have_no_account'       =>      '马上注册！',
    ],


];