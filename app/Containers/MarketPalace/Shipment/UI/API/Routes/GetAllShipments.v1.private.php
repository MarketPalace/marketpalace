<?php

/**
 * @apiGroup           Shipment
 * @apiName            GetAllShipments
 *
 * @api                {GET} /v1/shipments Get All Shipments
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

use App\Containers\MarketPalace\Shipment\UI\API\Controllers\GetAllShipmentsController;
use Illuminate\Support\Facades\Route;

Route::get('shipments', [GetAllShipmentsController::class, 'getAllShipments'])
    ->middleware(['auth:api']);

