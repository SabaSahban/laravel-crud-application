<?php

namespace App\Http\Controllers;

use App\Http\Requests\Property\Edit;
use App\Http\Requests\Property\Store;
use App\Http\Requests\Search;
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
     * @return View
     */
    public function index(): View
    {
        $properties = Property::query()->paginate(5);
        $currencies = Currency::all();
        return view('products.index', compact('properties', 'currencies'));
    }


    /**
     * create new property
     * @return View
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
    public function store(Store $request): RedirectResponse
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
     * @return View
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

    /**
     * search for a specific field
     * @param Search $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function search(Search $request): Factory|View|Application|RedirectResponse
    {
        $request->flash();
        $property_currency_name = $request->currency_name;
        $property_show_name = $request->show_name;
        $property_has_tag = $request->has_tag;

        if (isset($property_show_name)) {
            $properties = Property::query()->where('show_name', $property_show_name)
                ->paginate(1);
        } else if (isset($property_has_tag)) {
            $properties = Property::query()->where('has_tag', $property_has_tag)
                ->paginate(1);
        } else if (isset($property_currency_name)) {
            $id = Currency::query()->where('currency_name', $property_currency_name)->first()->id;
            if ($id == null) {
                return redirect()->route('index.php')
                    ->with('error', 'currency not found');
            }
            $properties = Property::query()->where('currency_id', $id)
                ->paginate(1);
            return view('products.index', compact('properties'));
        } else {
            return redirect()->route('property.index')
                ->with('error', 'nothing entered');
        }
        return view('products.index', ['properties' => $properties]);
    }

    /**
     * applies filter to shown results
     * @param Search $request
     * @return RedirectResponse|View
     */
    public function sort(Search $request): RedirectResponse|View
    {
        $request->flash();
        $sorts = $request->sorts;

        switch ($sorts) {
            case 'show_order':
                $properties = Property::query()->orderBy('show_order', 'DESC')
                    ->paginate(1);
                return view('products.index', ['properties' => $properties]);
            case 'withdraw':
                $properties = Property::query()->orderBy('withdraw', 'DESC')
                    ->paginate(1);
                return view('products.index', ['properties' => $properties]);
            case 'deposit':
                $properties = Property::query()->orderBy('deposit', 'DESC')
                    ->paginate(1);
                return view('products.index', ['properties' => $properties]);
            default:
                return redirect()->route('property.index')
                    ->with('error', 'nothing entered');
        }
    }
}
