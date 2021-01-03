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

  credentials!: FormGroup;

  constructor(
    private router: Router,
    private fb: FormBuilder,
    private userService: UserServiceService ) {}

    register(){
     console.log("hello");
    this.userService.register(this.credentials.value).subscribe(res => {
    console.log(res);
    
    console.log(this.credentials.value + 1);
    });
  }

  ngOnInit(): void {

    this.credentials = this.fb.group({
      name: ["",[Validators.required]],
      email: ["",[Validators.required]],
      password: ["",[Validators.required]],
     
    })
    console.log(this.credentials);
  }

}
 