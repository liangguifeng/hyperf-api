<?php

$header = <<<'EOF'
This file is form http://findcat.cn

@link     http://findcat.cn
@email    1476982312@qq.com
EOF;

return PhpCsFixer\Config::create()
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2'               => true,
        '@Symfony'            => true,
        '@DoctrineAnnotation' => true,
        '@PhpCsFixer'         => true,
        'header_comment'      => [
            'commentType' => 'PHPDoc',
            'header'      => $header,
            'separate'    => 'none',
            'location'    => 'after_declare_strict',
        ],

        'yoda_style' => [
            'equal'     => false,
            'identical' => false,
        ],
        'array_syntax'           => ['syntax' => 'short'],
        'binary_operator_spaces' => [
            'default' => 'align_single_space',
        ],
        'blank_line_before_statement' => [
            'statements' => [
                'switch',
                'if',
                'declare',
                'try',
                'return',
            ],
        ],
        'ordered_class_elements'                 => false,
        'concat_space'                           => ['spacing' => 'one'],
        'declare_equal_normalize'                => ['space' => 'single'],
        'multiline_whitespace_before_semicolons' => true,
        'linebreak_after_opening_tag'            => true,
        'no_short_echo_tag'                      => true,
        'no_useless_else'                        => true,
        'no_useless_return'                      => true,
        'ordered_imports'                        => ['sortAlgorithm' => 'length'],
        'phpdoc_add_missing_param_annotation'    => true,
        'phpdoc_order'                           => true,
        'increment_style'                        => false,
        'method_chaining_indentation'            => false,
        'array_indentation'                      => true,
    ])

    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('public')
            ->exclude('runtime')
            ->exclude('vendor')
            ->in(__DIR__)
    )
    ->setUsingCache(false);
