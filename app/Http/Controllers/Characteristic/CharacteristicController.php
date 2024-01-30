<?php

namespace App\Http\Controllers\Characteristic;

use App\Http\Controllers\Controller;
use App\Services\Characteristic\CharacteristicService;
use Illuminate\View\View;

class CharacteristicController extends Controller
{
    public function __construct(
        private readonly CharacteristicService $characteristicService
    )
    {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('characteristic.list')
            ->with([
                'characteristics' => $this->characteristicService->getCharacteristics()
            ]);
    }
}
