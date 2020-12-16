<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::create($request['customer']);

            $customer->address()->create($request['address']);

            foreach ($request->phones as $phone) {
                $customer->phones()->create($phone);
            }

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollback();
            return back()->with('msg_error', 'Erro no servidor ao cadastrar cliente.');
        }

        return redirect()
            ->route('customers.index')
            ->with('msg_success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        DB::beginTransaction();
        try {
            //atualizando o cliente
            $customer->update($request['customer']);

            //atualizando o endereço do cliente
            $customer->address()->update($request['address']);

            //loop nos telefones que vieram do formulário
            foreach ($request->phones as $phone) {

                //se o telefone possuir um id, o telefone já existe, então...
                if ($phone['id']) {

                    //buscando o telefone do cliente com base no ID
                    $customerPhone = $customer->phones()->where('id', $phone['id']);

                    //se o delete estiver marcado, deleta
                    if (isset($phone['delete'])) {

                        $customerPhone->delete();

                    //se não, atualiza    
                    } else {
                        $customerPhone->update([
                            'number' => $phone['number']
                        ]);
                    }

                //se não, cria o telefone
                } else {
                    
                    //se o valor do número de telefone não estiver vazio, cria o telefone
                    if ($phone['number'] !== null) {
                        $customer->phones()->create($phone);
                    }

                }
            }

            DB::commit();

        } catch(\Exception $exception) {
            DB::rollback();
            return back()->with('msg_error', 'Erro no servidor ao atualizar cliente');
        }

        return redirect()
            ->route('customers.index')
            ->with('msg_success', 'Cliente atualizado com sucesso!');
    }
}
