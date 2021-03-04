<section>
  <form class="employee-form" action="<?= !isset($this->result['emp_id']) ? "createEmployee" : "/Employee/updateEmployee" ?>" method="POST">
    <input
      type="number"
      name="emp_id"
      value="<?= !isset($this->result['emp_id']) ? "" : $this->result['emp_id'] ?>"
      hidden
    >
    <!--first row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-name">Name</label>
        <input
          type="text"
          class="form-control"
          placeholder="Name" id="employeeForm-name"
          name="first_name"
          value="<?= !isset($this->result['first_name']) ? "" : $this->result['first_name'] ?>"
          required
          >
      </div>
      <div class="col">
        <label for="employeeForm-lastname">Last Name</label>
        <input
          type="text"
          class="form-control"
          placeholder="Last name"
          id="employeeForm-lastname"
          name="last_name"
          value="<?= !isset($this->result['last_name']) ? "" : $this->result['last_name'] ?>"
          required
        >
      </div>
    </div>
    <!--second row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-email">Email address</label>
        <input
          type="email"
          class="form-control"
          placeholder="Email"
          id="employeeForm-email"
          name="email"
          value="<?= !isset($this->result['email']) ? "" : $this->result['email'] ?>"
          required
        >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="col">
        <label for="employeeForm-gender">Gender</label>
        <select class="form-control" id="employeeForm-gender" name="gender">
          <option selected></option>
          <option
            value="male"
            <?=!isset($this->result['gender']) ? "" :
            ($this->result['gender'] == 'male' ? ' selected="selected"' : ''); ?>
          >Male</option>
          <option
            value="female"
            <?=!isset($this->result['gender']) ? "" :
            ($this->result['gender'] == 'female' ? ' selected="selected"' : ''); ?>
          >Female</option>
          <option value="other">Other</option>
        </select>
      </div>
    </div>
      <!--third row-->
      <div class="form-row">
      <div class="col">
        <label for="employeeForm-city">City</label>
        <input
          type="text"
          class="form-control"
          placeholder="City"
          id="employeeForm-city"
          name="city"
          value="<?= !isset($this->result['city']) ? "" : $this->result['city'] ?>"
          required
        >
      </div>
      <div class="col">
        <label for="employeeForm-street">Street Address</label>
        <input
          type="text"
          class="form-control"
          placeholder="Street Address"
          id="employeeForm-street"
          name="street_address"
          value="<?= !isset($this->result['street_address']) ? "" : $this->result['street_address'] ?>"
          required
        >
      </div>
    </div>
    <!--fourth row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-state">State</label>
        <input
          type="text"
          class="form-control"
          placeholder="State"
          id="employeeForm-state"
          name="state"
          value="<?= !isset($this->result['state']) ? "" : $this->result['state'] ?>"
          maxlength="3"
          required
        >
      </div>
      <div class="col">
        <label for="employeeForm-postalcode">Postal Code</label>
        <input
          type="text"
          class="form-control"
          placeholder="Postal Code"
          id="employeeForm-postalcode"
          name="postal_code"
          value= "<?= !isset($this->result['postal_code']) ? "" : $this->result['postal_code'] ?>">
      </div>
    </div>
    <!--fifth row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-phone">Phone Number</label>
        <input
          type="tel"
          class="form-control"
          placeholder="Phone Number"
          id="employeeForm-phone"
          name="phone_number"
          value= "<?= !isset($this->result['phone_number']) ? "" : $this->result['phone_number'] ?>">
      </div>
      <div class="col">
        <label for="employeeForm-age">Age</label>
        <input
          type="text"
          class="form-control"
          placeholder="Age"
          id="employeeForm-age"
          name="age"
          value="<?= !isset($this->result['age']) ? "" : $this->result['age'] ?>"
          required
        >
      </div>
    </div>
    <!--Buttons-->
    <div class="buttons-container">
    <button
      type="submit"
      class="btn btn-info"
      name="employeeSubmit"
    ><?= !isset($this->result['emp_id']) ? "Create" : "Confirm" ?></button>
    <a
      href="<?=constant('URL') . 'Dashboard/render';?>"
      class="btn btn-secondary"
      name="return"
    >Back</a>
    </div>
  </form>
</section>