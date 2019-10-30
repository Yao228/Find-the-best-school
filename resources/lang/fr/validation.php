<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ' :attribute doit être accepté.',
    'active_url' => ' :attribute n\'est pas une URL valide.',
    'after' => 'Le :attribute doit être une date après :date.',
    'after_or_equal' => 'Le :attribute doit être une date après ou égale à :date.',
    'alpha' => ' :attribute ne peut contenir que des lettres.',
    'alpha_dash' => ' :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => ' :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => ' :attribute doit être un tableau.',
    'before' => ' :attribute doit être une date avant :date.',
    'before_or_equal' => ' :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => ' :attribute Doit être entre :min et :max.',
        'file' => ' :attribute Doit être entre :min et :max kilo-octets.',
        'string' => ' :attribute Doit être entre :min and :max caractères.',
        'array' => ' :attribute doit avoir entre :min and :max articles.',
    ],
    'boolean' => ' Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'la confirmation :attribute ne correspond pas.',
    'date' => ' :attribute n\'est pas une date valide.',
    'date_equals' => ' :attribute doit être une date égale à :date.',
    'date_format' => ' :attribute ne correspond pas au format :format.',
    'different' => ' :attribute et :other doit être différent.',
    'digits' => ' :attribute doit être :digits digits.',
    'digits_between' => ' :attribute doit être entre :min et :max digits.',
    'dimensions' => ' :attribute a des dimensions d\'image non valides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'email' => ' :attribute doit être une adresse e-mail valide.',
    'ends_with' => ' :attribute doit se terminer par l’un des éléments suivants: :values',
    'exists' => 'La sélection :attribute est invalide.',
    'file' => ' :attribute doit être un fichier.',
    'filled' => ' le champ :attribute  doit avoir une valeur.',
    'gt' => [
        'numeric' => ' :attribute doit être supérieur à :value.',
        'file' => ' :attribute doit être supérieur à :value kilooctets.',
        'string' => ' :attribute doit être supérieur à :value caractères.',
        'array' => ' :attribute doit avoir plus de :value articles.',
    ],
    'gte' => [
        'numeric' => ' :attribute doit être supérieur ou égal :value.',
        'file' => ' :attribute doit être supérieur ou égal :value kilooctets.',
        'string' => ' :attribute doit être supérieur ou égal :value caractères.',
        'array' => ' :attribute doit avoir :value articles ou plus.',
    ],
    'image' => ' :attribute doit être une image.',
    'in' => ' :attribute sélectionné n\'est pas valide.',
    'in_array' => 'le champ :attribute n\'existe pas dans :other.',
    'integer' => ' :attribute doit être un entier.',
    'ip' => ' :attribute doit être une adresse IP valide.',
    'ipv4' => ' :attribute doit être une adresse IPv4 valide.',
    'ipv6' => ' :attribute doit être une adresse IPv6 valide.',
    'json' => ' :attribute doit être une chaîne JSON valide.',
    'lt' => [
        'numeric' => ' :attribute doit être inférieur à :value.',
        'file' => ' :attribute doit être inférieur à :value kilooctets.',
        'string' => ' :attribute doit être inférieur à :value caractères.',
        'array' => ' :attribute doit avoir moins de :value articles.',
    ],
    'lte' => [
        'numeric' => ' :attribute doit être inférieur à ou égal :value.',
        'file' => ' :attribute doit être inférieur à ou égal :value kilooctets.',
        'string' => ' :attribute doit être inférieur à ou égal :value caractères.',
        'array' => ' :attribute ne doit pas avoir plus de :value articles.',
    ],
    'max' => [
        'numeric' => ' :attribute ne peut pas être supérieur à :max.',
        'file' => ' :attribute ne peut pas être supérieur à :max kilooctets.',
        'string' => ' :attribute ne peut pas être supérieur à :max caractères.',
        'array' => ' :attribute peut ne pas avoir plus de :max articles.',
    ],
    'mimes' => ' :attribute doit être un fichier de type: :values.',
    'mimetypes' => ' :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => ' :attribute doit être au moins :min.',
        'file' => ' :attribute doit être au moins :min kilooctets.',
        'string' => ' :attribute doit être au moins :min caractères.',
        'array' => ' :attribute doit avoir au moins :min articles.',
    ],
    'not_in' => ' :attribute sélectionné est invalide.',
    'not_regex' => 'Le format de :attribute  est invalide.',
    'numeric' => ' :attribute doit être un nombre.',
    'present' => 'le champ :attribute  doit être présent.',
    'regex' => 'Le format de :attribute est invalide.',
    'required' => ' Le Champ :attribute est requis.',
    'required_if' => 'Le Champ :attribute est requis quand :other est :value.',
    'required_unless' => 'Le Champ :attribute est requis sauf si :other est dans :values.',
    'required_with' => 'Le Champ :attribute est requis quand :values est présent.',
    'required_with_all' => 'Le Champ :attribute est requis quand :values sont présents.',
    'required_without' => 'Le Champ :attribute est requis quand :values n\'est pas présent.',
    'required_without_all' => 'Le Champ :attribute est requis quand aucun de :values sont présents.',
    'same' => ' :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => ' :attribute doit être :size.',
        'file' => ' :attribute doit être :size kilooctets.',
        'string' => ' :attribute doit être :size caractères.',
        'array' => ' :attribute doit contenir :size articles.',
    ],
    'starts_with' => ' :attribute doit commencer par l’un des éléments suivants: :values',
    'string' => ' :attribute doit être un texte.',
    'timezone' => ' :attribute doit être une zone valide.',
    'unique' => ' :attribute a déjà été pris.',
    'uploaded' => ' échec du téléchargement de :attribute .',
    'url' => 'Le format de :attribute  est invalide.',
    'uuid' => ' :attribute doit être un UUID valide.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
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
