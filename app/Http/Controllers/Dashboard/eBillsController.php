<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\invoice;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class eBillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoice::where('user_id', '=', get_current_user_id())->get();
        return view('eBills.index', compact('invoices'));
    }
    public function _updateInvoiceLogo(Request $request)
    {
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $user = User::find(get_current_user_id());
        $user->invoiceLogo = $filename;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('Common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),

        ]);
    }
    public function _updateInvoiceSignature(Request $request)
    {
        $filename = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('image'), $filename);
        $user = User::find(get_current_user_id());
        $user->Signature = $filename;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('Common.alert', ['message' => __('backend.File Uploaded successfully'), 'type' => 'success'])->render(),

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eBills.create');
    }
    public function _InvoiceSettings()
    {
        return view('eBills.Invoice-Settings');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $invoice = invoice::create([
            'invoice_date' => $request->Invoice_date,
            'supply_date' => $request->date_supply,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'TaxNumber' => $request->Tax_Number,
            'responsible' => $request->responsible,
            'phone' => $request->phone,
            'email' => $request->email,
            'Bank_name' => $request->Bank_name,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'IBAN' => $request->Number_statement,
            'user_id' => get_current_user_id(),
            'contracts_id' => $request->route('id') != null ? $request->route('id') : null,
        ]);
        $card = $request->product_name;
        for ($i = 1; $i <= count($card); $i++) {
            if (!empty($card[$i])) {
                $Taxable_amount = null;
                if ($request->Discount_type[$i] == 1) {
                    $Taxable_amount = ($request->Quantity[$i]) * ($request->Price[$i]) - $request->Discount[$i];
                } else if ($request->Discount_type[$i] == 2) {
                    $Taxable_amount = (($request->Quantity[$i]) * ($request->Price[$i])) - ((($request->Discount[$i]) / 100) * (($request->Quantity[$i]) * ($request->Price[$i])));
                }
                $tax_amount = ((($request->Tax[$i]) / 100) * ($Taxable_amount));
                $total = $Taxable_amount + $tax_amount;
                Products::create([
                    'name' => $request->product_name[$i],
                    'quantity' => $request->Quantity[$i],
                    'value' => $request->Price[$i],
                    'discount' => $request->Discount[$i],
                    'discount_type' => $request->Discount_type[$i],
                    'Taxable_amount' => $Taxable_amount,
                    'tax_rate' => $request->Tax[$i],
                    'tax_amount' => $tax_amount,
                    'invoices_id' => $invoice->id,
                    'total' => $total,
                ]);
            }
        }
        if ($request->route('id') != null) {
            return redirect()->route('ElectronicContracts');
        }
        return redirect()->route('eBills');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = invoice::find($id);
        $products = Products::where('invoices_id', '=', $id)->get();
        $Ttotal = null;
        $discount = null;
        $Taxable_amount = null;
        $tax_amount = null;
        $total = null;
        foreach ($products as $product) {
            $discount += (($product->value) * ($product->quantity)) - $product->Taxable_amount;
            $Taxable_amount += $product->Taxable_amount;
            $tax_amount += $product->tax_amount;
            $total += $product->total;
        }
        $Ttotal = ['tax_amount' => $tax_amount, 'Taxable_amount' => $Taxable_amount, 'discount' => $discount, 'total' => $total];
        return view('eBills.Invoice-show', compact('invoice', 'products', 'Ttotal'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
