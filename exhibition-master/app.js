var wrap = document.getElementById('wrap');

function radio(json) {
  var str = '';

  for(var i = 0;  i < 32; i++){
        var category = json.data[i].category; //범주
        var n = json.data[i].num;             //범주번호
        var question = json.data[i].question; //질문
        var value = json.data[i].value;       //점수
        var answer = json.data[i].answer;     //대답

        //<div class="${"Q" + n}"></div>
        str += `Q. <strong>${question}</strong>`;
        str += `<div class="${category + n}">`;
        for(var j = 0; j < 5; j++){
          if(value[j] == "1")
            str += `<input type="radio" name="${category + n}" value="${value[j]}" checked><label>${answer[j]}</label>`;
          else
            str += `<input type="radio" name="${category + n}" value="${value[j]}"><label>${answer[j]}</label>`;
        }
        str += '</div>'; //문제마다 줄바꿈//radioBtn[i].checked = true;
  }

  wrap.innerHTML = str;
}

getUrlData(radio);

function getUrlData(callback) {
  fetch('./data.json')
  .then(function(response){
      response.json().then(function(data){
          // console.log(data);
          callback(data)
      });
  })
  .catch(function(err){
      console.log('Fetch Error :-S', err);
  });
}
