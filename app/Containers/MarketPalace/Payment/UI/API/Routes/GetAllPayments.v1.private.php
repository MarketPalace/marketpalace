<?php

/**
 * @apiGroup           Payment
 * @apiName            GetAllPayments
 *
 * @api                {GET} /v1/payments Get All Payments
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

use App\Containers\MarketPalace\Payment\UI\API\Controllers\GetAllPaymentsController;
use Illuminate\Support\Facades\Route;

Route::get('payments', [GetAllPaymentsController::class, 'getAllPayments'])
    ->middleware(['auth:api']);

