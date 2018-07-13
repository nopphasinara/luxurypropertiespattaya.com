<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Request;

class BaseController extends Controller
{
    public function boot($form)
    {
        $id = '';
        $data = '';
        $request = request();
        $segments = $request->segments();
        $base = $segments;
        $last = array_last($segments, function ($value, $key) {
          return (strtolower($value) == 'edit' || strtolower($value) == 'create');
        });
        $last = strtolower($last);

        if ($last == 'edit') {
          $id = (int) array_get($segments, 2);
          if ($id) {
            $this->model = $this->model->where('id', $id)->first();
          }

          array_pop($base);
        }

        if ($last == 'create') {
          array_pop($base);
        }

        $action = '';
        if ($last == 'create' || $last == 'edit') {
          $action = '/' . implode('/', $base);
          $form->setAction($action);
        }

        $this->mixed = [
          'id' => $id,
          'last' => $last,
          'segments' => $segments,
          'action' => $action,
        ];
    }
}
