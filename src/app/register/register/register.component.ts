import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { UserServiceService } from 'src/app/services/user-service.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {

  registerForm = this.fb.group({
    name : ['',Validators.required],
    email : ['',Validators.required],
    password : ['',Validators.required],
  })

  constructor(
    private fb: FormBuilder,
    private userService: UserServiceService ) {}

    register(){
    this.userService.register(this.registerForm.value).subscribe(res => {
    console.log(res);
        });
  }

  ngOnInit(): void {

    // this.credentials = this.fb.group({
    //   name: ['',Validators.required],
    //   email: ['',Validators.required],
    //   password: ['',Validators.required],
    // })
  }

}
 