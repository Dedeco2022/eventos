<!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     
<style>

/* tamanho da fonte */
.input-field label {
      font-size: 16px !important; /* Forçando o tamanho com !important */
    } 



/* cor label focus  */
.input-field input:focus + label {
   color: black !important;
 }
 /* cor label underline focus  */
 .row .input-field input:focus {
   border-bottom: 1px solid black !important;
   box-shadow: 0 1px 0 0 black !important
 }

  .material-icons{
  color: black !important;
  }

.material-icons.active {
  color: black !important;
  }

/* cor checkbox */
  .checkbox-black[type="checkbox"].filled-in:checked+span:not(.lever):after {
  border: 2px solid #607d8b;
  background-color: #607d8b;
}

/* cores do radio */
[type="radio"]:checked+span:after, [type="radio"].with-gap:checked+span:after {
  background-color:black;
}

[type="radio"]:checked+span:after, [type="radio"].with-gap:checked+span:before, 
[type="radio"].with-gap:checked+span:after 
{
  border: 2px solid black;
}
  
/*cores do select */
ul.dropdown-content li>a, ul.dropdown-content li>span {
    color: #000000; /* Cor do texto das opções */
   /* background-color: #f1f1f1;  Cor de fundo das opções */
}


/* Altera a cor do fundo do cabeçalho do Datepicker */
.datepicker-date-display {
    background-color: #00aaff; /* Cor do cabeçalho */
}

/* Altera a cor do texto da data selecionada no cabeçalho */
.datepicker-date-display .year-text,
.datepicker-date-display .date-text {
    color: #fff; /* Cor do texto da data no cabeçalho */
}

/* Altera a cor dos dias do calendário */
.datepicker-table td div {
    color: #333; /* Cor dos dias */
}

/* Altera a cor de fundo dos dias ao passar o mouse */
.datepicker-table td div:hover {
    background-color: #ffcc00; /* Cor de fundo ao passar o mouse */
    color: #fff;
}

/* Altera a cor do dia selecionado */
.is-selected {
    background-color: #00aaff; /* Cor de fundo do dia selecionado */
    color: #fff; /* Cor do texto do dia selecionado */
}

/* Altera a cor dos botões de navegação (próximo e anterior) */
.datepicker-controls .datepicker-prev,
.datepicker-controls .datepicker-next {
    color: #00aaff; /* Cor das setas de navegação */
}



</style>

</head>

<body>

<main class="container"> 

    <h1 class="center-align"> Cadastrar </h1>
    <form action="insere.php" method="get">
     <div class="card-panel">
      



     <div class="row">
        <div class="input-field col s12">
        <i class="material-icons prefix"> face</i>
          <input placeholder="digite no formato 999.999.999-99" id="CPF" required pattern="[0-9][0-9][0-9]\.\d{3}\.\d{3}-\d{2}" type="text" class="validate" name="CPF"
          title="digite no formato 999.999.999-99">
          <label for="CPF">CPF</label>
          <span class="helper-text" data-error="Campo deve ser preenchido! Use XXX.XXX.XXX-XX."></span>
        </div>
      
      
      
     
      <div class="input-field col s12">
      <i class="material-icons prefix"> perm_identity</i>
      <input  id="nomeCliente" type="text" class="validate" name="nomeCliente" pattern="[A-Za-z\s]+" required>
     <label for="nomeCliente">Nome Cliente</label>
     <span class="helper-text" data-error="Preencha o campo sem usar números."> </span>
    </div>
     

    
        <div class="input-field col s12">
        <i class="material-icons prefix"> date_range</i>
          <input id="dataNasc" type="text" class="datepicker" name="dataNasc">
          <label for="dataNasc">Data nascimento</label>
        </div>
      
        <div class="input-field col s12">
      <i class="material-icons prefix"> lock</i>
      <input  id="senha" type="password" class="validate" name="senha" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}" required>
     <label for="senha">Senha</label>
     <span class="helper-text" data-error="Deve ter 6 caracteres, no mínimo e  conter pelo menos 1 maiuscula,1 minuscula e 1 número;."> </span>
    </div>


      <div class="col s12">
        <i class="material-icons prefix"> flight</i>
        <span style="margin-left: 12px;"> Escolha uma companhia: </span>
       
        <p>
          <label>
        <input class="with-gap" name="cia" type="radio"  />
        <span>Latam</span>
      </label> 
      
      <label>
        <input class="with-gap" name="cia" type="radio"  />
        <span>Gol</span>
      </label> 
      
       <label>
        <input  name="cia" type="radio"  />
        <span>Azul</span>
      </label> </p>
      </div>
      </div>
  
      
      <div class="row"> 
         <div class="input-field col s6">
          <select class="icons">
            <option value="" disabled selected>Escolha a sua Opção</option>
            <option value="Cardeal" data-icon="cardeal.jpg">Cardeal</option>
            <option value="Ema" data-icon="ema.jpg">Ema</option>
            <option value="Gansos" data-icon="gansos.jpg">Gansos</option>
          </select>
          <label style="font-size: 14px;">Qual a sua ave preferida?</label>
        </div>
</div>

<span> Doces preferidos: </span>
<p>
<label>
<input type="checkbox" /> <span>Red</span>
</label>
    </p>
    <p>
      <label>
        <input type="checkbox" checked="checked"  class="checkbox-black"/>
        <span>Yellow</span>
      </label>
    </p>
    <p>
      <label>
        <input type="checkbox" class="filled-in checkbox-black" checked="checked" />
        <span>Filled in</span>
      </label>
    </p>

  


  <div class="row"> 
  <div class="col s12">   
    <p class="center-align">  
        <button class="btn waves-effect waves-light brown  lighten-3" type="submit" name="action">Submit
    <i class="material-icons right">send</i> </button>
  </p>
</div>
</div>
  

</form>
 



</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/materialize.min.js"></script>

<script>
        // Inicializa o date picker
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            M.Datepicker.init(elems, {
                autoClose: true, // Fecha o date picker automaticamente após a seleção
                format: 'dd/mm/yyyy', // Define o formato da data
                yearRange: [1900, 2100], // Define o intervalo de anos
                
                
                onSelect: function(date) {
                    console.log('Data selecionada: ', date);
                }
            });
        }); 


        

      document.addEventListener('DOMContentLoaded', function() 
        {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });

/*

var CPF = document.getElementById("CPF");
CPF.addEventListener("input", function (event) {
  if (CPF.validity) {
    CPF.setCustomValidity(" ");
  } else {
    CPF.setCustomValidity("");
  }
}); */
</script>


</body>
</html>