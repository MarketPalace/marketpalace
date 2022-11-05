<?php

/**
 * @apiGroup           MasterProduct
 * @apiName            UpdateMasterProduct
 *
 * @api                {PATCH} /v1/master-products/:id Update Master Product
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

use App\Containers\MarketPalace\MasterProduct\UI\API\Controllers\UpdateMasterProductController;
use Illuminate\Support\Facades\Route;

Route::patch('master-products/{id}', [UpdateMasterProductController::class, 'updateMasterProduct'])
    ->middleware(['auth:api']);

