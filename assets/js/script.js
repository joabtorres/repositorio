function null_or_empty(str) {
    var v = document.getElementById(str).value;
    return v == null || v == "";
}
function valida_nFormTurma() {
    form = document.nFormTurma;
    if (null_or_empty("iCurso")
            || null_or_empty("iTurma")
            || null_or_empty("iAno")
            )
    {
        form.classList.add('was-validated');

    } else {
        form.submit();
    }
}
function valida_nFormUsuario() {
    form = document.nFormUsuario;
    if (null_or_empty("iNome")
            || null_or_empty("iEmail")
            || null_or_empty("nSenha")
            )
    {
        form.classList.add('was-validated');

    } else {
        form.submit();
    }
}
function valida_nFormPublicacao() {
    form = document.nFormPublicacao;
    if (null_or_empty("iArea")
            || null_or_empty("iTurma")
            || null_or_empty("iAutor")
            || null_or_empty("iOrientador")
            || null_or_empty("iMembro_1")
            || null_or_empty("iMembro_2")
            || null_or_empty("idata")
            || null_or_empty("iReferencia")
            || null_or_empty("iResumo")
            || null_or_empty("iPalavras-chave")
            || null_or_empty("iAbstract")
            || null_or_empty("ikeywords")
            || null_or_empty("arquivo")
            )
    {
        form.classList.add('was-validated');

    } else {
        form.submit();
    }
}

function selectTipoTurma(id) {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("iTurma").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", base_url + "home/get_tipo_turma", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("cod=" + id);
}