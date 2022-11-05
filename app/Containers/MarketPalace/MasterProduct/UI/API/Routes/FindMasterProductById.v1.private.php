<?php

/**
 * @apiGroup           MasterProduct
 * @apiName            FindMasterProductById
 *
 * @api                {GET} /v1/master-products/:id Find Master Product By Id
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

use App\Containers\MarketPalace\MasterProduct\UI\API\Controllers\FindMasterProductByIdController;
use Illuminate\Support\Facades\Route;

Route::get('master-products/{id}', [FindMasterProductByIdController::class, 'findMasterProductById'])
    ->middleware(['auth:api']);

