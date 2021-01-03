import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { UserServiceService } from 'src/app/services/user-service.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  credentials: FormGroup;

  constructor(
private router: Router,
private fb: FormBuilder,
private userService: UserServiceService){}

login(){
  this.userService.login(this.credentials.value).subscribe(res =>{
    localStorage.setItem('token',res);
    // if(res){
    //   this.router.navigate(['dashboard'])
    // }
  });
}

  ngOnInit(): void {

    this.credentials = this.fb.group({
      email: ["",[Validators.required]],
      password: ["",[Validators.required]],
    })
    
  }

}
