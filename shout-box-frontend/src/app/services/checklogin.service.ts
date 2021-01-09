import { Injectable } from '@angular/core';
import { Subject, BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CheckloginService {

  // checklogin = new Subject();
   isLogin: boolean=sessionStorage.getItem('id') ? true : false;
  checklogin = new BehaviorSubject<Boolean>(this.isLogin)
  constructor() { }

  isLoggedIn()
  {
    this.checklogin.next(this.isLogin); 
  }
  // updateLogin() {
  //   console.log("inside update login");
  //   this.isLogin = true;
  //   this.checklogin.next(this.isLogin);
  // }
  // changeStatus() {
  //   console.log("inside update changeStatus");
  //   this.isLogin = false
  //   this.checklogin.next(this.isLogin);
  // }
}
