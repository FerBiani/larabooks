@extends('layouts.app')
@section('title', 'Novo Cliente')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{ route('customers.index') }}">Clientes</a>
</li>
<li class="breadcrumb-item active">Novo Cliente</li>
@endsection
@section('content')
    <div class="col-12">
        <form action="{{ route('customers.store') }}" method="POST">

            @csrf

            <div class="card">
                <div class="card-header bg-dark text-white">
                    Cadastrar Novo Cliente
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" name="customer[name]" class="form-control"
                                value="{{ old('customer.name', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="customer[email]" class="form-control"
                                value="{{ old('customer.email', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="form-group">
                                <label>Data de nascimento</label>
                                <input type="text" name="customer[date_of_birth]" class="form-control">
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
                                <input type="text" name="address[cep]" class="form-control" id="cep"
                                value="{{ old('address.cep', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-5">
                            <div class="form-group">
                                <label>Cidade</label>
                                <input type="text" name="address[city]" class="form-control" id="city">
                            </div>
                        </div>
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <label>UF</label>
                                <input type="text" name="address[uf]" class="form-control" id="uf">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Bairro</label>
                                <input type="text" name="address[district]" class="form-control" id="district">
                            </div>
                        </div>
                        <div class="col-12 col-sm-7">
                            <div class="form-group">
                                <label>Logradouro</label>
                                <input type="text" name="address[street]" class="form-control" id="street"
                                value="{{ old('address.street', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-1">
                            <div class="form-group">
                                <label>Número</label>
                                <input type="text" name="address[number]" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Complemento</label>
                                <input type="text" name="address[complement]" class="form-control">
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
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="phones[0][number]" class="form-control"
                                value="{{ old('phone.0.number', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="phones[1][number]" class="form-control"
                                value="{{ old('phone.1.number', '') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" name="phones[2][number]" class="form-control"
                                value="{{ old('phone.2.number', '') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('blur', '#cep', function() {
            let cep = $(this).val();

            $.ajax({
                url: 'https://viacep.com.br/ws/'+cep+'/json/',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#city').val(data.localidade);
                    $('#uf').val(data.uf);
                    $('#district').val(data.bairro);
                    $('#street').val(data.logradouro);
                },
                error: function(err) {
                    console.log(err)
                }
            });
        });
    </script>
@endsection