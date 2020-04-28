<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends AdminController
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
                                       return url()->action('Admin\CustomerController@initForm', $data['id']);
                                   },
                               ],
                               [
                                   'html' => '<i class="icon-trash"></i>',
                                   'attrs' => [
                                       'class' => 'btn btn-danger btn-sm',
                                       'action-delete' => 'button',
                                   ],
                                   'action' => function ($data) {
                                       return url()->action('Admin\CustomerController@delete', $data['id']);
                                   }
                               ]
                            ]
                        ],
                        'key' => 'id',
                        'title' => '',
                    ],
                ],
                'tableData' => Customer::paginate(10)
            ],
        );
        $this->data['controller'] = "Admin\CustomerController";
    }

    /**
     * Init Form.
     */
    public function initForm(Request $request, Customer $object)
    {
        return parent::generateForm($request, $object);
    }

    /**
     * Action Form.
     */
    public function actionForm(Request $request, Customer $object)
    {
        return parent::saveForm($request, $object);
    }

    /**
     * Delete.
     */
    public function delete(Request $request, Customer $object)
    {
        return parent::deleteItem($request, $object);
    }
}
