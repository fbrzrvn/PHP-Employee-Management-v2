<?php require VIEWS . '/header.php';?>

<form class="employee-form" action="/User/updateUser" method="POST">
    <input
      type="number"
      name="user_id"
      value="<?= !isset($this->result['user_id']) ? "" : $this->result['user_id'] ?>"
      hidden
    >
    <!--first row-->
    <div class="form-row">
      <div class="col">
        <label for="name">Name</label>
        <input
          type="text"
          class="form-control"
          placeholder="Name"
          id="name"
          name="name"
          value="<?= !isset($this->result['name']) ? "" : $this->result['name'] ?>"
          required
          >
      </div>
      <div class="col">
        <label for="email">Email address</label>
        <input
          type="email"
          class="form-control"
          placeholder="Email"
          id="email"
          name="email"
          value="<?= !isset($this->result['email']) ? "" : $this->result['email'] ?>"
          required
        >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
    </div>
    <!--second row-->
    <div class="form-row">
      <div class="col">
        <label for="password">Password</label>
        <input
          type="password"
          class="form-control"
          placeholder="Password"
          id="password"
          name="password"
          value="<?= !isset($this->result['password']) ? "" : $this->result['password'] ?>"
          required
          >
      </div>
      <div class="col">
        <label for="confirm-password">Confirm Password</label>
        <input
          type="password"
          class="form-control"
          placeholder="Confirm Password"
          id="confirm-password"
          name="confirm-password"
          value="<?= !isset($this->result['password']) ? "" : $this->result['password'] ?>"
          required
          >
      </div>
    </div>
    <!--Buttons-->
    <div class="buttons-container">
    <button
      type="submit"
      class="btn btn-success"
      name="userSubmit"
    >Update</button>
    <a
      href="<?=constant('URL') . 'User/render';?>"
      class="btn btn-secondary"
      name="return"
    >Back</a>
    </div>
  </form>

<?php require VIEWS . '/footer.php'; ?>