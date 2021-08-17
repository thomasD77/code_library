<?php

namespace App\Http\Controllers;

use App\Http\Requests\addressRequest;
use App\Http\Requests\UserAddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $addresses = Address::withTrashed()->with(['users'])->latest()
            ->sortable(['street', 'number', 'city', 'postbox', 'country'])
            ->paginate(10);

        return view('admin.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        return view('admin.addresses.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAddressRequest $request)
    {
        //
        $user = Auth::user();
        $input = $request->all();
        $addresses = Address::create($input);

        /**wegschrijven van de tussentabel**/
        $addresses->users()->sync($user, false);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $address = Address::findOrFail($id);
        $users = User::pluck('name', 'id')
            ->all();

        return view('admin.addresses.edit', compact('users', 'address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserAddressRequest $request, $id)
    {
        //
        $input = $request->all();
        $addresses = Address::findOrFail($id);
        $addresses->update($input);
        $user = Auth::user();

        /**wegschrijven van de tussentabel**/
        $addresses->users()->sync($user, true);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $address = Address::findOrFail($id);
        $address->delete();
        Session::flash('address_message', $address->street . ' was deleted');
        return redirect('/admin/users');
    }

    public function addressRestore($id)
    {
        $address = Address::onlyTrashed()->findOrFail($id);
        User::onlyTrashed()->where('id', $id);
        $address->restore();
        Session::flash('address_message', $address->street . ' was restored');
        return redirect('admin/addresses');
    }
}
