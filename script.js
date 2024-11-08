document.addEventListener("DOMContentLoaded", () => {
    listarTodos();
});

function listarTodos() {
    fetch("listar.php",
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(eventos => inserirUsuarios(eventos))
        .catch(error => console.log(error));
}

function inserirUsuarios(eventos) {
    for (const evento of eventos) {
        inserirUsuario(evento);
    }
}

function inserirUsuario(eventos) {
    let tbody = document.getElementById('eventos');
    let tr = document.createElement('tr');
    let tdId = document.createElement('td');
    tdId.innerHTML = eventos.id_evento;
    let tdNome = document.createElement('td');
    tdNome.innerHTML = eventos.nome;
    let tdData = document.createElement('td');
    tdData.innerHTML = eventos.data;
    let tdLocal = document.createElement('td');
    tdLocal.innerHTML = eventos.local;
    let tdCategoria = document.createElement('td');
    tdCategoria.innerHTML = eventos.categoria;
    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');
    btnAlterar.innerHTML = "Alterar";
    btnAlterar.addEventListener("click", buscaUsuario, false);
    btnAlterar.id_evento = eventos.id_evento;
    tdAlterar.appendChild(btnAlterar);
    let tdExcluir = document.createElement('td');
    let btnExcluir = document.createElement('button');
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.id_evento = eventos.id_evento;
    btnExcluir.innerHTML = "Excluir";
    tdExcluir.appendChild(btnExcluir);
    tr.appendChild(tdId);
    tr.appendChild(tdNome);
    tr.appendChild(tdData);
    tr.appendChild(tdLocal);
    tr.appendChild(tdCategoria)
    tr.appendChild(tdAlterar);
    tr.appendChild(tdExcluir);
    tbody.appendChild(tr);
}

function excluir(evt) {
    let id_evento = evt.currentTarget.id_evento;
    let excluir = confirm("Você tem certeza que deseja excluir este usuário?");
    if (excluir == true) {
        fetch('excluir.php?id_evento=' + id_evento,
            {
                method: "GET",
                headers: { 'Content-Type': "application/json; charset=UTF-8" }
            }
        )
            .then(response => response.json())
            .then(retorno => excluirUsuario(retorno, id_evento))
            .catch(error => console.log(error));
    }
}

function excluirUsuario(retorno, id_evento) {
    if (retorno == true) {
        let tbody = document.getElementById('eventos');
        for (const tr of tbody.children) {
            if (tr.children[0].innerHTML == id_evento) {
                tbody.removeChild(tr);
            }
        }
    }
}

function alterarUsuario(eventos) {
    let tbody = document.getElementById('eventos');
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == eventos.id_evento) {
            tr.children[1].innerHTML = eventos.nome;
            tr.children[2].innerHTML = eventos.data;
            tr.children[3].innerHTML = eventos.local;
            tr.children[4].innerHTML = eventos.categoria;
        }
    }
}

function buscaUsuario(evt) {
    let id_evento = evt.currentTarget.id_evento;
    fetch('buscaUsuario.php?id_evento=' + id_evento,
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(eventos => preencheForm(eventos))
        .catch(error => console.log(error));
}

function preencheForm(eventos) {
    let inputIDEvento = document.getElementsByName("id_evento")[0];
    inputIDEvento.value = eventos.id_evento;
    let inputNome = document.getElementsByName("nome")[0];
    inputNome.value = eventos.nome
    let inputData = document.getElementsByName("data")[0];
    inputData.value = eventos.data;
    let inputLocal = document.getElementsByName("local")[0];
    inputLocal.value = eventos.local;
    let inputCategoria = document.getElementsByName("categoria")[0];
    inputCategoria.value = eventos.categoria;
}

function salvarUsuario(event) {
    // parar o comportamento padrão do form
    event.preventDefault();
    // obtém o input id_usuario
    let inputIDEvento = document.getElementsByName("id_evento")[0];
    // pega o valor do input id_evento
    let id_evento = inputIDEvento.value;

    let inputNome = document.getElementsByName("nome")[0];
    let nome = inputNome.value;
    let inputData = document.getElementsByName("data")[0];
    let data = inputData.value;
    let inputLocal = document.getElementsByName("local")[0];
    let local = inputLocal.value;
    let inputCategoria = document.getElementsByName("categoria")[0];
    let categoria = inputCategoria.value;

    if (id_evento == "") {
        cadastrar(id_evento, nome, data, local, categoria);
    } else {
        alterar(id_evento, nome, data, local, categoria);
    }
    document.getElementsByTagName('form')[0].reset();
}

function cadastrar(id_evento, nome, data, local, categoria) {
    fetch('inserir.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id_evento: id_evento,
                nome: nome,
                data: data,
                local: local,
                categoria: categoria
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(usuario => inserirUsuario(usuario))
        .catch(error => console.log(error));
}

function alterar(id_evento, nome, data, local, categoria) {
    fetch('alterar.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id_evento: id_evento,
                nome: nome,
                data: data,
                local: local,
                categoria: categoria
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(usuario => alterarUsuario(usuario))
        .catch(error => console.log(error));
}