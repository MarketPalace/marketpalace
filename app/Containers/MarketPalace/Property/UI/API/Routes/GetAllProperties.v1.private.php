<?php

/**
 * @apiGroup           Property
 * @apiName            GetAllProperties
 *
 * @api                {GET} /v1/properties Get All Properties
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

use App\Containers\MarketPalace\Property\UI\API\Controllers\GetAllPropertiesController;
use Illuminate\Support\Facades\Route;

Route::get('properties', [GetAllPropertiesController::class, 'getAllProperties'])
    ->middleware(['auth:api']);

