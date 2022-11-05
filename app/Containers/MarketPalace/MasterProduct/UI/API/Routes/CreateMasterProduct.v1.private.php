<?php

/**
 * @apiGroup           MasterProduct
 * @apiName            CreateMasterProduct
 *
 * @api                {POST} /v1/master-products Create Master Product
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

use App\Containers\MarketPalace\MasterProduct\UI\API\Controllers\CreateMasterProductController;
use Illuminate\Support\Facades\Route;

Route::post('master-products', [CreateMasterProductController::class, 'createMasterProduct'])
    ->middleware(['auth:api']);

