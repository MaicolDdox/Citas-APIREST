<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use App\Models\Appointment;
use Blueprint\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Orion\Concerns\DisablePagination;
use Orion\Http\Requests\Request;


class AppointmentController extends Controller
{

    protected $model = Appointment::class;

    protected function guard(): string
    {
        return 'sanctum';
    }


    /**
     *
     * Crea una consulta Eloquent para obtener entidades en el método de index.
     *
     *  @param Request $request
     *  @param array $requestedRelations
     *  @return Builder
     *
     */

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): EloquentBuilder
    {
        return parent::buildIndexFetchQuery($request, $requestedRelations)->where('user_id', $request->user()->id);
    }

    protected function buildShowFetchQuery(Request $request, array $requestedRelations): EloquentBuilder
    {
        return parent::buildShowFetchQuery($request, $requestedRelations)->where('user_id', $request->user()->id);
    }

    protected function beforeStore(Request $request, Model $entity)
    {
        $entity->user_id = $request->user()->id;

        return parent::beforeStore($request, $entity);
    }

}
