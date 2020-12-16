@extends('layouts.app')
@section('title', 'Editar Cliente')
@section('content')

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="customer[name]" class="form-control"
                    value="{{ old('customer.name', $customer->name) }}">
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="customer[email]" class="form-control"
                    value="{{ old('customer.email', $customer->email) }}">
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <div class="form-group">
                    <label>Data de nascimento</label>
                    <input type="text" name="customer[date_of_birth]" class="form-control"
                    value="{{ old('customer.date_of_birth', $customer->date_of_birth) }}">
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h6>Endereço</h6>
                <hr>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12 col-sm-2">
                <div class="form-group">
                    <label>CEP</label>
                    <input type="text" name="address[cep]" class="form-control"
                    value="{{ old('address.cep', $customer->address->cep) }}">
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <div class="form-group">
                    <label>Cidade</label>
                    <input type="text" name="address[city]" class="form-control"
                    value="{{ old('address.cep', $customer->address->city) }}">
                </div>
            </div>
            <div class="col-12 col-sm-1">
                <div class="form-group">
                    <label>UF</label>
                    <input type="text" name="address[uf]" class="form-control"
                    value="{{ old('address.uf', $customer->address->uf) }}">
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Bairro</label>
                    <input type="text" name="address[district]" class="form-control"
                    value="{{ old('address.district', $customer->address->district) }}">
                </div>
            </div>
            <div class="col-12 col-sm-7">
                <div class="form-group">
                    <label>Logradouro</label>
                    <input type="text" name="address[street]" class="form-control"
                    value="{{ old('address.street', $customer->address->street) }}">
                </div>
            </div>
            <div class="col-12 col-sm-1">
                <div class="form-group">
                    <label>Número</label>
                    <input type="text" name="address[number]" class="form-control"
                    value="{{ old('address.number', $customer->address->number) }}">
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-group">
                    <label>Complemento</label>
                    <input type="text" name="address[complement]" class="form-control"
                    value="{{ old('address.complement', $customer->address->complement) }}">
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h6>Telefones</h6>
                <hr>
            </div>
        </div>

        <div class="row mt-2">
            @foreach($customer->phones as $key => $phone)
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="hidden" name="phones[{{ $key }}][id]" value="{{ $phone->id }}">
                                <input type="text" name="phones[{{ $key }}][number]" class="form-control"
                                value="{{ $phone->number }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <label>Deletar</label>
                            <input type="checkbox" name="phones[{{ $key }}][delete]">
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12 col-sm-4">
                <div class="form-group">

                    <?php
                        $newPhoneKey = count($customer->phones);
                    ?>

                    <label>Telefone</label>
                    <input type="hidden" name="phones[{{ $newPhoneKey }}][id]" value="">
                    <input type="text" name="phones[{{ $newPhoneKey }}][number]" class="form-control"
                    value="{{ old('phone.$newPhoneKey.number', '') }}">

                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-success">Enviar</button>
@endsection