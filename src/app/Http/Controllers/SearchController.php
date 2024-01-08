<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class SearchController extends Controller
{
    protected function handleSearch(Request $request, Builder $builder): JsonResponse
    {
        // Отримуємо дані із запиту
        $perPage = $request->get('length');
        //dd($perPage);
        $page = ($request->get('start') / $perPage) + 1;
        $order = $request->get('order')[0];
        $columns = $request->get('columns');

        for ($i = 0; $i < count($columns); ++$i) {
            if (empty($columns[$i]['data'])) {
                unset($columns[$i]);
            }
        }

        $searchValue = strtolower($request->get('search')['value']);
        $columnAliases = array_map(
            function ($x) { return $x['data']; },
            $columns
        );
        $columnNamesRaw = array_map(
            function ($x) { return str_replace('__', '.', $x); },
            $columnAliases
        );
        $columnNames = array_map(
            function ($x) { return str_replace('__', '.', $x) . " as $x"; },
            $columnAliases
        );

        $response = new stdClass();
        $response->draw = $request->get('draw');
        $response->recordsTotal = $builder->count();

        // Якщо вказаний запит пошуку
        if (isset($searchValue) && !empty($searchValue)) {
            // Фільтруємо записи по всім стовбцям методом OR
            foreach ($columnNamesRaw as $col) {
                $builder = $builder
                ->where(
                    DB::raw("lower($col)"),
                    'like',
                    '%' . $searchValue . '%',
                    'or'
                );
            }
        }

        $response->recordsFiltered = $builder->count();


        // Дописуємо запит до бази даних сортуючи та пагінуючи записи
        $response->data = $builder
            ->orderBy(
                str_replace('__', '.', $columns[$order['column']]['data']),
                $order['dir']
            )->paginate(
                $perPage,
                $columnNames,
                page: $page
            )->items();
        return new JsonResponse($response);
    }

}
