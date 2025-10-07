<?php

namespace App\Http\Controllers;

use App\Models\Alliance;
use Illuminate\Http\Request;

class AllianceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request, $id)
    {
        $alliance = Alliance::findOrFail($id);

        return view('alliances.show', [
            'alliance' => $alliance
        ]);
    }
}
