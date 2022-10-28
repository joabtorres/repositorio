$('#collapseExample').on('show.bs.collapse', function () {
    hide:true
})


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