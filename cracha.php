<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Criação de Crachás</title>
    <link rel="stylesheet"  href="_css/bootstrap.min.css"/>
    <link rel="stylesheet"  href="_css/estilos.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <div class="container">
      <h1 class="mt-5 mb-3 text-center"><i class="fas fa-palette"></i> Monte o layout do seu crachá</h1>
      <div class="col-sm-9 col-md-4 mx-auto">
        <a class="btn btn-warning btn-block btn-rounded" href="https://blog.even3.com.br/crachas-para-eventos-academicos/" target="_blank">Dicas de Templates</a>
      </div>
    </div>
    <div class="row mt-5 mx-0 justify-content-center text-white" style="background-color: #0a3d62">
        <div class="col-lg-4 pb-5 my-auto">
          <p class="lead">Adicione Campos:</p>
          <form class="needs-validation" onsubmit="return false">
            <div class="form-group">
              <label for="input-tag">ID da Tag:</label>
              <input class="form-control" type="text" id="formTag" placeholder="Ex.: cidade" required>
              <div class="invalid-feedback">
                Por favor insira o ID da Tag.
              </div>
            </div>
            <div class="form-group">
              <label for="input-tag">Nome <span class="text-muted">(Opcional)</span>:</label>
              <input class="form-control" type="text" id="formName" placeholder="Ex.: Recife">
            </div>
            <div class="form-row">
              <div class="col-sm-4">
                <label for="pais">Cor</label>
                <select class="custom-select d-block w-100" id="formColor">
                  <option value="black">Preto</option>
                  <option value="blue">Azul</option>
                  <option value="white">Branco</option>
                  <option value="orange">Laranja</option>
                  <option value="pink">Rosa</option>
                  <option value="green">Verde</option>
                  <option value="red">Vermelho</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="select-tamanho">Tamanho</label>
                <select class="custom-select d-block w-100" id="formSize">
                  <option value="8pt">8pt</option>
                  <option value="10pt">10pt</option>
                  <option value="12pt" selected="selected" >12pt</option>
                  <option value="14pt">14pt</option>
                  <option value="16pt">16pt</option>
                  <option value="18pt">18pt</option>
                  <option value="20pt">20pt</option>
                  <option value="22pt">22pt</option>
                </select>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="btn-group">Estilo:</label><br>
                  <div class="btn-group">
                    <button type="button" class="btn col-4" id="formBold">
                      <i class="fas fa-bold"></i>
                    </button>
                    <button type="button" class="btn col-4" id="formItalic">
                      <i class="fas fa-italic"></i>
                    </button>
                    <button type="button" class="btn col-4" id="formUnderline">
                      <i class="fas fa-underline"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="input-group">
              <input type="text" class="form-control" id="formPreview" placeholder="Pré-visualização"
              style="font-weight: bold; text-decoration: none" readonly>
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary" id="btn-gerar-tag">ADD</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-3 mb-5 pt-3">
          <div id="editorLayer">
            <div id="editorBackground">
              <img class="fundo-cracha img-fluid" src="_images/sem-fundo.png" style="width: 640px">
            </div>
          </div>
          <div class="form-row mt-3">
            <div class="col-6">
              <label class="btn btn-dark btn-block btn-lg text-truncate" style="font-size: 12pt">
                <i class="fas fa-portrait"></i>
                <input id="inserir-fundo" type="file" accept="image/*" style="display: none;">
              </label>
            </div>
            <div class="col-6">
              <label class="btn btn-block btn-primary btn-lg text-truncate" style="font-size: 12pt">Add Logo<input id="btn-add-logo" type="file" style="display: none;"></label>
            </div>
          </div>
        </div>
      </div>
    <div class="container">
      <h1 class="text-center mt-5"><i class="fas fa-paste"></i> Importe participantes</h1>
      <p class="lead text-center">Copie o conteúdo da planilha Excel, incluindo os cabeçalhos e cole aqui:</p>
      <div class="col-md-9 justify-content-center mx-auto">
        <div class="form-group">
          <textarea class="form-control" id="texto-planilha" rows="10" cols="100"></textarea>
        </div>
      </div>
      <h1 class="mt-5 mb-3 text-center"><i class="fas fa-download"></i> Baixe os crachás</h1>
      <button class="btn btn-success btn-lg btn-block m-5 col-lg-6 mx-auto" id="baixar" name="Baixar">Download</button>
    </div>
    <footer>
      <div class="footer-copyright py-5 text-center bg-black">
        2019 &copy; Henrique César:
        <a href="http://www.github.com/henrique-cesar/" target="_blank">GitHub</a>
      </div>
      <script src="_js/jquery-3.3.1.min.js"></script>
      <script src="_js/jquery-ui.min.js"></script>
      <script src="_js/bootstrap.min.js"></script>
      <script src="_js/jspdf.debug.js"></script>
      <script type="text/javascript" src="_js/editor-crachas.js"></script>
    </footer>
  </body>
</html>