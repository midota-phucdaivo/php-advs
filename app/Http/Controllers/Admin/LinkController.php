<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Link;
use App\Models\Customer;
use Illuminate\Http\Request;

class LinkController extends AdminController
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
                        'view' => function ($data) {
                            echo Customer::find($data->customer_id)->name;
                        },
                        'key' => 'customer_id',
                        'title' => 'Customer',
                        'edit' => [
                            'type' => 'select',
                            'dataSource' => Customer::all(),
                            'placeholder' => 'Customer',
                            'map'=>['id', 'name'],
                            'attrs' => [
                                'data-init-plugin'=>'select2'
                            ]
                        ]
                    ],
                    [
                        'view' => [],
                        'key' => 'name',
                        'title' => 'Name',
                        'edit' => [
                            'placeholder' => 'name',
                        ]
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
                        'view' => [],
                        'key' => 'created_at',
                        'title' => 'Created at',
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
                                       return url()->action('Admin\LinkController@initForm', $data['id']);
                                   },
                               ],
                               [
                                   'html' => '<i class="icon-trash"></i>',
                                   'attrs' => [
                                       'class' => 'btn btn-danger btn-sm',
                                       'action-delete' => 'button',
                                   ],
                                   'action' => function ($data) {
                                       return url()->action('Admin\LinkController@delete', $data['id']);
                                   }
                               ]
                            ]
                        ],
                        'key' => 'id',
                        'title' => '',
                    ],
                ],
                'tableData' => Link::paginate(10)
            ],
        );
        $this->data['controller'] = "Admin\LinkController";
    }

    /**
     * Init Form.
     */
    public function initForm(Request $request, Link $object)
    {
        return parent::generateForm($request, $object);
    }

    /**
     * Action Form.
     */
    public function actionForm(Request $request, Link $object)
    {
        return parent::saveForm($request, $object);
    }

    /**
     * Delete.
     */
    public function delete(Request $request, Link $object)
    {
        return parent::deleteItem($request, $object);
    }
}
