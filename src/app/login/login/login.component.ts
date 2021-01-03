import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { UserServiceService } from 'src/app/services/user-service.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {


  loginForm = this.fb.group({
  email : ['',Validators.required],
  password : ['',Validators.required],
})

//public error = null;

  constructor(
private fb: FormBuilder,
private userService: UserServiceService){}

login(){
  this.userService.login(this.loginForm.value).subscribe(res =>{
    localStorage.setItem('token',res);
    // if(res){
    //   this.router.navigate(['dashboard'])
    // }
    //error => this.handleError(error);

  });

//  console.warn(this.credentials.value);
}

// handleError()
// {
//   this.error = error.error;

// }

   ngOnInit(): void {

   }

}
