<?php

namespace App\Http\View\Composers;


use App\Sort;
use Illuminate\View\View;


class SortsComposer
{
   
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('sorts', Sort::all());
    }
}