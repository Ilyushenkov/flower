
async function add(id, count){
         fetch('/web/cart/create?id=' + id + '&count=' + count)
            .then(result=>result.text())
                .then(answer=>{let html=modal_window(id, count, answer);
                    show(html);
                });
}

async function update(Index, id, count){
    fetch('/web/cart/create?id=' + id + '&count=' + count)
        .then(result=>result.text())
        .then(answer=>{let html=modal_window(id, count, answer);
            show(html)
            table_update(Index, id, count, answer)});
}

function modal_window(id, count, answer) {
            let body = document.getElementById('myModal');
            let message1='';
            let message2='';
            answer*=1;
            if (answer===0 && count>0) message1='Извините, товар закончился.';
            if (answer>0 && count>0) message1='Товар добавлен в корзину';
            if (count<0) message1='Товар убран из корзины';
            if (answer>0 || (answer<1 && count<0)) message2=`Мы предлагаем вам купить еще ${answer-count} единиц товара`;
            let html=`
    <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title text-danger' id='exampleModalLabel'>Внимание,поступило важное сообщение!</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
       <p>${message1}</p>
       <p>${message2}</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Закрыть</button>
      </div>
    </div>
  </div>
    `
            return html;



}

 function show(html){
            let modal = document.getElementById('myModal');
            modal.innerHTML=html;
            $('#myModal').modal('show');

}

function table_update(Index, id, count, answer){
    if (answer<1) return;
    let table=document.getElementsByClassName('table')[0];
    let text=table.rows[Index].cells[2].innerText;
    text=text*1+count;
    table.rows[Index].cells[2].innerText=text;
    if (text===0) table.rows[Index].remove();
   }

   async function order_confirm(id, password){
    fetch('/web/order/create?id='+id+'&password='+password)
        .then(response=>response.text())
        .then(response=>{
            if (response*1==0){
                var html=`
                 <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title text-danger' id='exampleModalLabel'>Внимание,поступило важное сообщение!</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
       <p>Доступ к оформлению заказа запрещен</p>
      
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Закрыть</button>
      </div>
    </div>
  </div>
                `;
            }
            else {
                var html=`
                 <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title text-danger' id='exampleModalLabel'>Внимание,поступило важное сообщение!</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
       <p>Заказ успешно создан, отслеживайте его в личном кабинете.</p>       
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Закрыть</button>
      </div>
    </div>
  </div>
                `;
                document.getElementsByClassName('table')[0].remove();
                document.getElementById('confirm').remove();
            }
            show(html);

        })
   }
