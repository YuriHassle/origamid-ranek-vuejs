<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;


class TransactionController extends BaseController
{
    public function index(Request $request)
    {
        $transactions = Transaction::all();
        return $this->sendResponse($transactions->toArray(), 'Transações recuperadas com sucesso.');
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create($request->all());
        return $this->sendResponse($transaction, 'Transação criada com sucesso.', 201);
    }


    public function show(Transaction $transaction)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy()
    {
        //
    }
}
