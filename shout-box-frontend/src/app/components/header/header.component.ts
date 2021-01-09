import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { CheckloginService } from 'src/app/services/checklogin.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
})
export class HeaderComponent implements OnInit {
  user_id: any;
  username:Observable<String>;
  constructor(private router: Router,private checkLoginservice:CheckloginService) {
   
    
  }
 
  logout() {
    sessionStorage.removeItem('id');
    sessionStorage.removeItem('firstname');
    this.router.navigate(['/login']);
    // window.location.reload();
  }

  yourProfile()
  {
  this.user_id = sessionStorage.getItem('id');
  console.log('inside your profile' + this.user_id);
  this.router.navigate(['/profile/' + this.user_id]);
  
  
  }
  ngOnInit(): void {
    this.username=this.checkLoginservice.username;
    
  }
  isLoggedIn(){
    return this.checkLoginservice.isUserLoggedIn()
  }
}
