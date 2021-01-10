<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Admin Login</title>
</head>
<body>
<div class="container main-container">
  <div class="row">
    <div class="col-md-6 standard-padding">
      <div class="card">
        <div class="card">
          <h2 style="margin-left: 20px">Login</h2>
          <div
            *ngIf="loggedin"
            class="alert alert-success alert-dismissible fade show"
            role="alert"
          >
            <strong>Success !!</strong> Your are Login successfully.
            <button
              (click)="closeloggedin()"
              type=" button "
              class="close"
              data-dismiss="alert "
              aria-label="Close "
            >
              <span aria-hidden="true ">&times;</span>
            </button>
          </div>
          <div
            *ngIf="notApproved"
            class="alert alert-primary alert-dismissible fade show"
            role="alert"
          >
            <strong>Not Approved !!</strong> Your are not approved by admin,
            Please try again later.
            <button
              (click)="closenotApproved()"
              type=" button "
              class="close"
              data-dismiss="alert "
              aria-label="Close "
            >
              <span aria-hidden="true ">&times;</span>
            </button>
          </div>
          <div
            *ngIf="invalidCred"
            class="alert alert-warning alert-dismissible fade show"
            role="alert"
          >
            <strong>Failed !!</strong> Invalid Credentials, Please try again.
            <button
              (click)="closeinvalidCred()"
              type=" button "
              class="close"
              data-dismiss="alert "
              aria-label="Close "
            >
              <span aria-hidden="true ">&times;</span>
            </button>
          </div>

          <div
            *ngIf="notUser"
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
          >
            <strong>Invalid !!</strong> Not a valid User.
            <button
              (click)="closenotUser()"
              type=" button "
              class="close"
              data-dismiss="alert "
              aria-label="Close "
            >
              <span aria-hidden="true ">&times;</span>
            </button>
          </div>

          <div class="card-body">
            <form [formGroup]="adminloginForm" (ngSubmit)="login()">
              <!-- <div class="alert alert-danger" [hidden]="!error">
                  </div> -->

              <div
                class="row mb-12 form-group"
                [ngClass]="{
                  'has-error':
                  adminloginForm.get('email')?.errors &&
                    (adminloginForm.get('email')?.touched ||
                    adminloginForm.get('email')?.dirty)
                }"
              >
                <!-- <label for="inputEmail3" class="col-sm-10 col-form-label">Email</label> -->
                <div class="col-md-12">
                  <input
                    type="email"
                    name="email"
                    formControlName="email"
                    class="input"
                    id="inputEmail3"
                    placeholder="Email"
                    required
                  />
                  <!-- <span
                    class="help-block"
                    *ngIf="
                    adminloginForm.get('email')?.errors &&
                      (adminloginForm.get('email')?.touched ||
                      adminloginForm.get('email')?.dirty)
                    "
                  >
                    <span *ngIf="adminloginForm.get('email')?.errors?.required"
                      >Email is required</span
                    >
                  </span> -->

                  <span
                    class="help-block"
                    *ngIf="adminloginForm.get('email')?.errors"
                  >
                    <span
                      *ngIf="
                      adminloginForm.get('email')?.errors &&
                      adminloginForm.get('email')?.dirty
                      "
                    >
                      email is not correct</span
                    >
                  </span>
                </div>

                <!-- <small class="text-danger ">Email is required</small> -->
                <!-- <div class="form-control-feedback " *ngIf="email.errors && (email.dirty || email.touched) ">
                              <p *ngIf="email.errors.required ">Email is required</p>
                              <p *ngIf="email.errors.pattern ">The email address must contain at least the @ character</p>
                              <p *ngIf="email.errors.emailDomain ">Email must be on the codecraft.tv domain</p> (1)
                          </div> -->
              </div>
              <div
                class="row mb-12 form-group"
                [ngClass]="{
                  'has-error':
                  adminloginForm.get('password')?.errors?.required &&
                    (adminloginForm.get('password')?.touched ||
                    adminloginForm.get('password')?.dirty)
                }"
              >
                <!-- <label for="inputPassword3 " class="col-sm-10 col-form-label">Password</label> -->
                <div class="col-md-12">
                  <input
                    type="password"
                    name="password "
                    formControlName="password"
                    class="input"
                    id="inputPassword3 "
                    placeholder="Password "
                    required
                  />
                  <!-- <span
                    class="help-block"
                    *ngIf="
                    adminloginForm.get('password')?.errors?.required &&
                      (adminloginForm.get('password')?.touched ||
                      adminloginForm.get('password')?.dirty)
                    "
                  >
                    <span *ngIf="adminloginForm.get('password')?.errors?.required"
                      >password is required</span
                    > </span
                  ><br /><br /> -->
                  <!-- <span class="float-right"><a routerLink="Login">Alredy Account,Login</a></span> -->
                </div>
                <!-- <small class="text-danger ">Password is required</small> -->
              </div>

              <button
                type="submit "
                class="myButton"
                [disabled]="!adminloginForm.valid"
              >
                Login
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 standard-padding right-section">
      <div class="card right-card">
        <!-- Write something here -->
        <p>Write something here</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>