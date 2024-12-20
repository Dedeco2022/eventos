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

function inserirUsuario(evento) {
    let tbody = document.getElementById('eventos');
    let tr = document.createElement('tr');
    let tdId = document.createElement('td');
    tdId.innerHTML = evento.id_evento;
    let tdNome = document.createElement('td');
    tdNome.innerHTML = evento.nome;
    let tdLugar = document.createElement('td');
    tdLugar.innerHTML = evento.lugar;
    let tdCategoria = document.createElement('td');
    tdCategoria.innerHTML = evento.categoria;
    let tdDia = document.createElement('td');
    tdDia.innerHTML = evento.dia;
    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');
    btnAlterar.innerHTML = "Alterar";
    btnAlterar.addEventListener("click", buscaUsuario, false);
    btnAlterar.id_evento = evento.id_evento;
    tdAlterar.appendChild(btnAlterar);
    let tdExcluir = document.createElement('td');
    let btnExcluir = document.createElement('button');
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.id_evento = evento.id_evento;
    btnExcluir.innerHTML = "Excluir";
    tdExcluir.appendChild(btnExcluir);
    tr.appendChild(tdId);
    tr.appendChild(tdNome);
    tr.appendChild(tdLugar);
    tr.appendChild(tdCategoria);
    tr.appendChild(tdDia);
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

function alterarUsuario(evento) {
    let tbody = document.getElementById('eventos');
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == evento.id_evento) {
            tr.children[1].innerHTML = evento.nome;
            tr.children[2].innerHTML = evento.lugar;
            tr.children[3].innerHTML = evento.categoria;
            tr.children[4].innerHTML = evento.dia;
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
        .then(evento => preencheForm(evento))
        .catch(error => console.log(error));
}

function preencheForm(evento) {
    let inputIDUsuario = document.getElementsByName("id_evento")[0];
    inputIDUsuario.value = evento.id_evento;
    let inputNome = document.getElementsByName("nome")[0];
    inputNome.value = evento.nome
    let inputLugar = document.getElementsByName("lugar")[0];
    inputLugar.value = evento.lugar;
    let inputCategoria = document.getElementsByName("categoria")[0];
    inputCategoria.value = evento.categoria;
    let inputDia = document.getElementsByName("dia")[0];
    inputDia.value = evento.dia;
    
}

function salvarUsuario(event) {
    // parar o comportamento padrão do form
    event.preventDefault();
    // obtém o input id_usuario
    let inputIDUsuario = document.getElementsByName("id_evento")[0];
    // pega o valor do input id_usuario
    let id_evento = inputIDUsuario.value;

    let inputNome = document.getElementsByName("nome")[0];
    let nome = inputNome.value;
    let inputLugar = document.getElementsByName("lugar")[0];
    let lugar = inputLugar.value;
    let inputCategoria = document.getElementsByName("categoria")[0];
    let categoria = inputCategoria.value;
    let inputDia = document.getElementsByName("dia")[0];
    let dia = inputDia.value;

    if (id_evento == "") {
        cadastrar(id_evento, nome, lugar, categoria, dia);
    } else {
        alterar(id_evento, nome, lugar, categoria, dia);
    }
    document.getElementsByTagName('form')[0].reset();
}

function cadastrar(id_evento, nome, lugar, categoria, dia) {
    fetch('inserir.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id_evento: id_evento,
                nome: nome,
                lugar: lugar,
                categoria: categoria,
                dia: dia
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(evento => inserirUsuario(evento))
        .catch(error => console.log(error));
}

function alterar(id_evento, nome, lugar, categoria, dia) {
    fetch('alterar.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id_evento: id_evento,
                nome: nome,
                lugar: lugar,
                categoria: categoria,
                dia: dia
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(eventos => alterarUsuario(eventos))
        .catch(error => console.log(error));
}