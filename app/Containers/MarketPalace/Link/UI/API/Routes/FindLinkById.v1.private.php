<?php

/**
 * @apiGroup           Link
 * @apiName            FindLinkById
 *
 * @api                {GET} /v1/links/:id Find Link By Id
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

use App\Containers\MarketPalace\Link\UI\API\Controllers\FindLinkByIdController;
use Illuminate\Support\Facades\Route;

Route::get('links/{id}', [FindLinkByIdController::class, 'findLinkById'])
    ->middleware(['auth:api']);

