<?php

namespace AbbyJanke\Expensed\App\Http\Controllers\Admin;

use AbbyJanke\Expensed\App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AjaxController extends Controller
{

    /**
     * Get currency options for an AJAX request.
     *
     * @return mixed
     */
    public function userOptions(Request $request) {
        $term = $request->get('term');
        $options = config('backpack.base.user_model_fqn')::where('name', 'like', '%'.$term.'%')->get()->pluck('name', 'id');
        return $options;
    }

    /**
     * Get currency options for an AJAX request.
     *
     * @return mixed
     */
    public function currencyOptions(Request $request) {
        $term = $request->get('term');
        $options = Currency::where('name', 'like', '%'.$term.'%')->orWhere('code', 'like', '%'.$term.'%')->get()->pluck('name', 'id');
        return $options;
    }
}