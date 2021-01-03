import { Component, OnInit } from '@angular/core';
import { UserServiceService } from 'src/app/services/user-service.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss']
})
export class DashboardComponent implements OnInit {
user;
  constructor(private userService: UserServiceService) { }

  ngOnInit(): void {
    this.userService.user().subscribe((res: any) => {
      this.user=res;
    })
  }

}
