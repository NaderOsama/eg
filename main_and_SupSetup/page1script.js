function updateStatus(id, status) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhr.open("POST", "update_status.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("id=" + id + "&status=" + status);
        location.reload();

}

function deleteSelectedRows() {
    var selectedRows = document.getElementsByName("selectedRows[]");
    var selectedRowIds = [];
    for (var i = 0; i < selectedRows.length; i++) {
        if (selectedRows[i].checked) {
            selectedRowIds.push(selectedRows[i].value);
        }
    }
    console.log(selectedRowIds);
    if (selectedRowIds.length > 0) {
        if (confirm("هل أنت متأكد من حذف الصفوف المختارة؟")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                         location.reload();
                    } else {
                        alert("حدث خطأ أثناء حذف الصفوف المختارة.");
                    }
                }
            };
            xhr.open("POST", "deleteSelectedFromP1.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("selectedRows=" + selectedRowIds);
        }
    } else {
        alert("يرجى تحديد الصفوف التي تريد حذفها.");
    }
}


function deleteSelectedRowsSup() {
    var selectedRows = document.getElementsByName("selectedRows[]");
    var selectedRowIds = [];
    for (var i = 0; i < selectedRows.length; i++) {
        if (selectedRows[i].checked) {
            selectedRowIds.push(selectedRows[i].value);
        }
    }
    console.log(selectedRowIds);
    if (selectedRowIds.length > 0) {
        if (confirm("هل أنت متأكد من حذف الصفوف المختارة؟")) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                         location.reload();
                    } else {
                        alert("حدث خطأ أثناء حذف الصفوف المختارة.");
                    }
                }
            };
            xhr.open("POST", "deleteRowSup.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("selectedRows=" + selectedRowIds);
        }
    } else {
        alert("يرجى تحديد الصفوف التي تريد حذفها.");
    }
}


function saveFormData() {
  event.preventDefault(); // prevent form submission
  const mainService = document.getElementById('MainServiceTextArea').value;

if (mainService === '') {
  isValid = false;
  const mainServiceInput = document.getElementById('MainServiceTextArea');
  mainServiceInput.style.border = '1px solid red';
  mainServiceInput.dataset.originalBorderColor = mainServiceInput.style.borderColor;
  mainServiceInput.addEventListener('change', function () {
    mainServiceInput.style.border = '1px solid gray';
  });
}


  if (isValid) {
    document.getElementById('saveRequestInfoInput').click();
    var xhttp1 = new XMLHttpRequest();
    xhttp1.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;

        if (response === 'Record already exists') {
          alert('هذه البيانات موجودة من قبل');
        } else if (response === 'Data saved successfully!') {
          alert('تم حفظ البيانات بنجاح!');
           location.reload();
        } else {
          document.getElementById('filteredDataContainer').innerHTML = response;
        }
      }
    };
    xhttp1.open('POST', 'pages/save_supporting_approvals.php', true);
    xhttp1.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp1.send('mainService=' + encodeURIComponent(mainService));
    // location.reload();
  }
}


      if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;

        if (response === 'Record already exists') {
          alert('هذه البيانات موجودة من قبل');
        } else if (response === 'Data saved successfully!') {
          alert('تم حفظ البيانات بنجاح!');
           location.reload();
        } else {
          document.getElementById('filteredDataContainer').innerHTML = response;
        }
      }

function modifyDocument() {
  const main_servicees = document.getElementById("MainServiceTextArea").value;
  
  // Check if main_servicees and getApprovalData.id have valid values
  if (main_servicees && getApprovalData && getApprovalData.id) {
    const formData = {
      id: getApprovalData.id,
      main_servicees: main_servicees
    };

    fetch("updateMainServices.php", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json"
      }
    })
      .then(response => response.text())
      .then(result => {
        console.log(result);
        location.reload();
      })
      .catch(error => {
        console.error(error);
      });
  } else {
    console.error("Invalid main_servicees or getApprovalData.id");
  }
}
function modifyDocument2() {
  const sub_servicees = document.getElementById("sub_servicees").value;
  
  if (main_servicees && getApprovalData && getApprovalData.id) {
    const formData = {
      id: getApprovalData.id,
      sub_servicees: sub_servicees
    };

    fetch("updateSupServices.php", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json"
      }
    })
      .then(response => response.text())
      .then(result => {
        console.log(result);
        location.reload();
      })
      .catch(error => {
        console.error(error);
      });
  } else {
    console.error("Invalid main_servicees or getApprovalData.id");
  }
}
async function saveDocument() {
  const sub_servicees = document.getElementById("sub_servicees").value;
  const main_servicees = document.getElementById("main_servicees").value;
  console.log(main_servicees);
    console.log(sub_servicees);


  let isValid = true;

  if (sub_servicees === '') {
    isValid = false;
    const sub_serviceesInput = document.getElementById('sub_servicees');
    sub_serviceesInput.style.border = '1px solid red';
    sub_serviceesInput.dataset.originalBorderColor = sub_serviceesInput.style.borderColor;
    sub_serviceesInput.addEventListener('change', function () {
      sub_serviceesInput.style.border = '1px solid gray';
    });
  }

  if (isValid) {
    const formData = {
      sub_servicees: sub_servicees,
      main_service_id: main_servicees
    };

    fetch("insertSubServices.php", {
      method: "POST",
      body: JSON.stringify(formData),
      headers: {
        "Content-Type": "application/json"
      }
    })
        .then(response => response.json())
      .then(result => {
        console.log(result);
          alert('تم حفظ البيانات بنجاح!');
        location.reload();
      })
      .catch(error => {
        console.error(error);
      });
  }
}



  const aANDsEditBTNListener = () => {
          
        addOrModify = 'modify';
        const approvalEditFields = document.querySelector('#supporting_and_approvals');
        approvalEditFields.addEventListener("click",async function(event) {
                       console.log("hi");

         toggleFields();

            if (event.target.matches("tr td .aANDsEditBTN")) {
              modifyOrAdd = 'modify';
              document.getElementById("saveRequestInfo").setAttribute('onclick', 'modifyDocument()');
              const approvalFile = event.target;
              const approvalFileNo = approvalFile.id.replace('aANDsEditBTN','');
              document.querySelector('#showF').classList.add('disabledTabs');

             console.log("hi");
       var isOpen = false;

    var Fields = document.getElementById("Fields");
      if (isOpen) {
        Fields.style.display = "none";
        isOpen = false;
      } else {
        Fields.style.display = "block";
        isOpen = true;
      }
              console.log(approvalFileNo);
              
              const getApproval = await fetch('../server/getData/fetchMainServiceById.php?key='+approvalFileNo);
              getApprovalData = await getApproval.json();
              console.log(getApprovalData);
              setTimeout(() => {
                  document.querySelector('#MainServiceTextArea').value = getApprovalData['name'];
              },250)
              
            }
          });
    }

    async function supportingAdd() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', './server/getMain.php');
      xhr.onload = function () {
        if (xhr.status === 200) {
          var optionsHTML = "";
          var data = JSON.parse(xhr.responseText);
          data.forEach(function (item) {
            optionsHTML += "<option id='" + item.id + "' value='" + item.id + "'>" + item.name + "</option>";
          });


      newRequestContainer.innerHTML = `
        <div class="p2 flex">
                    <div class="selectArea" id="">
                        <p>الخدمة الرئيسية</p>
                        <select type="text" id="main_servicees" disabled>
                          <option selected disabled value="--">--</option>
                          ${optionsHTML}
                        </select>
                      </div>
          <div class="selectArea" id="">
            <p> الخدمه الفرعيه</p>
            <textarea id="sub_servicees"></textarea>
          </div>
        </div>`;

    } else {
      console.log('Request failed.  Returned status of ' + xhr.status);
    }
  };

  xhr.send();
}
