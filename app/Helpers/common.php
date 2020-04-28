<?php

function generateAtribute($attributes)
{
    $htmlAttributes = '';
    if (isset($attributes)) {
        foreach ($attributes as $key => $attr) {
            $htmlAttributes .= ($key.'="'.$attr.'"');
        }
    }

    return $htmlAttributes;
}

function slidebar()
{
    return [
        [
            'name'=>'Customer',
            'icon'=>'icon-list',
            'childrens' => [
                [
                    'name'=>'List',
                    'icon'=>'icon-list',
                    'url'=>'Admin\CustomerController@index'
                ], [
                    'name'=>'Create',
                    'icon'=>'icon-plus',
                    'url'=>'Admin\CustomerController@initForm'
                ]
            ]
        ],
        [
            'name'=>'Link',
            'icon'=>'icon-list',
            'childrens' => [
                [
                    'name'=>'List',
                    'icon'=>'icon-list',
                    'url'=>'Admin\LinkController@index'
                ], [
                    'name'=>'Create',
                    'icon'=>'icon-plus',
                    'url'=>'Admin\LinkController@initForm'
                ]
            ]
        ],
        [
            'name'=>'Source',
            'icon'=>'icon-list',
            'childrens' => [
                [
                    'name'=>'List',
                    'icon'=>'icon-list',
                    'url'=>'Admin\SourceController@index'
                ], [
                    'name'=>'Create',
                    'icon'=>'icon-plus',
                    'url'=>'Admin\SourceController@initForm'
                ]
            ]
        ],
        [
            'name'=>'Campaign',
            'icon'=>'icon-list',
            'childrens' => [
                [
                    'name'=>'List',
                    'icon'=>'icon-list',
                    'url'=>'Admin\CampaignController@index'
                ], [
                    'name'=>'Create',
                    'icon'=>'icon-plus',
                    'url'=>'Admin\CampaignController@initForm'
                ]
            ]
        ],
        [
            'name'=>'Lead',
            'icon'=>'icon-list',
            'childrens' => [
                [
                    'name'=>'List',
                    'icon'=>'icon-list',
                    'url'=>'Admin\LeadController@index'
                ], [
                    'name'=>'Create',
                    'icon'=>'icon-plus',
                    'url'=>'Admin\LeadController@initForm'
                ]
            ]
        ]
     ];
}
