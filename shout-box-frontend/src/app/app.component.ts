import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  title = 'shout-box-frontend';

  constructor(private router: Router) {
    console.log("app comp");
    
  }

  // logout() {
  //   sessionStorage.removeItem('id');
  //   sessionStorage.removeItem('firstname');
  //   this.router.navigate(['/login']);
  // }
}
