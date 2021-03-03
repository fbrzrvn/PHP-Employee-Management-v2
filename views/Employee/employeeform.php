<section>
  <form class="employee-form">
    <!--first row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-name">Name</label>
        <input
          type="text"
          class="form-control"
          placeholder="Name" id="employeeForm-name"
          value= "<?= !isset($this->result['first_name']) ? "" : $this->result['first_name']?>">
      </div>
      <div class="col">
        <label for="employeeForm-lastname">Last Name</label>
        <input
          type="text"
          class="form-control"
          placeholder="Last name"
          id="employeeForm-lastname"
          value= "<?= !isset($this->result['last_name']) ? "" : $this->result['last_name']?>">
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
          value= "<?= !isset($this->result['email']) ? "" : $this->result['email']?>">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="col">
        <label for="employeeForm-gender">Gender</label>
        <select class="form-control" id="employeeForm-gender">
          <option selected></option>
          <option value="male" <?=!isset($this->result['gender']) ? "" : ($this->result['gender'] == 'male' ? ' selected="selected"' : '');?>>Male</option>
          <option value="female" <?=!isset($this->result['gender']) ? "" : ($this->result['gender'] == 'female' ? ' selected="selected"' : '');?>>Female</option>
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
          value= "<?= !isset($this->result['city']) ? "" : $this->result['city']?>">
      </div>
      <div class="col">
        <label for="employeeForm-street">Street Address</label>
        <input type="text" class="form-control" placeholder="Street Address" id="employeeForm-street" value= "<?= !isset($this->result['street_address']) ? "" : $this->result['street_address']?>">
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
          value= "<?= !isset($this->result['state']) ? "" : $this->result['state']?>">
      </div>
      <div class="col">
        <label for="employeeForm-age">Street Address</label>
        <input
          type="text"
          class="form-control"
          placeholder="Age"
          id="employeeForm-age"
          value= "<?= !isset($this->result['age']) ? "" : $this->result['age']?>">
      </div>
    </div>
    <!--fifth row-->
    <div class="form-row">
      <div class="col">
        <label for="employeeForm-postalcode">Postal Code</label>
        <input
          type="text"
          class="form-control"
          placeholder="Postal Code"
          id="employeeForm-postalcode"
          value= "<?= !isset($this->result['postal_code']) ? "" : $this->result['postal_code']?>">
      </div>
      <div class="col">
        <label for="employeeForm-phone">Phone Number</label>
        <input
          type="tel"
          class="form-control"
          placeholder="Phone Number"
          id="employeeForm-phone"
          value= "<?= !isset($this->result['phone_number']) ? "" : $this->result['phone_number']?>">
      </div>
    </div>
    <!--Buttons-->
    <div class="buttons-container">
    <button
      type="submit"
      class="btn btn-success"
      name="employeeSubmit"
    >Save</button>
    <a
      href="<?=constant('URL') . 'Dashboard/render';?>"
      class="btn btn-secondary"
      name="return"
    >Back</a>
    </div>
  </form>
</section>
