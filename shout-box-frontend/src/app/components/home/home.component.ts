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
  session_id: any;
  user_id: any;
  constructor(
    private friend: FriendService,
    private ar: ActivatedRoute,
    private router: Router
  ) {
    this.session_id = sessionStorage.getItem('id');
  }
  users: Observable<any>;
  friendsPosts: Observable<any>;

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
    this.user_id = this.session_id;
    // this.users = this.friend.getAllUsers(this.user_id);
    // this.user_id = 1;
    // this.users = this.friend.getAllUsers(this.user_id);
  }
}
