<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Campaign;
use App\Models\Source;
use App\Models\Link;
use Illuminate\Http\Request;

class CampaignController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        parent::initData(
            [
                'header' => [
                    [
                        'view' => [
                            'attrs' => ['style' => 'width: 1px; font-weight: bold; color: #0088ce'],
                        ],
                        'key' => 'id',
                        'title' => '#',
                    ],
                    [
                        'view' => [],
                        'key' => 'name',
                        'title' => 'Tên',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'code',
                        'title' => 'Code',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'description',
                        'title' => 'Description',
                        'edit' => [
                            'type'=>'textarea',
                            'placeholder'=> 'Description'
                        ]
                    ],
                    [
                        'view' => function ($data) {
                            echo Source::find($data->source_id)->name;
                        },
                        'key' => 'source_id',
                        'title' => 'Source id',
                        'edit' => [
                            'type' => 'select',
                            'dataSource' => Source::all(),
                            'placeholder' => 'Customer',
                            'map'=>['id', 'name'],
                            'attrs' => [
                                'data-init-plugin'=>'select2'
                            ]
                        ]
                    ],
                     [
                        'view' => function ($data) {
                            echo Link::find($data->link_id)->name;
                        },
                        'key' => 'link_id',
                        'title' => 'Link id',
                        'edit' => [
                            'type' => 'select',
                            'dataSource' => Link::all(),
                            'placeholder' => 'Customer',
                            'map'=>['id', 'name'],
                            'attrs' => [
                                'data-init-plugin'=>'select2'
                            ]
                        ]
                    ],
                    [
                        'view' => [],
                        'key' => 'impression',
                        'title' => 'Impression',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'click',
                        'title' => 'Click',
                        'edit' => [
                            'type'=>'number'
                        ]
                    ],
                    [
                        'view' => [],
                        'key' => 'budget',
                        'title' => 'Budget',
                        'edit' => [
                            'type'=>'number'
                        ]
                    ],
                    [
                        'view' => [],
                        'key' => 'cost_per_conv',
                        'title' => 'Cost per conv',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'page_bounce_rate',
                        'title' => 'Page bounce rate',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'avg_session_time',
                        'title' => 'Avg session time',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'goal_conv_rate',
                        'title' => 'goal conv rate',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'number_of_users',
                        'title' => 'Number of users',
                        'edit' => [
                            'type'=>'number'
                        ]
                    ],
                    [
                        'view' => [],
                        'key' => 'number_of_new_users',
                        'title' => 'Number of new users',
                        'edit' => [
                            'type'=>'number'
                        ]
                    ],
                    [
                        'view' => [],
                        'key' => 'created_at',
                        'title' => 'Created at',
                    ],
                    [
                        'view' => [],
                        'key' => 'number_of_call_orders',
                        'title' => 'Number of call orders',
                    ],

                    [
                        'view' => [],
                        'key' => 'into_money_form',
                        'title' => 'into money form',
                    ],
                    [
                        'view' => [],
                        'key' => 'into_money_call',
                        'title' => 'Into money call',
                    ],
                    [
                        'view' => [],
                        'key' => 'succesful_rate_form',
                        'title' => 'Succesful rate form',
                    ],
                    [
                        'view' => [],
                        'key' => 'succesful_rate_call',
                        'title' => 'Succesful rate call',
                    ],
                    [
                        'view' => [],
                        'key' => 'updated_at',
                        'title' => 'Updated at',
                    ],
                    [
                        'view' => [
                            'type' => 'action',
                            'attrs' => ['style' => 'width: 1px; font-weight: bold'],
                            'actions' => [
                               [
                                   'html' => '<i class="icon-pencil"></i>',
                                   'action' => function ($data) {
                                       return url()->action('Admin\CampaignController@initForm', $data['id']);
                                   },
                               ],
                               [
                                   'html' => '<i class="icon-trash"></i>',
                                   'attrs' => [
                                       'class' => 'btn btn-danger btn-sm',
                                       'action-delete' => 'button',
                                   ],
                                   'action' => function ($data) {
                                       return url()->action('Admin\CampaignController@delete', $data['id']);
                                   }
                               ]
                            ]
                        ],
                        'key' => 'id',
                        'title' => '',
                    ],
                ],
                'tableData' => Campaign::paginate(10)
            ],
        );
        $this->data['controller'] = "Admin\CampaignController";
    }

    /**
     * Init Form.
     */
    public function initForm(Request $request, Campaign $object)
    {
        return parent::generateForm($request, $object);
    }

    /**
     * Action Form.
     */
    public function actionForm(Request $request, Campaign $object)
    {
        return parent::saveForm($request, $object);
    }

    /**
     * Delete.
     */
    public function delete(Request $request, Campaign $object)
    {
        return parent::deleteItem($request, $object);
    }
}
