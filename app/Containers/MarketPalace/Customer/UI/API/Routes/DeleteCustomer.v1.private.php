<?php

/**
 * @apiGroup           Customer
 * @apiName            DeleteCustomer
 *
 * @api                {DELETE} /v1/customers/:id Delete Customer
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

use App\Containers\MarketPalace\Customer\UI\API\Controllers\DeleteCustomerController;
use Illuminate\Support\Facades\Route;

Route::delete('customers/{id}', [DeleteCustomerController::class, 'deleteCustomer'])
    ->middleware(['auth:api']);

