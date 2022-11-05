<?php

/**
 * @apiGroup           MasterProduct
 * @apiName            GetAllMasterProducts
 *
 * @api                {GET} /v1/master-products Get All Master Products
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

use App\Containers\MarketPalace\MasterProduct\UI\API\Controllers\GetAllMasterProductsController;
use Illuminate\Support\Facades\Route;

Route::get('master-products', [GetAllMasterProductsController::class, 'getAllMasterProducts'])
    ->middleware(['auth:api']);

