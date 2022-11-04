<?php

/**
 * @apiGroup           Customer
 * @apiName            GetAllCustomers
 *
 * @api                {GET} /v1/customers Get All Customers
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\MarketPalace\Customer\UI\API\Controllers\GetAllCustomersController;
use Illuminate\Support\Facades\Route;

Route::get('customers', [GetAllCustomersController::class, 'getAllCustomers'])
    ->middleware(['auth:api']);

