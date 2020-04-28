<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Lead;
use App\Models\Customer;
use Illuminate\Http\Request;

class LeadController extends AdminController
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
                        'key' => 'customer_name',
                        'title' => 'customer_name',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'lead_type',
                        'title' => 'lead_type',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'phone',
                        'title' => 'phone',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'form_content',
                        'title' => 'form_content',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'address',
                        'title' => 'address',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'customer_ip',
                        'title' => 'customer_ip',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'location',
                        'title' => 'location',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'order',
                        'title' => 'order',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'value',
                        'title' => 'value',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'utm',
                        'title' => 'utm',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'utm',
                        'title' => 'utm',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'campaign_id',
                        'title' => 'campaign_id',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'link_id',
                        'title' => 'link_id',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'utm',
                        'title' => 'utm',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'city',
                        'title' => 'city',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'platform',
                        'title' => 'platform',
                        'edit' => []
                    ],
                    [
                        'view' => [],
                        'key' => 'browser',
                        'title' => 'browser',
                        'edit' => []
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
                                       return url()->action('Admin\LeadController@initForm', $data['id']);
                                   },
                               ],
                               [
                                   'html' => '<i class="icon-trash"></i>',
                                   'attrs' => [
                                       'class' => 'btn btn-danger btn-sm',
                                       'action-delete' => 'button',
                                   ],
                                   'action' => function ($data) {
                                       return url()->action('Admin\LeadController@delete', $data['id']);
                                   }
                               ]
                            ]
                        ],
                        'key' => 'id',
                        'title' => '',
                    ],
                ],
                'tableData' => Lead::paginate(10)
            ],
        );
        $this->data['controller'] = "Admin\LeadController";
    }

    /**
     * Init Form.
     */
    public function initForm(Request $request, Lead $object)
    {
        return parent::generateForm($request, $object);
    }

    /**
     * Action Form.
     */
    public function actionForm(Request $request, Lead $object)
    {
        return parent::saveForm($request, $object);
    }

    /**
     * Delete.
     */
    public function delete(Request $request, Lead $object)
    {
        return parent::deleteItem($request, $object);
    }
}
