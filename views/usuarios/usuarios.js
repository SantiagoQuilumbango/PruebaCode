function init() {
  $().on("submit", (e) => {
    GuardarEditar();
  });
}

$().ready(() => {
  CargaLista();
});

var CargaLista = () => {};

var GuardarEditar = (e) => {
  e.preventDefault();
};
