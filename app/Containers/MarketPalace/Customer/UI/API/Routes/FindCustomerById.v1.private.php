<?php

/**
 * @apiGroup           Customer
 * @apiName            FindCustomerById
 *
 * @api                {GET} /v1/customers/:id Find Customer By Id
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

use App\Containers\MarketPalace\Customer\UI\API\Controllers\FindCustomerByIdController;
use Illuminate\Support\Facades\Route;

Route::get('customers/{id}', [FindCustomerByIdController::class, 'findCustomerById'])
    ->middleware(['auth:api']);

