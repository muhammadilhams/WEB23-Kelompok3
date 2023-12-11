<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index() {
        $payments = Payment::latest()->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function paymentStore(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'total_payment' => 'required',
        ]);

        // Upload bukti pembayaran
        if ($request->hasFile('bukti')) {
            $image = $request->file('bukti');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $image->storeAs('assets/payments/', $imageName, 'public');
        }

        Payment::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'bukti' => $imageName,
            'total_payment' => $request->input('total_payment')
        ]);

        return redirect()->back()->with([
            'message' => 'Pembayaran berhasil',
            'alert-type' => 'success',
        ]);
    }

    public function destroy(Payment $payment) {
        $payment->delete();

        return redirect()->back()->with([
            'message' => 'Data berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }

    public function pay() {
        return view('user.payments');
    }
}
