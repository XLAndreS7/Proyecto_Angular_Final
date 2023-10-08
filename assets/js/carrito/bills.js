
var index = 1;

window.addEventListener("DOMContentLoaded", (event) => {
  console.log("DOM fully loaded and parsed");
  createProductList();
  console.log("holi");
});


function createProductList(index) {
  let select = document.getElementById("producto_0");


  select.setAttribute("id", "producto_" + index);
  select.setAttribute("name", "producto[]");
  select.setAttribute("class", "form-control");

  

  for(let i=0; i<registros.length; i++) {
    let option = null;
    option = document.createElement('option');
    option.setAttribute('value',registros[i].id);
    option.innerHTML = registros[i].name;
    select1.append(option);
  }

  return select;
}

function createQuantity(index) {

  let input = document.createElement("input");
  input.setAttribute("id", "cantidad_" + index);
  input.setAttribute("name", "cantidad[]");
  input.setAttribute("type", "number");
  input.setAttribute("class", "form-control");

  return input;
}

function taxes(index) {
  let input = document.createElement("input");
  input.setAttribute("type", "number");
  input.setAttribute("class", "form-control");
  input.setAttribute("name", "iva[]");
  input.setAttribute("id", "iva_" + index);
  input.setAttribute("readonly", "readonly");
  input.setAttribute("value", "0");

  return input;
}

function hasTaxes(index) {
  let select = document.createElement("select");
  let option1 = document.createElement("option");
  let option2 = document.createElement("option");

  select.setAttribute("id", "tiene_iva_" + index);
  select.setAttribute("name", "tiene_iva[]");
  select.setAttribute("class", "form-control");

  option1.setAttribute("value", "S");
  option1.innerHTML = "Si";
  select.appendChild(option1);

  option2.setAttribute("value", "N");
  option2.setAttribute("selected", "selected");
  option2.innerHTML = "No";

  select.appendChild(option2);

  return select;
}

function taxValue(index) {
  let input = document.createElement("input");
  input.setAttribute("id", "iva_" + index);
  input.setAttribute("name", "iva[]");
  input.setAttribute("type", "number");
  input.setAttribute("class", "form-control");
  input.setAttribute("readonly", "readonly");
  input.setAttribute("value", 0);

  return input;
}

function enableTaxValue(index) {
  let select = document.getElementById("tiene_iva_" + index);

  let input = document.getElementById("iva_" + index);

  //console.log(select);
  //console.log(input);
  //console.log(select.value);

  if (select.value == "S") {
    input.removeAttribute("readonly");
  } else {
    input.setAttribute("readonly", "readonly");
    input.value = 0;
  }
}

let products = [];

function addLine2(){
  let producto = {};
  let productos = document.querySelectorAll('[id^="producto_"]');
  /*for(let i = 0; i < registros.length; i++){
    if(registros[i].id == productos[0].value){
      products.push(productos[i]);
      console.log(productos[i]);
    }
  }*/
  registros.forEach(element=>{
    if(element.id == productos[0].value){
      producto = element;
    }
  });
  let cantidades = document.querySelectorAll('[id^="cantidad_"]');
  let tieneIvas = document.querySelectorAll('[id^="tiene_iva_"]');
  let ivas = document.querySelectorAll('[id^="iva_"]');

  products.push({prod : producto, cantidad: cantidades[0].value, tieneIva: tieneIvas[0].value, iva: ivas[0].value});
  crearTablaCarro();
  totalCalculation2();
}

function crearTablaCarro(){
  let tbody = document.getElementById("carro");
  tbody.innerHTML = "";
  for(let i = 0; i < products.length; i++){
    let tr = document.createElement("tr");

    let td = document.createElement("td");
    let label = document.createElement('label');
    label.textContent = products[i].prod.name;
    label.setAttribute('value',products[i].prod.name);
    td.append(label);
    tr.append(td);

    let td1 = document.createElement("td");
    let label1 = document.createElement('label');
    label1.textContent = products[i].cantidad;
    label1.setAttribute('value',products[i].cantidad);
    td1.append(label1);
    tr.append(td1);

    let td2 = document.createElement("td");
    let label2 = document.createElement('label');
    label2.textContent = products[i].tieneIva;
    label2.setAttribute('value',products[i].tieneIva);
    td2.append(label2);
    tr.append(td2);

    let td3 = document.createElement("td");
    let label3 = document.createElement('label');
    label3.textContent = products[i].iva;
    label3.setAttribute('value',products[i].iva);
    td3.append(label3);
    tr.append(td3);
    tbody.append(tr);
  }
  
}

function addLine() {

  let containerNew = document.getElementById("container-new");

  let className = index % 2 == 1 ? "even" : "odd";

  let row = document.createElement("div");
  row.setAttribute("class", "row");
  row.setAttribute("id", "row-"+index);

  //Se crea el div del producto
  let col3 = document.createElement("div");
  col3.setAttribute("class", "col-3 " + className);

  let col12 = document.createElement("div");
  col12.setAttribute("class", "col-12");

  let label1 = document.createElement("label");
  label1.setAttribute("class", "form-label");
  label1.innerHTML = "Producto";

  col12.appendChild(label1);

  col3.appendChild(col12);

  let col12_2 = document.createElement("div");
  col12_2.setAttribute("class", "col-12");

  let producto = createProductList(index);

  col12_2.appendChild(producto);

  col3.appendChild(col12_2);

  row.appendChild(col3);

  //Se crea el div de la cantidad de productos

  let col12_3 = document.createElement("div");
  col12_3.setAttribute("class", "col-12");

  let label2 = document.createElement("label");
  label2.setAttribute("class", "form-label");
  label2.innerHTML = "Cantidad";

  col12_3.appendChild(label2);

  let col3_2 = document.createElement("div");
  col3_2.setAttribute("class", "col-3 " + className);

  col3_2.appendChild(col12_3);

  let col12_4 = document.createElement("div");
  col12_4.setAttribute("class", "col-12");
  let cantidad = createQuantity(index);

  col12_4.appendChild(cantidad);

  col3_2.appendChild(col12_4);

  row.appendChild(col3_2);

  //Se crea el div de tiene IVA o no

  let col3_3 = document.createElement("div");
  col3_3.setAttribute("class", "col-3 " + className);

  let col12_6 = document.createElement("div");
  col12_6.setAttribute("class", "col-12");

  let label3 = document.createElement("label");
  label3.setAttribute("class", "form-label");
  label3.innerHTML = "Tiene IVA?";

  let tieneIva = hasTaxes(index);

  col12_6.appendChild(label3);
  col12_6.appendChild(tieneIva);
  col3_3.appendChild(col12_6);
  row.appendChild(col3_3);

  tieneIva.setAttribute("onChange", "enableTaxValue(" + index + ")");

  //Se crea el div del valor del IVA

  let col3_4 = document.createElement("div");
  col3_4.setAttribute("class", "col-3 " + className);

  let col12_7 = document.createElement("div");
  col12_7.setAttribute("class", "col-12");

  let label4 = document.createElement("label");
  label4.setAttribute("class", "form-label");
  label4.innerHTML = "% IVA";

  let iva = taxValue(index);

  col12_7.appendChild(label4);
  col12_7.appendChild(iva);
  col3_4.appendChild(col12_7);
  row.appendChild(col3_4);

  let col12_8 = document.createElement("div");
  col12_8.setAttribute("class", "d-flex aligns-items-center justify-content-center my-3");
  let newDeleteBtn = createDeleteBtn('row-'+index);

  col12_8.appendChild(newDeleteBtn);
  row.appendChild(col12_8);

  containerNew.appendChild(row);

  index++;

  console.log("index: " + index);
}

function createDeleteBtn(id) {
  let btn = document.createElement('input');
  btn.setAttribute('type', 'button');
  btn.setAttribute('value', 'Delete');
  btn.setAttribute("onclick", "borrar_div('" + id + "')");
  return btn;
}

function borrar_div(id) {

  let div = document.getElementById(id);
  div.remove();
  totalCalculation();
}

function totalCalculation2(){
  let total = 0;
  products.forEach(element =>{
    total += element.prod.precio * element.cantidad;
  });
  let totalIva = 0;
  products.forEach(element =>{
    if(element.tieneIva == "S"){
      totalIva += element.prod.precio * element.cantidad *((parseInt(element.iva) / 100));
    }
  });
  let totalField = document.getElementById('total_factura');
  totalField.innerHTML = total;

  let ivaTotal = document.getElementById('total_iva_factura');
  ivaTotal.innerHTML = totalIva;
  let totalConIva = document.getElementById('promedio_producto');
totalConIva.innerHTML = total+totalIva;
}

function totalCalculation() {

  let productos = document.querySelectorAll('[id^="producto_"]');
  console.log(productos);

  let cantidades = document.querySelectorAll('[id^="cantidad_"]');
  console.log(cantidades);

  let tieneIvas = document.querySelectorAll('[id^="tiene_iva_"]');
  console.log(tieneIvas);

  let ivas = document.querySelectorAll('[id^="iva_"]');
  console.log(ivas);

  let totalGeneral = 0;
  let numeroProductos = 0;
  let totalIva = 0;

  for (let i = 0; i < productos.length; i++) {

    let totalLinea = 0;
    let valorIva = 0;
    
    let valorProd = 0;

    registros.forEach(element => {
      if(element.id == productos[i].value){
        valorProd = element.precio;
      }
    });
    totalLinea = valorProd * parseInt(cantidades[i].value);
    numeroProductos += parseInt(cantidades[i].value);

    console.log("Total linea[" + i + "]: " + (totalLinea));

    totalGeneral += totalLinea;

    if (tieneIvas[i].value == "S") {
      valorIva = totalLinea * ((parseInt(ivas[i].value) / 100));
    }

    totalIva += valorIva;
  }

  console.log("Total General: " + totalGeneral);
  console.log("Total IVA: " + totalIva);
  console.log("numeroProductos : " + numeroProductos);

  let total = document.getElementById('total_factura');
  total.innerHTML = totalGeneral;

  let ivaTotal = document.getElementById('total_iva_factura');
  ivaTotal.innerHTML = totalIva;

  let precioPormedio = document.getElementById('promedio_producto');
  precioPormedio.innerHTML = (totalGeneral / numeroProductos);

}

function removeLine(index) {

}