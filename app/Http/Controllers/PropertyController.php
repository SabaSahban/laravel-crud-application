<?php

namespace App\Http\Controllers;


use App\Http\Requests\Property\Edit;
use App\Http\Requests\Property\Store;
use App\Models\Currency;
use App\Models\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class PropertyController
 * @package App\Http\Controllers
 */
class PropertyController extends Controller
{

    /**
     * show currencies and properties on main page
     * @return Application|Factory|View
     */
    public function index(): View
    {
        $properties = Property::query()->paginate(5);
        $currencies = Currency::all();
        return view('products.index', compact('properties', 'currencies'));
    }


    /**
     * create new property
     * @return Application|Factory|View
     */
    public function create(): View
    {
        $currencies = Currency::all();
        return view('products.property.create', compact('currencies'));
    }


    /**
     *store property fields
     * @param Store $request
     * @return RedirectResponse
     */
    public function store(Store  $request): RedirectResponse
    {
        $property = new Property;
        $property->currency_id = $request->currency_id;
        $property->name = $request->name;
        $property->show_name = $request->show_name;
        $property->explorer = $request->explorer;
        $property->show_order = $request->show_order;
        $property->deposit = $request->deposit;
        $property->withdraw = $request->withdraw;
        $property->has_tag = $request->has_tag;
        $property->withdraw_min = $request->withdraw_min;
        $property->withdraw_fee = $request->withdraw_fee;
        $property->deposit_min = $request->deposit_min;
        $is_created = $property->save();
        if (!$is_created) {
            return redirect()->route('property.index')
                ->with('error', 'something went wrong');
        }
        return redirect()->route('property.index')
            ->with('success', 'field is  created successfully.');
    }


    /**
     * edit property fields
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View
    {
        $property = Property::query()->find($id);
        $currencies = Currency::all();
        return view('products.property.edit', compact('property', 'currencies'));
    }


    /**
     * update property fields and store them
     * @param int $id
     * @param Edit $request
     * @return RedirectResponse
     */
    public function update(int $id, Edit $request): RedirectResponse
    {
        $property = Property::query()->find($id);
        $property->currency_id = $request->currency_id;
        $property->name = $request->name;
        $property->show_name = $request->show_name;
        $property->explorer = $request->explorer;
        $property->show_order = $request->show_order;
        $property->deposit = $request->deposit;
        $property->withdraw = $request->withdraw;
        $property->has_tag = $request->has_tag;
        $property->withdraw_min = $request->withdraw_min;
        $property->withdraw_fee = $request->withdraw_fee;
        $property->deposit_min = $request->deposit_min;

        $is_created = $property->save();
        if (!$is_created) {
            return redirect()->route('property.index')
                ->with('error', 'something went wrong');
        }
        return redirect()->route('property.index')
            ->with('success', 'field is  created successfully.');
    }


    /**
     *delete currency property
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $property = Property::query()->find($id);
        $is_deleted = $property->delete();
        if (!$is_deleted) {
            return redirect()->back()
                ->with('error', 'something went wrong');
        }
        return redirect()->back()
            ->with('success', 'field deleted successfully.');
    }

}
