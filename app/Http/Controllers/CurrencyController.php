<?php

namespace App\Http\Controllers;
use App\Http\Requests\Currency\Edit;
use App\Http\Requests\Currency\Store;
use App\Models\Currency;
use App\Models\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

/**
 * Class CurrencyController
 * @package App\Http\Controllers
 *
 */
class CurrencyController extends Controller
{
    /**
     *home page, shows currencies and its properties
     * @return View
     */
    public function show(): View
    {
        $currencies = Currency::query()->paginate(4);
        return view('products.currency.show', compact('currencies'));
    }

    /**
     * creates new currency
     * @return View
     */
    public function create(): View
    {
        return view('products.currency.create');
    }

    /**
     * currency is stored after being created
     * @param Store $request
     * @return RedirectResponse
     */
    public function store( Store $request): RedirectResponse
    {
        $currency = new Currency;
        $currency->currency_name = $request->currency_name;
        $is_created = $currency->save();
        if (!$is_created) {
            return redirect()->route('currency.show')
                ->with('error', 'something went wrong');
        }
        return redirect()->route('currency.show')
            ->with('success', 'field is  created successfully.');
    }

    /**
     * edit currency fields
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $currency = Currency::query()->find($id);
        return view('products.currency.edit', compact('currency'));
    }


    /**
     * update changes and store them
     * @param int $id
     * @param Edit $request
     * @return RedirectResponse
     */
    public function update(int $id, Edit $request): RedirectResponse
    {
        $currency = Currency::query()->find($id);
        $currency->currency_name = $request->currency_name;
        $is_created = $currency->save();
        if (!$is_created) {
            return redirect()->route('currency.show')
                ->with('error', 'something went wrong');
        }
        return redirect()->route('currency.show')
            ->with('success', 'field is  created successfully.');
    }


    /**
     * delete currency
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $property = Property::query()->find($id);
        $currency = Currency::query()->find($id);
        if ($currency->property != null){
            $currency->property->delete();
        }
        $currency_is_deleted = $currency->delete();
        if (!$currency_is_deleted){
            return redirect()->back()
                ->with('error', 'something went wrong.');
        }
        return redirect()->back()
            ->with('success', 'field deleted successfully');
        }

}
