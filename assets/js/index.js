// CHANGE ACTIVE PATH
const url = window.location.href?.split('/')[3];
document.querySelector('a[href$="' + url + '"]').classList.add('active');

$.ajax({
  type: "GET",
  url: "fillTable"
}).done(function(data) {
  // jsGrid Table
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "auto",

    filtering: true,
    inserting: true,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 10,
    pageButtonCount: 3,

    onItemInserted: function(args) {
      renderToastMsg("New", "Employee has been added to table", "success");
      setTimeout(function(){
        window.location.reload();
      }, 3000);
    },

    onItemDeleted: function(args) {
      renderToastMsg("Delete", "Employee has been deleted", "danger");
    },

    deleteConfirm: "Are you sure you want to delete this employee",

    controller: {
      loadData: function(filter) {
        return $.ajax({
          url: "fillTable",
          dataType: 'json'
        });
      },
      insertItem: function(item) {
        return $.ajax({
          type: "POST",
          url: "../../src/library/employeeController.php",
          data: item
        })
      },
      deleteItem: function(item) {
        return $.ajax({
            type: "DELETE",
            url: "../../src/library/employeeController.php",
            data: item
        });
      },
      updateItem: function(item){
        return $.ajax({
            type: "PUT",
            url: "../../src/library/employeeController.php",
            data: item
        });
      }
    },

    fields: [
      { name: "emp_id", type: "hidden", css: "hide", visbile: "false"},
      { name: "first_name", title: "First Name", type: "text", width: 100, validate: "required"},
      { name: "last_name", title: "Last Name", type: "text", width: 120, validate: "required" },
      { name: "email", title: "Email", type: "text", width: 150,
        validate: {
          message: "Employee already exists",
          validator: function(value) {
            var x = 0;
            data.forEach(element => {
              if(element.email == value){
                x = 1;
              }
            });
            return (x == 1 ? "" : value);
      }}},
      { name: "age", title: "Age", type: "text", width: 50,
        validate: value => { if (value > 0) return true; }
      },
      { name: "gender", title: "Gender", type: "select", width: 70,
        items: [
          { Name: "", Id: '' },
          { Name: "male", title: "male", Id: 'male' },
          { Name: "female", title: "female", Id: 'female' }
        ],
        valueField: "Id", textField: "Name", validate: "required"
      },
      { type: "control" }
    ],

    rowClick: function(args){
      window.location.href = `../../src/library/employeeController.php?id=${args.item.id}`;
    }
  })

  jsGrid.ControlField.prototype.editButtonClass = "hide";

  function renderToastMsg(title, subtitle, type) {
    var fragment =
    `
      <div class="alert alert-${type} alert-dismissible fade show">
        <strong>${title}!</strong> ${subtitle}.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    `;
    $('#message').append(fragment);
  }
});
