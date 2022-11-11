<?php

/**
 * @apiGroup           Payment
 * @apiName            DeletePayment
 *
 * @api                {DELETE} /v1/payments/:id Delete Payment
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

use App\Containers\MarketPalace\Payment\UI\API\Controllers\DeletePaymentController;
use Illuminate\Support\Facades\Route;

Route::delete('payments/{id}', [DeletePaymentController::class, 'deletePayment'])
    ->middleware(['auth:api']);

