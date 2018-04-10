<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

//    'accepted' => ':attributeを承認してください。',
//    'active_url' => ':attributeは、有効なURLではありません。',
//    'after' => ':attributeには、:date以降の日付を指定してください。',
//    'after_or_equal' => ':attributeには、:date以降もしくは同日時を指定してください。',
//    'alpha' => ':attributeには、アルファベッドのみ使用できます。',
//    'alpha_dash' => ":attributeには、英数字('A-Z','a-z','0-9')とハイフンと下線('-','_')が使用できます。",
//    'alpha_num' => ":attributeには、英数字('A-Z','a-z','0-9')が使用できます。",
//    'array' => ':attributeには、配列を指定してください。',
//    'before' => ':attributeには、:date以前の日付を指定してください。',
//    'before_or_equal' => ':attributeには、:date以前もしくは同日時を指定してください。',
//    'between' => [
//        'numeric' => ':attributeには、:minから、:maxまでの数字を指定してください。',
//        'file' => ':attributeには、:min KBから:max KBまでのサイズのファイルを指定してください。',
//        'string' => ':attributeは、:min文字から:max文字にしてください。',
//        'array' => ':attributeの項目は、:min個から:max個にしてください。',
//    ],
//    'boolean' => ":attributeには、'true'か'false'を指定してください。",
//    'confirmed' => ':attributeと:attribute確認が一致しません。',
//    'date' => ':attributeは、正しい日付ではありません。',
//    'date_format' => ":attributeの形式は、':format'と合いません。",
//    'different' => ':attributeと:otherには、異なるものを指定してください。',
//    'digits' => ':attributeは、:digits桁にしてください。',
//    'digits_between' => ':attributeは、:min桁から:max桁にしてください。',
//
//    'dimensions' => ':attributeは、正しい縦横比ではありません。',
//    'distinct' => ':attributeに重複した値があります。',
//    'email' => ':attributeは、有効なメールアドレス形式で指定してください。',
//    'exists' => '選択された:attributeは、有効ではありません。',
//    'file' => ':attributeはファイルでなければいけません。',
//    'filled' => ':attributeは必須です。',
//    'image' => ':attributeには、画像を指定してください。',
//    'in' => '選択された:attributeは、有効ではありません。',
//    'in_array' => ':attributeは、:otherに存在しません。',
//    'integer' => ':attributeには、整数を指定してください。',
//    'ip' => ':attributeには、有効なIPアドレスを指定してください。',
//    'ipv4' => ':attributeはIPv4アドレスを指定してください。',
//    'ipv6' => ':attributeはIPv6アドレスを指定してください。',
//    'json' => ':attributeには、有効なJSON文字列を指定してください。',
//    'max' => [
//        'numeric' => ':attributeには、:max以下の数字を指定してください。',
//        'file' => ':attributeには、:max KB以下のファイルを指定してください。',
//        'string' => ':attributeは、:max文字以下にしてください。',
//        'array' => ':attributeの項目は、:max個以下にしてください。',
//    ],
//    'mimes' => ':attributeには、:valuesタイプのファイルを指定してください。',
//    'mimetypes' => ':attributeには、:valuesタイプのファイルを指定してください。',
//    'min' => [
//        'numeric' => ':attributeには、:min以上の数字を指定してください。',
//        'file' => ':attributeには、:min KB以上のファイルを指定してください。',
//        'string' => ':attributeは、:min文字以上にしてください。',
//        'array' => ':attributeの項目は、:max個以上にしてください。',
//    ],
//    'not_in' => '選択された:attributeは、有効ではありません。',
//    'not_regex' => 'The :attribute format is invalid.',
//    'numeric' => ':attributeには、数字を指定してください。',
//    'present' => ':attributeは、必ず存在しなくてはいけません。',
//    'regex' => ':attributeには、有効な正規表現を指定してください。',
//    'required' => ':attributeは、必ず指定してください。',
//    'required_if' => ':otherが:valueの場合、:attributeを指定してください。',
//    'required_unless' => ':otherが:value以外の場合、:attributeを指定してください。',
//    'required_with' => ':valuesが指定されている場合、:attributeも指定してください。',
//    'required_with_all' => ':valuesが全て指定されている場合、:attributeも指定してください。',
//    'required_without' => ':valuesが指定されていない場合、:attributeを指定してください。',
//    'required_without_all' => ':valuesが全て指定されていない場合、:attributeを指定してください。',
//    'same' => ':attributeと:otherが一致しません。',
//    'size' => [
//        'numeric' => ':attributeには、:sizeを指定してください。',
//        'file' => ':attributeには、:size KBのファイルを指定してください。',
//        'string' => ':attributeは、:size文字にしてください。',
//        'array' => ':attributeの項目は、:size個にしてください。',
//    ],
//    'string' => ':attributeには、文字を指定してください。',
//    'timezone' => ':attributeには、有効なタイムゾーンを指定してください。',
//    'unique' => '指定の:attributeは既に使用されています。',
//    'uploaded' => ':attributeのアップロードに失敗しました。',
//    'url' => ':attributeは、有効なURL形式で指定してください。',


    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeは正しいURLではありません。',
    'after'                => ':attributeは:dateより後の日付にしてください。',
    'after_or_equal'       => ':attributeは:date以降の日付にしてください。',
    'alpha'                => ':attributeは英字のみにしてください。',
    'alpha_dash'           => ':attributeは英数字とハイフンのみにしてください。',
    'alpha_num'            => ':attributeは英数字のみにしてください。',
    'array'                => ':attributeは配列にしてください。',
    'before'               => ':attributeは:dateより前の日付にしてください。',
    'before_or_equal'      => ':attributeは:date以前の日付にしてください。',
    'between'              => [
        'numeric' => ':attributeは:min〜:maxまでにしてください。',
        'file'    => ':attributeは:min〜:max KBまでのファイルにしてください。',
        'string'  => ':attributeは:min〜:max文字にしてください。',
        'array'   => ':attributeは:min〜:max個までにしてください。',
    ],
    'boolean'              => ':attributeはtrueかfalseにしてください。',
    'confirmed'            => ':attributeは確認用項目と一致していません。',
    'date'                 => ':attributeは正しい日付ではありません。',
    'date_format'          => ':attributeは":format"書式と一致していません。',
    'different'            => ':attributeは:otherと違うものにしてください。',
    'digits'               => ':attributeは:digits桁にしてください',
    'digits_between'       => ':attributeは:min〜:max桁にしてください。',
    'dimensions'           => ':attributeは無効な画像サイズです。',
    'distinct'             => ':attributeは値が重複しています。',
    'email'                => ':attributeを正しいメールアドレスにしてください。',
    'exists'               => '選択された:attributeは正しくありません。',
    'file'                 => ':attributeはファイルにしてください。',
    'filled'               => ':attributeは必須です。',
    'image'                => ':attributeは画像にしてください。',
    'in'                   => '選択された:attributeは正しくありません。',
    'in_array'             => ':attributeは:otherの中から選んでください。',
    'integer'              => ':attributeは整数にしてください。',
    'ip'                   => ':attributeを正しいIPアドレスにしてください。',
    'ipv4'                 => ':attributeを正しいIPv4アドレスにしてください。',
    'ipv6'                 => ':attributeを正しいIPv6アドレスにしてください。',
    'json'                 => ':attributeを正しいJSONにしてください。',
    'max'                  => [
        'numeric' => ':attributeは:max以下にしてください。',
        'file'    => ':attributeは:max KB以下のファイルにしてください。.',
        'string'  => ':attributeは:max文字以下にしてください。',
        'array'   => ':attributeは:max個以下にしてください。',
    ],
    'mimes'                => ':attributeは:valuesタイプのファイルにしてください。',
    'mimetypes'            => ':attributeは:valuesタイプのファイルにしてください。',
    'min'                  => [
        'numeric' => ':attributeは:min以上にしてください。',
        'file'    => ':attributeは:min KB以上のファイルにしてください。.',
        'string'  => ':attributeは:min文字以上にしてください。',
        'array'   => ':attributeは:min個以上にしてください。',
    ],
    'not_in'               => '選択された:attributeは正しくありません。',
    'numeric'              => ':attributeは数字にしてください。',
    'present'              => ':attributeは存在する必要があります。',
    'regex'                => ':attributeの書式が正しくありません。',
    'required'             => ':attributeは必須です。',
    'required_if'          => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless'      => ':otherが:valueにない場合、:attributeは必須です。',
    'required_with'        => ':valuesが存在する場合、:attributeは必須です。',
    'required_with_all'    => ':valuesが存在する場合、:attributeは必須です。',
    'required_without'     => ':valuesが存在しない場合、:attributeは必須です。',
    'required_without_all' => ':valuesが存在しない場合、:attributeは必須です。',
    'same'                 => ':attributeと:otherが一致していません。',
    'size'                 => [
        'numeric' => ':attributeは:sizeにしてください。',
        'file'    => ':attributeは:size KBにしてください。.',
        'string'  => ':attribute:size文字にしてください。',
        'array'   => ':attributeは:size個にしてください。',
    ],
    'string'               => ':attributeは文字列にしてください。',
    'timezone'             => ':attributeは正しいタイムゾーンをしていしてください。',
    'unique'               => ':attributeは既に存在します。',
    'uploaded'             => ':attributeはアップロードできませんでした。',
    'url'                  => ':attributeを正しい書式にしてください。',

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
//        'attribute-name' => [
//            'rule-name' => 'custom-message',
//        ],

//        'name'                  =>  [
//            'required'              =>      ':attributeを入力して下さい。',
//        ],
//
//        'email'                 =>  [
//            'required'              =>      ':attributeを入力して下さい。',
//            'email'                 =>      'は不正なメールアドレスです。',
//        ],
//
//        'password'              =>  [
//            'required'              =>      ':attributeを入力して下さい。',
//            'min'                   =>      ':attributeを:min文字以上で入力してください。',
//            'confirmed'             =>      ':attributeが一致しません。',
//        ],
//
//        'password_confirmation' => [
//            'required'              =>      ':attributeを入力して下さい。',
//            'confirmed'             =>      ':attributeが一致しません。',
//        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'          =>          'ユーザ名',
        'email'         =>          'メールアドレス',
        'password'      =>          'パスワード',
        'password_confirmation' =>  'パスワード'
    ],
];
