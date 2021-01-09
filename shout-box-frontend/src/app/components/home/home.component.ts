import { Component, OnInit } from '@angular/core';
import { FriendService } from 'src/app/services/friend.service';
import { Observable } from 'rxjs';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
  constructor(
    private friend: FriendService,
    private ar: ActivatedRoute,
    private router: Router
  ) {}
  users: Observable<any>;
  friendsPosts: Observable<any>;
  user_id: number;
  data: any;
  // addfriend(friend_id: number) {
  //   this.data = {
  //     user_id: 1,
  //     friend_id: friend_id,
  //   };
  //   this.friend.addFriend(this.data).subscribe(
  //     () => {
  //       console.log('addeds');
  //     },
  //     (error) => {
  //       console.log(error);
  //     }
  //   );
  // }
  ngOnInit(): void {
    // this.user_id = 1;
    // this.users = this.friend.getAllUsers(this.user_id);
  }
}
