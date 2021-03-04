$.ajax({
  type: "GET",
  url: "renderTable"
}).done(function(data) {
  // jsGrid Table
  $("#jsGrid-user").jsGrid({
    width: "100%",
    height: "auto",

    filtering: true,
    inserting: true,
    sorting: true,
    editing: true,
    paging: true,
    autoload: true,
    pageSize: 10,
    pageButtonCount: 3,

    onItemInserted: function(args) {
      renderToastMsg("Create", "User has been added", "success");
      setTimeout(function() {
        window.location.reload();
      }, 2000);
    },

    onItemDeleted: function(args) {
      renderToastMsg("Delete", "User has been deleted", "danger");
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
      }
    },

    fields: [
      { name: "user_id", type: "hidden", css: "hide", visbile: "false"},
      { name: "name", title: "Name", type: "text", width: 100, validate: "required"},
      { name: "email", title: "Email", type: "text", width: 150, validate: "required" },
      { name: "password", title: "Password", type: "text", width: 150, validate: "required" },
      { type: "control" }
    ],

    rowClick: function(args) {
      const id = args.item.user_id;
      window.location.href = `http://localhost:5000/User/renderUser/${id}`;
    }
  })

  jsGrid.ControlField.prototype.editButtonClass = "jsgrid-edit-button";

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