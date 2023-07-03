let modifyOrAdd = 'add';
   let getApprovalData;

   function toggleFields() {
  const button = document.getElementById('showF');
  const fields = document.querySelector('.Fields');

  // Hide the fields initially
  fields.style.display = 'none';

  button.addEventListener('click', () => {
    fields.style.display = fields.style.display === 'none' ? 'block' : 'none';
    button.classList.toggle('pressed');


  });

  
}


function showTable() {
  var mainService = document.getElementById('MainServiceTextArea').value;

  var xhttp2 = new XMLHttpRequest();
  xhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('filteredDataContainer').insertAdjacentHTML('beforeend', this.responseText);
      
      // $('#dataTable').on('click', '#cancelRequest', updateSelectedRows);
      // $('#dataTable').on('click', '#active-btn', activateSelectedRows);
      
    }
  };
  xhttp2.open('POST', 'pages/supporting_and_approvals.php', true);
  xhttp2.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp2.send('mainService=' + mainService );


}





const progressSteps = document.querySelectorAll('.progress-step');
const progressBar = document.getElementById('progress');
const serviceBody = document.querySelector('.serviceBody');
const btnNext = document.querySelector('.btn-next');


let mainService;
let sub_service;
let company_type;

const getTableRecords = async () => {
const getTRecs = await fetch('getRecordsData.php?mainServicee=' + mainService);
const records = await getTRecs.text();
document.querySelector('#supporting_docs_table_body').innerHTML = records;

  const page2Loaded = () => {
    



$(document).ready(function() {
    $('#cancelRequest').click(function() {
        var checkedRowId = $('input[name="row"]:checked').val();
        if (checkedRowId) {
            $.ajax({
                url: 'deleteRow.php',
                type: 'POST',
                data: {id: checkedRowId},
                success: function(result) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    });
});


        var isOpen = false;
    document.getElementById("addApprovals8").addEventListener("click", function() {
      modifyOrAdd = 'add';
      document.getElementById("saveSup").setAttribute('oncilck', 'saveDocument()');
    var newRequestContainer = document.getElementById("newRequestContainer");
    

     if (isOpen) {
      newRequestContainer.style.display = "none";
      isOpen = false;
    } else {
      newRequestContainer.style.display = "block";
      isOpen = true;
    }
    supportingAdd();
});

async function supportingAdd() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', './server/getMain.php');
  xhr.onload = function() {
    if (xhr.status === 200) {
      var optionsHTML = "";
      var data = JSON.parse(xhr.responseText);
      data.forEach(function(item) {
        optionsHTML += "<option id='" + item.id + "' value='" + item.id + "'>" + item.name + "</option>";
      });

      newRequestContainer.innerHTML = `
        <div class="p2 flex">
          <div class="selectArea" id="">
            <p>الخدمة الرئيسية</p>
            <select type="text" id="main_servicees">
              <option selected disabled value="--">--</option>
              ${optionsHTML}
            </select>
          </div>
          <div class="selectArea" id="">
            <p> الخدمه الفرعيه</p>
            <input id="sub_servicees"></input>
          </div>
        </div>`;

    } else {
      console.log('Request failed.  Returned status of ' + xhr.status);
    }
          document.getElementById("main_servicees").value = mainService
          document.querySelector('#main_servicees').setAttribute('disabled', 'disabled');
                  };
  xhr.send();
}


        const approvalEditListener = () => {
          
        addOrModify = 'modify';
        const approvalEditFields = document.querySelector('#supporting_docs_table_body');
        approvalEditFields.addEventListener("click",async function(event) {

            if (event.target.matches("tr td .approvalEditBTN")) {
                       supportingAdd();

              modifyOrAdd = 'modify';
              document.getElementById("saveSup").setAttribute('onclick', 'modifyDocument2()');
              const approvalFile = event.target;
              const approvalFileNo = approvalFile.id.replace('approvalEdit','');
              document.querySelector('#addApprovals8').classList.add('disabledTabs');

             console.log("hi");
       var isOpen = false;

    document.querySelector(".approvalEditBTN").addEventListener("click", function() {
    var newRequestContainer = document.getElementById("newRequestContainer3");
        if (isOpen) {
      newRequestContainer.style.display = "none";
      isOpen = false;
    } else {
      newRequestContainer.style.display = "block";
      isOpen = true;
    }
  });
              console.log(approvalFileNo);
              
              const getApproval = await fetch('../server/getData/fetchSubServiceById.php?key='+approvalFileNo);
              getApprovalData = await getApproval.json();
              console.log(getApprovalData);
              setTimeout(() => {
                  document.querySelector('#main_servicees').value = getApprovalData['main_service_id'];
                  document.querySelector('#main_servicees').setAttribute('disabled', 'disabled');
                  document.querySelector('#sub_servicees').value = getApprovalData['name'];;
              },250)
              
            }
          });
    }
    approvalEditListener(); 
  };
  
  setTimeout(() => {
    page2Loaded();
  }, 560);
  
}


let isDisabled = true;

loadPage('page1');
progressSteps[0].classList.add('activePhase', 'progress-step-active');
progressBar.style.backgroundColor = 'red';

progressSteps.forEach((step, index) => {
  step.addEventListener('click', (event) => {
    event.preventDefault();
    const selectedTitle = step.getAttribute('data-title');

    if (selectedTitle === 'الخدمات الرئيسية') {
      isDisabled = true;
      document.querySelector('#phase18').style.pointerEvents = 'none';
      progressBar.style.backgroundColor = 'red';
      loadPage('page1');
    } else if (selectedTitle === 'الخدمات الفرعية') {
      progressBar.style.backgroundColor = 'green';
      loadPage('page2');
      getTableRecords();
        } 

    progressSteps.forEach((step) => {
      step.classList.remove('activePhase', 'progress-step-active');
    });
    step.classList.add('activePhase', 'progress-step-active');
  });
});

function loadPage(pageName) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', `pages/${pageName}.php?${Math.random()}`, true);
  xhr.onload = function () {
    if (this.status === 200) {
      if (pageName === 'page1') {
        serviceBody.innerHTML = this.responseText;
        
        showTable();
         toggleFields();
        
      } else {
        serviceBody.innerHTML = this.responseText;
        // Enable the next button if it exists
        if (btnNext) {
          btnNext.disabled = false;
        }
      }
    }
  };
  xhr.send();
} 
async function selectRow(id) {
  isDisabled = false;
  document.querySelector('#phase18').style.pointerEvents = 'auto';
  document.querySelector('#phase14').style.pointerEvents = 'auto';
  const btnNext = document.getElementById('select-btn' + id);
  progressBar.style.backgroundColor = 'green';
  btnNext.disabled = false;
  progressSteps.forEach((step) => {
    if (step.getAttribute('data-title') === 'الخدمات الفرعية') {
      step.classList.add('activePhase', 'progress-step-active');
    } else {
      step.classList.remove('activePhase', 'progress-step-active');
    }
  });

  mainService = document.querySelector(`#main_service_${id}`).id;
  mainService = mainService.replace('main_service_', '');
  console.log(mainService);

  loadPage('page2');
  
  await getTableRecords();
}







