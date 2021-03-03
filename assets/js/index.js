// CHANGE ACTIVE PATH
const subdomain = window.location.href.split('/');
subdomain.length === 6 ?
  document.querySelector('a[href$="/Employee/render"]')?.classList.add('active') :
  document.querySelector('a[href$="' + window.location.href + '"]')?.classList.add('active');

$.ajax({
  type: "GET",
  url: "renderTable"
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
      renderToastMsg("Create", "Employee has been added", "success");
      setTimeout(function() {
        window.location.reload();
      }, 2000);
    },

    onItemDeleted: function(args) {
      renderToastMsg("Delete", "Employee has been deleted", "danger");
    },

    deleteConfirm: "Are you sure you want to delete this employee",

    controller: {
      loadData: function(filter) {
        return $.ajax({
          url: "renderTable",
          dataType: 'json'
        });
      },

      insertItem: function(item) {
        return $.ajax({
          type: "POST",
          url: "handleRequest",
          data: item
        })
      },

      deleteItem: function(item) {
        return $.ajax({
            type: "DELETE",
            url: 'handleRequest',
            data: item
        });
      },
    },

    fields: [
      { name: "emp_id", type: "hidden", css: "hide", visbile: "false"},
      { name: "first_name", title: "First Name", type: "text", width: 100, validate: "required"},
      { name: "last_name", title: "Last Name", type: "text", width: 120, validate: "required" },
      { name: "email", title: "Email", type: "text", width: 150, validate: "required" },
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
      const id = args.item.emp_id;
      window.location.href = `http://localhost:5000/Employee/renderEmployee/${id}`;
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
    setTimeout(() => {
      document.querySelector('#message').remove();
    }, 2000);
  }
});