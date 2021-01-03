import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';
import { UserServiceService } from '../services/user-service.service';

@Injectable({
  providedIn: 'root'
})
export class AuthServiceService implements CanActivate {

  constructor(private router: Router, private userService: UserServiceService) { }

  canActivate(): boolean {
    let token = localStorage.getItem('token');

    if(!token){
      this.router.navigate(['login']);
      return false;
    }
    return true;

  }
}
