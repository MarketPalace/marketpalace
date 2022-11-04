<?php

/**
 * @apiGroup           Customer
 * @apiName            CreateCustomer
 *
 * @api                {POST} /v1/customers Create Customer
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

use App\Containers\MarketPalace\Customer\UI\API\Controllers\CreateCustomerController;
use Illuminate\Support\Facades\Route;

Route::post('customers', [CreateCustomerController::class, 'createCustomer'])
    ->middleware(['auth:api']);

