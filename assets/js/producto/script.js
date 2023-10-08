window.addEventListener('DOMContentLoaded', (event) => {
  document.getElementById("btn-create").addEventListener("click", shows_edit_table);
  //document.getElementById("read-content").classList.add("hidden");
  document.getElementById("edit-content").classList.add("hidden");

});

function shows_edit_table(){
  let rows = document.getElementById('rows').value;
  document.getElementById("edit-content").classList.remove("hidden");
  console.log('rows ' + rows);

  let tBody = document.createElement("tbody");

  for(let i = 0; i < rows; i++){

    let tr = document.createElement("tr");
  
    let td0 = document.createElement("td");
    let input0 = document.createElement('input');
    input0.setAttribute('id','identificador'+i);
    input0.setAttribute('name','identificador[]');
    input0.required = true; 
    td0.append(input0);
    tr.append(td0);

    let td1 = document.createElement("td");
    let input1 = document.createElement('input');
    input1.setAttribute('id','nombre'+i);
    input1.setAttribute('name','nombre[]');
    input1.required = true; 
    td1.append(input1);
    tr.append(td1);

    let td1_0 = document.createElement("td");
    let input1_0 = document.createElement('input');
    let select1 = document.createElement('select');
    select1.setAttribute('name','tipo[]');
    select1.setAttribute('id','tipo'+i);
    td1_0.append(select1);
    tr.append(td1_0);

    for(let i=0; i<tipos.length; i++) {
      let option = null;
      option = document.createElement('option');
      option.setAttribute('value',tipos[i].id);
      option.innerHTML = tipos[i].name;
      select1.append(option);
    }
    
    let td1_1 = document.createElement("td");
    let input1_1 = document.createElement('input');
    input1_1.setAttribute('id','precio'+i);
    input1_1.setAttribute('name','precio[]');
    input1_1.required = true; 
    td1_1.append(input1_1);
    tr.append(td1_1);

    let td2 = document.createElement("td");
    let input2 = document.createElement('input');
    input2.setAttribute('id','cantidad'+i);
    input2.setAttribute('name','cantidad[]');
    td2.append(input2);
    tr.append(td2);

    let td3 = document.createElement("td");
    let input3 = document.createElement('input');
    input3.setAttribute('id','foto'+i);
    input3.setAttribute('name','foto[]');
    td3.append(input3);
    tr.append(td3);

    let td4 = document.createElement("td");
    let input4 = document.createElement('input');
    input4.setAttribute('id','detalles'+i);
    input4.setAttribute('name','detalles[]');
    td4.append(input4);
    tr.append(td4);
  
    tBody.append(tr);
  }

  add_element_to_table('edit',tBody);

  add_button_create_read_only_table();
}

function add_header_to_table(type, newTHeader){
  let table = document.getElementById(type+'-table');
  let tHead = table.getElementsByTagName('thead')[0];
  tHead.parentNode.removeChild(tHead);
  table.appendChild(newTHeader);
}

function add_element_to_table(type, newTBody){
  let table = document.getElementById(type+'-table');
  let tBody = table.getElementsByTagName('tbody')[0];
  tBody.parentNode.removeChild(tBody);
  table.appendChild(newTBody);
}

function add_button_create_read_only_table(){
  let actionButton = document.getElementById('action-button');
  actionButton.setAttribute('type','button');
  actionButton.setAttribute('value','Crear Nueva Tabla');
  actionButton.addEventListener("click", create_read_only_table);
}

function create_read_only_table(){
  //alert('button event trigered!');

  let tBody = document.createElement("tbody");
  let tHead = document.createElement("thead");

  let titles_list = get_all_titles();

  for(let j = 0; j < titles_list.length; j++){
    let th = document.createElement("th");
    th.innerHTML = titles_list[j];
    tHead.append(th);
  }

  add_header_to_table('read',tHead);

  let data_list = get_all_data();

  for(let i = 0; i < data_list.length/cols; i++){

    let tr = document.createElement("tr");
    
    for(let j = i*cols; j < (i+1)*cols; j++){
      let td = document.createElement("td");
      
      td.innerHTML = data_list[j];
      
      tr.append(td);
      console.log(td.innerHTML);
    }

    tBody.append(tr);
  }

  add_element_to_table('read',tBody);



  document.getElementById("read-content").classList.remove("hidden");
}

function get_all_titles(){
  let titles = document.querySelectorAll("input[id*='title-']");

  let title_array = [];

  titles.forEach(function(element, index){
    title_array[index] = element.value;
  });

  //console.log(title_array);
  return title_array;
}

function get_all_data(){
  let data = document.querySelectorAll("input[id*='data-']");

  let data_array = [];

  data.forEach(function(element, index){
    data_array[index] = element.value;
  });

  console.log(data_array);
  return data_array;
}



