<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dafiti - Tech Challange</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

    </head>
    <body>
        <header>
            <nav class="navbar navbar-light bg-light shadow">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" height="30" class="d-inline-block mr-3" alt="Dafiti logo">
                    Dafiti - PHP Tech Challange
                </a>
            </nav>
        </header>
        <main>
            <div class="container mt-5 mb-3">
                <div class="row">
                    <div class="col-auto ml-auto mb-4">
                        <div class="card">
                            <div class="card-body p-2">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreateItem">+ Adicionar item</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="containerItemsList"></div>
            </div>

            <!-- Modal Create Item -->
            <div class="modal fade" id="modalCreateItem" tabindex="-1" aria-labelledby="modalCreateItemLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCreateItemLabel">Adicionar item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('api/shirts') }}" method="post" id="createForm">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="newName">Nome</label>
                                            <input type="text" name="name" class="form-control" id="newName" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="newDescription">Descrição</label>
                                            <textarea name="description" rows="3" class="form-control" id="newDescription" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="newColor">Cor</label>
                                            <select name="color" class="form-control" id="newColor" required>
                                                <option value="Blue">Blue</option>
                                                <option value="Green">Green</option>
                                                <option value="Rose">Pink</option>
                                                <option value="Red">Red</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="newSize">Tamanho</label>
                                            <select type="text" name="size" class="form-control" id="newSize" required>
                                                <option value="P">P</option>
                                                <option value="M">M</option>
                                                <option value="G">G</option>
                                                <option value="GG">GG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="newMaterial">Material</label>
                                            <input type="text" name="material" class="form-control" id="newMaterial" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="newBrand">Marca</label>
                                            <input type="text" name="brand" class="form-control" id="newBrand" required>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="newPrice">Preço</label>
                                            <input type="number" step="0.01" data-inputmask="'alias': 'currency'" name="price" class="form-control" id="newPrice" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success">Adicionar item</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Create Item -->
            <div class="modal fade" id="modalEditItem" tabindex="-1" aria-labelledby="modalEditItemLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditItemLabel">Editar item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST" id="editForm">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="editName">Nome</label>
                                            <input type="text" name="name" class="form-control" id="editName" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="editDescription">Descrição</label>
                                            <textarea name="description" rows="3" class="form-control" id="editDescription" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="editColor">Cor</label>
                                            <select name="color" class="form-control" id="editColor" required>
                                                <option value="Blue">Blue</option>
                                                <option value="Green">Green</option>
                                                <option value="Rose">Pink</option>
                                                <option value="Red">Red</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="editSize">Tamanho</label>
                                            <select type="text" name="size" class="form-control" id="editSize" required>
                                                <option value="P">P</option>
                                                <option value="M">M</option>
                                                <option value="G">G</option>
                                                <option value="GG">GG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="editMaterial">Material</label>
                                            <input type="text" name="material" class="form-control" id="editMaterial" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="editBrand">Marca</label>
                                            <input type="text" name="brand" class="form-control" id="editBrand" required>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="editPrice">Preço</label>
                                            <input type="number" step="0.01" data-inputmask="'alias': 'currency'" name="price" class="form-control" id="editPrice" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col text-right">
                                        <input type="hidden" name="_method" value="PUT">
                                        <button type="submit" class="btn btn-warning">Salvar alterações</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <footer>
            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}" ></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script type="text/javascript">
                const urlBase = `http://localhost:8000`;

                // READ ALL | LIST
                function listAll() {
                    $.getJSON(`${urlBase}/api/shirts`, function(data) {
                        if (data) {
                            $('#containerItemsList').html(data.map((shirt) => {
                                return `<div class="col-4 mb-4 item-card" data-id="${shirt.id}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="font-weight-bold h5">${shirt.name}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col pb-4">
                                                    <div class="card m-auto">
                                                        <div class="card-body p-2">
                                                            <p class="text-justify">${shirt.description}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-3 font-weight-bold h5">${shirt.brand}</p>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-3 text-right font-weight-bold"><small>R$</small> ${parseFloat(shirt.price).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <p class="m-0"><strong>Cor:</strong> ${shirt.color}</p>
                                                    <p class="m-0"><strong>Tamanho:</strong> ${shirt.size}</p>
                                                    <p class="m-0"><strong>Material:</strong> ${shirt.material}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col d-flex pt-3">
                                                    <button class="btn btn-warning btn-sm mr-2 ml-auto" onclick="editItem(${shirt.id})">Editar</button>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteItem(${shirt.id}, '${shirt.name}')">Remover</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            }).join(''));
                        }
                    });
                }

                listAll();


                // CREATE ITEM
                let formCreate = $('#createForm');

                formCreate.submit(function (e) {
                    e.preventDefault();

                    $('#createForm button[type="submit"]').html('Adicionando...').attr('disabled', true);
                    
                    $.ajax({
                        type: formCreate.attr('method'),
                        url: formCreate.attr('action'),
                        processData: false,
                        contentType: false,
                        data: new FormData(formCreate[0]),
                        success: function (result) {
                            console.log(result);

                            Swal.fire({
                                title: 'Cadastro realizado!',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            });

                            formCreate[0].reset();
                            $('#createForm button[type="submit"]').html('Adicionar item').attr('disabled', false);
                            $('#modalCreateItem').modal('hide');
                        },
                        error: function (result) {
                            console.log(result);

                            Swal.fire({
                                title: 'Oops!',
                                text: 'Não foi possível realizar o cadastro',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });

                            $('#createForm button[type="submit"]').html('Adicionar item').attr('disabled', false);
                        },
                    });
                });

                
                // EDIT ITEM
                function editItem(id) {
                    Swal.showLoading();

                    let formEdit = $('#editForm');

                    formEdit.attr('action', `${urlBase}/api/shirts/${id}`);
                    formEdit[0].reset();

                    $.getJSON(`${urlBase}/api/shirts/${id}`, function(data) {
                        console.log(data);
                        
                        $('#editName').val(data.name);
                        $('#editDescription').val(data.description);
                        $('#editColor').val(data.color).trigger('change');
                        $('#editSize').val(data.size).trigger('change');
                        $('#editMaterial').val(data.material);
                        $('#editBrand').val(data.brand);
                        $('#editPrice').val(data.price);

                        formEdit.submit(function (e) {
                            e.preventDefault();

                            $('#editForm button[type="submit"]').html('Salvando...').attr('disabled', true);
                            
                            serializeForm = formEdit.serializeArray();
                            var shirtData = {};
                            shirtData.id = id;
                            
                            for(s in serializeForm){
                                shirtData[serializeForm[s]['name']] = serializeForm[s]['value']
                            }

                            $.ajax({
                                type: formEdit.attr('method'),
                                url: formEdit.attr('action'),
                                processData: false,
                                contentType: false,
                                data: new FormData(formEdit[0]),
                                success: function (result) {
                                    console.log(result);

                                    Swal.fire({
                                        title: 'Alterações salvas!',
                                        icon: 'success',
                                        confirmButtonText: 'Ok'
                                    });

                                    formEdit[0].reset();
                                    $('#editForm button[type="submit"]').html('Salvar alterações').attr('disabled', false);
                                    $('#modalEditItem').modal('hide');

                                    $(`#containerItemsList .item-card[data-id="${shirtData.id}"]`).html(`<div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="font-weight-bold h5">${shirtData.name}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col pb-4">
                                                    <div class="card m-auto">
                                                        <div class="card-body p-2">
                                                            <p class="text-justify">${shirtData.description}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <p class="mb-3 font-weight-bold h5">${shirtData.brand}</p>
                                                </div>
                                                <div class="col">
                                                    <p class="mb-3 text-right font-weight-bold"><small>R$</small> ${parseFloat(shirtData.price).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <p class="m-0"><strong>Cor:</strong> ${shirtData.color}</p>
                                                    <p class="m-0"><strong>Tamanho:</strong> ${shirtData.size}</p>
                                                    <p class="m-0"><strong>Material:</strong> ${shirtData.material}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col d-flex pt-3">
                                                    <button class="btn btn-warning btn-sm mr-2 ml-auto" onclick="editItem(${shirtData.id})">Editar</button>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteItem(${shirtData.id}, '${shirtData.name}')">Remover</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`);
                                },
                                error: function (result) {
                                    console.log(result);

                                    Swal.fire({
                                        title: 'Oops!',
                                        text: 'Não foi possível atualizar o registro',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });

                                    $('#editForm button[type="submit"]').html('Salvar alterações').attr('disabled', false);
                                },
                            });
                        });
                        
                        $('#modalEditItem').modal('show');

                        Swal.close();
                    });
                }

                // DELETE ITEM
                function deleteItem (id, itemName) {
                    Swal.fire({
                        icon: 'question',
                        html: `Deseja remover o item <strong>${itemName}</strong>?`,
                        showCancelButton: true,
                        confirmButtonText: 'Remover',
                        cancelButtonText: 'Cancelar',
                        customClass: {
                            actions: 'd-flex justify-content-between w-100 pr-3 pl-3',
                            confirmButton: 'btn btn-danger',
                            cancelButton: 'btn btn-secondary'
                        },
                        buttonsStyling: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.showLoading();
                            $.ajax({
                                type: 'DELETE',
                                url: `${urlBase}/api/shirts/${id}`,
                                success: function (result) {
                                    console.log(result);
                                    
                                    $(`#containerItemsList .item-card[data-id="${id}"]`).remove();

                                    Swal.fire({
                                        title: 'Item removido!',
                                        icon: 'success',
                                        confirmButtonText: 'Ok'
                                    });
                                },
                                error: function (result) {
                                    console.log(result);

                                    Swal.fire({
                                        title: 'Oops!',
                                        text: 'Não foi possível remover o item do cadastro',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                },
                            });
                        }
                    });
                }

            </script>
        </footer>
    </body>
</html>
