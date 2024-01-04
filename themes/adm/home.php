<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
    <title>Tabela de Metas e Ações</title>
</head>

<body>
    <div class="container mt-5 ">
        <div class="d-flex">
            <h2>Tabela de Metas e Ações Charqueadas</h2>
            <form class="form-inline  ml-auto">
                <div class="d-flex w-100 ">
                    <!--d-flex e w-100 para ocupar toda a largura -->
                    <input type="text" class="form-control form-control-lg flex-grow-1 mx-2"
                        placeholder="Buscar cidade">
                    <!-- form-control-lg para aumentar a altura -->
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>

                </div>
            </form>
        </div>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Suprimentos</th>
                    <th>Meta</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Alimentos</td>
                    <td><?= $goalF; ?></td>
                    <td><?= $donatedF; ?></td>
                    <td><button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button> </td>
                </tr>
                <tr>
                    <td>Roupas</td>
                    <td><?= $goalC; ?></td>
                    <td><?= $donatedC; ?></td>
                    <td><button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button> </td>
                </tr>
                <tr>
                    <td>Materiais</td>
                    <td><?= $goalM; ?></td>
                    <td><?= $donatedM; ?></td>
                    <td><button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button> </td>
                </tr>
                <tr>
                    <td>Higiene</td>
                    <td><?= $goalH; ?></td>
                    <td><?= $donatedH; ?></td>
                    <td><button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button> </td>
                </tr>
            </tbody>
        </table>
        <section>
            <div class="d-flex">
                <h2>Notícias</h2>
              <button type="button" class="btn btn-primary ml-auto" data-bs-toggle="modal" data-bs-target="#adicionarNoticia"> Adicionar notícias</button>
            </div>
         

            <p>Adicionar notícias</p>

        </section>
     

  <div class="modal fade" id="adicionarNoticia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Adicionar notícia</h5>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                  <label for="descricao" class="form-label">Descrição</label>
                  <input type="text" class="form-control" id="descricao">
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>